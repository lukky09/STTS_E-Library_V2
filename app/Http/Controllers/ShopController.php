<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

    public function buybook(Request $req)
    {
        // $book = Book::find(Session::get('cartids.' . $req->index . '.0'));
        // $saldo = getAuthUser()->user_saldo;
        // $total = 0;
        // foreach (Session::get('cartids') as $c) {
        //     $total += Book::find($c[0])->shop_price * $c[1];
        // }
        // return response()->json(["jum" => number_format($total, 2, ',', '.'), "tot" => number_format($saldo - $total, 2, ',', '.'), "newval" => Session::get('cartids.' . $req->index . '.1')]);

    }
}
