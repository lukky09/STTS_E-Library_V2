<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Supplier;
use App\Rules\CorrectPasswordRule;
use App\Rules\RegisteredUserRule;
use App\Rules\UniqueMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    //
    public function doLogin(Request $req)
    {
        $req->validate([
            'userlogin'=>"required",
            'password'=>"required",
        ]);

        $credential = [
            'supplier_email' => $req->userlogin,
            'password' => $req->password
        ];
        if(Auth::guard('supplier_provider')->attempt($credential)){
            return redirect('/supplier');
        }else{
            return redirect('/');
        }
        // $supp = Supplier::where('supplier_name',$req->userlogin)->get();
        // $count = count($supp);
        // // dump($count);
        // // dump($user);
        // $req->validate([
        //     'userlogin'=>["required", new RegisteredUserRule($count)],
        // ]);
        // $supp = $supp[0];
        // $req->validate([
        //     'password'=>["required", new CorrectPasswordRule($supp->supplier_pass)],
        // ]);

        // Session::put('loginsupp',$supp->supp_id);
        //dd(Auth::guard('supplier_provider')->user());
        //harus return ke home supplier di sini
        // return redirect('/supplier/home');
    }
    public function doRegis(Request $req)
    {
        $req->validate(
            [
                'supplier_name' => "required",
                'supplier_email' => ["required","email", new UniqueMail()],
                'supplier_pass_confirmation' => "required",
                'supplier_pass' => "required|min:8|confirmed",
            ]
        );
        // dump($req->supplier_name);
        // dump($req->all());
        // dump($req->supplier_name);
        Supplier::create([
            "supplier_name"=>$req->supplier_name,
            "supplier_email"=>$req->supplier_email,
            "supplier_pass"=>Hash::make($req->supplier_pass),
        ]);

        return redirect('');
    }

    public function toSuppHome(Request $req)
    {
        $books = Book::withoutTrashed()->inRandomOrder()->limit(6)->get();
        $booksadd = Book::where('book_id','104')->first();
        return view('supplier.home',["books"=>$books,"booksadd"=>$booksadd]);
    }
    public function toSuppAdd(Request $req)
    {
        return view('supplier.addbook');
    }

    public function doAdd(Request $req)
    {
        $customMessage = [
            "booktitle.required"=>"Title required",
            "bookdesc.required"=>"Description must be filled",
            "photocover.required"=>"Please submit cover photo"
        ];
        $req->validate([
            "booktitle"=>"required|string",
            "bookgenre"=>"required",
            "bookpublisher"=>"required",
            "bookauthor"=>"required",
            "photocover" => "required|mimes:png,jpg,jpeg|max:5120",
            "bookdesc"=>"required|string"
        ]);

        dump($req->file('photocover'));

        $namafile = strtolower(trim($req->input('booktitle'), ' ')).".".$req->file('photocover')->getClientOriginalExtension();
        $namafolder = "covers";
        $req->file('photocover')->storeAs($namafolder,$namafile,'public');

        Book::create([
            "book_name" => $req->booktitle,
            "shop_qty" => 0,
            "shop_price" => 8888,
            "book_synopsis"=>$req->bookdesc,
            "genre_id" => $req->bookgenre,
            "publisher_id" => $req->bookpublisher,
            "author_id" => $req->bookauthor,
            "book_dir" => "/covers/$namafile"
        ]);

        return redirect('/supplier/add')->with('message',"Success inserting new book \"$req->booktitle\"");
    }

    public function toSupply(Request $req)
    {
        $user = getAuthUser()->supplier_id;
        $books = Book::where('deleted_at',NULL)->get();
        $listSupplied = DB::table('supplierbooks')->where('supplier_id',$user)->get();
        return view('supplier.supplybook',["books"=>$books,'listSupplied'=>$listSupplied]);
    }

    public function doSupply(Request $req)
    {
        $req->validate([
            "bookprice"=>"required|numeric|min:5000",
            "bookamount"=>"required|numeric|min:5"
        ]);



        $user = getAuthUser();
        $existed = DB::table('supplierbooks')->where('book_id',$req->bookid)->where('supplier_id',$user->supplier_id)->get();
        if(count($existed) == 0){
            $book = Book::where('book_id', $req->bookid)->first();
            DB::table('supplierbooks')->insert([
                "book_id"=>$req->bookid,
                "supplier_id"=>$user->supplier_id,
                "price"=>$req->bookprice,
                "qty"=>$req->bookamount
            ]);
        }else{
            $book = Book::where('book_id', $req->bookid)->first();
            DB::table('supplierbooks')->where('book_id',$req->bookid)->where('supplier_id',$user->supplier_id)->update([
                "book_id"=>$req->bookid,
                "supplier_id"=>$user->supplier_id,
                "price"=>$req->bookprice,
                "qty"=>$req->bookamount + $existed[0]->qty
            ]);
        }


        return redirect('supplier/supply')->with('message', "Supplied $req->bookamount copies of \"$book->book_name\"");


    }
}
