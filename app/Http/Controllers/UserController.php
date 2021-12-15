<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\user;
use App\Models\UserTrans;
use App\Rules\CorrectPasswordRule;
use App\Rules\RegisteredUserRule;
use App\Rules\UniqueMail;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function toHomeView()
    {
        $books = Book::withoutTrashed()->inRandomOrder()->limit(6)->get();
        if(getAuthUserType() == "supp"){
            return redirect('supplier/');
        }else if(getAuthUserType() == "shop"){
            return redirect('admin/');
        }
        return view('customer.home',["books"=>$books]);
        // $booksadd = Book::where('book_id','104')->first();
    }

    public function doLogin(Request $req)
    {
        $req->validate([
            'userlogin' => "required",
            'password' => "required",
        ]);

        $credential = [
            'user_email' => strtolower($req->userlogin),
            'password' => $req->password
        ];

        if (Auth::guard('user_provider')->attempt($credential)) {
            if(getAuthUser()->user_isadmin == 1){
                return redirect('/admin');
            }else{
                return redirect('/');
            }
        } else {
            //gagal masuk
            //echo 'ga bisa masuk';
            abort(403, "Tidak Bisa Masuk");
        }
    }

    public function doRegis(Request $req)
    {
        # code...
        $req->validate(
            [
                'user_email' => ["required", "email", new UniqueMail()],
                'user_fname' => "required|alpha_num",
                'user_lname' => "required|alpha_num",
                'user_pass' => "required|min:8|confirmed",
            ]
        );
        user::create([
            "user_fname" => $req->user_fname,
            "user_lname" => $req->user_lname,
            "user_email" => $req->user_email,
            "user_pass" => Hash::make($req->user_pass),
        ]);

        return redirect('/login');
    }

    public function doUpdateProfile(Request $req)
    {
        # code...
        $user = getAuthUser();
        if ($req->user_email == $user->user_email) {
            $req->validate([
                "user_fname" => "required|alpha_num",
                "user_lname" => "required|alpha_num",
                "user_pass" => ["required", new CorrectPasswordRule($user->user_pass)]
            ]);
            user::where('user_id', '=', $user->user_id)->update([
                "user_fname" => $req->user_fname,
                "user_lname" => $req->user_lname
            ]);
        } else {
            $req->validate([
                "user_fname" => "required|alpha_num",
                "user_lname" => "required|alpha_num",
                "user_email" => ["required", "email", new UniqueMail()],
                "user_pass" => ["required", new CorrectPasswordRule($user->user_pass)]
            ]);
            user::where('user_id', '=', $user->user_id)->update([
                "user_fname" => $req->user_fname,
                "user_lname" => $req->user_lname,
                "user_email" => $req->user_email
            ]);
        }
        return redirect('/profile');
    }

    public function addToCart(Request $req)
    {
        // Session::forget('cartids');
        $ada = false;
        if (Session::has('cartids')) {
            $temp = Session::get('cartids');
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i][0] == $req->id) {
                    $ada = true;
                    if (isset($req->qty)) {
                        $temp[$i][1] = $req->qty;
                    } else {
                        $temp[$i][1] = 1;
                    }

                    Session::forget('cartids');
                    foreach ($temp as $c) {
                        Session::push('cartids', $c);
                    }

                    break;
                }
            }
            // foreach (Session::get('cartids') as $c) {
            //     if ($c[0] == $req->id) {
            //         $ada = true;
            //         break;
            //     }
            // }
        }
        if (!$ada) {
            $array[] = $req->id;
            if (isset($req->qty)) {
                $array[] = $req->qty;
            } else {
                $array[] = 1;
            }
            Session::push('cartids', $array);
        }
        return redirect('cart');
    }

    public function ajaxUpdateCart(Request $req)
    {
        $book = Book::find(Session::get('cartids.' . $req->index . '.0'));
        if ($req->newval <= $book->shop_qty) {
            Session::put('cartids.' . $req->index . '.1', $req->newval);
        }
        $saldo = getAuthUser()->user_saldo;
        $total = 0;
        foreach (Session::get('cartids') as $c) {
            $total += Book::find($c[0])->shop_price * $c[1];
        }
        return response()->json(["jum" => number_format($total, 2, ',', '.'), "tot" => number_format($saldo - $total, 2, ',', '.'), "newval" => Session::get('cartids.' . $req->index . '.1')]);
    }

    public function topUp(Request $req)
    {
        User::where('user_id', getAuthUser()->user_id)
            ->update(['user_saldo' => getAuthUser()->user_saldo + $req->topup]);
        return redirect('profile');
    }


    public function doLogout(Request $req)
    {
        AuthLogout();
        Session::forget('cartids');
        return redirect('/');
    }

    public function doOrder(Request $req)
    {
        $price = 0;
        foreach (Session::get('cartids') as $c){
            $book = Book::where('book_id', $c[0])->first();
            $price += $book->shop_price * $c[1];
        }
        if(getAuthUser()->user_saldo >= $price){
            User::where('user_id', getAuthUser()->user_id)
            ->update(['user_saldo' => getAuthUser()->user_saldo - $price]);

            $result = UserTrans::create([
                'user_id' => getAuthUser()->user_id,
                'subtotal' => $price
            ]);

            foreach (Session::get('cartids') as $c){
                $book = Book::find($c[0]);
                $result->Books()->attach($book, ["qty"=>$c[1]]);
            }

            Session::forget('cartids');
            return back()->with("message", "Pembelian berhasil");
        } else {
            return back()->with("message", "Saldo tidak cukup");
        }
    }
}
