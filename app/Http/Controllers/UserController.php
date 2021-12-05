<?php

namespace App\Http\Controllers;

use App\Models\user;
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
            // dd(getAuthUser());
            return redirect('/');
        } else {
            //gagal masuk
            echo 'ga bisa masuk';
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
        $ada = false;
        if (Session::has('cartids')) {
            foreach (Session::get('cartids') as $c) {
                if ($c[0] == $req->id) {
                    $ada = true;
                    break;
                }
            }
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
}
