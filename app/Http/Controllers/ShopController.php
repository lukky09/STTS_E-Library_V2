<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\SupplierTrans;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function search(Request $req)
    {
        return view('customer.search', ['search' => $req->isisearch]);
    }

    public function detail(Request $req)
    {
        return view('customer.detail', ['id' => $req->id]);
    }

    public function buybook(Request $req)
    {
        $book = Book::find($req->bookid);
        $newstok = $book->Suppliers->find($req->suppid)->pivot->qty - $req->jum;
        $book->Suppliers()->updateExistingPivot($req->suppid, [
            'qty' => $newstok,
        ]);
        SupplierTrans::create([
            'book_id' => $req->bookid,
            'supp_id' => $req->suppid,
            'book_qty' => $req->jum,
            'subtotal' => $req->jum * $book->Suppliers->find($req->suppid)->pivot->price,
        ]);
        return response()->json(["jum" => $newstok]);
    }
}
