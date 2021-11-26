<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Rules\CorrectPasswordRule;
use App\Rules\RegisteredUserRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    //
    public function doLogin(Request $req)
    {
        # code...
        $supp = Supplier::where('supplier_name',$req->userlogin)->get();
        $count = count($supp);
        // dump($count);
        // dump($user);
        $req->validate([
            'userlogin'=>["required", new RegisteredUserRule($count)],
        ]);
        $supp = $supp[0];
        $req->validate([
            'password'=>["required", new CorrectPasswordRule($supp->supplier_pass)],
        ]);

        Session::put('loginsupp',$supp->supp_id);
        dump($supp);
        //harus return ke home supplier di sini
        // return redirect('/');
    }
    public function doRegis(Request $req)
    {
        # code...
    }
}
