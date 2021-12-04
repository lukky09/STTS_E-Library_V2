<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function search(Request $req)
    {
        return view('customer.search',['search' => $req->isisearch]);
    }

    public function detail(Request $req)
    {
        return view('customer.detail',['id' => $req->id]);
    }
}
