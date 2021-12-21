<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Supplier;
use App\Models\SupplierTrans;
use App\Models\UserTrans;
use App\Notifications\NotifyBookSold;
use App\Models\user;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home(Request $request)
    {
        $money = UserTrans::get();
        $no = SupplierTrans::get();
        $saldo = UserTrans::sum('subtotal');
        $saldo -= SupplierTrans::sum('subtotal');
        $jum = UserTrans::count('subtotal');
        $jum += SupplierTrans::count('subtotal');
        $recent = UserTrans::select('user_id')
                ->orderByDesc('trans_date')
                ->groupBy('user_id')
                ->limit(4)->get();
        return view('admin.home', ['money'=>$money, 'no'=>$no, 'saldo'=>$saldo,
                    'jum'=>$jum, 'recent'=>$recent]);
    }

    public function search(Request $req)
    {
        return view('customer.search', ['search' => $req->isisearch]);
    }

    public function detail(Request $req)
    {
        $books = Book::withoutTrashed()->inRandomOrder()->limit(6)->get();
        return view('customer.detail',
        [
            'id' => $req->id,
            "books" => $books
        ]);
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
        $supplier_in_business = Supplier::where('supplier_id', $req->suppid)->first();
        $isi = "Dear $supplier_in_business->supplier_name, your book \"$book->book_name\" is sold with the amount of $req->jum copies";
        $supplier_in_business->notify(new NotifyBookSold($isi));
        return response()->json(["jum" => $newstok]);
    }

    public function gettrans(Request $req)
    {
        $trans = UserTrans::find($req->index);
        return response()->json($trans->Books);
    }

    public function filter(Request $req)
    {
        $trans = UserTrans::where('trans_date', '>=', date('Y-m-d H:i:s', strtotime($req->date1)))
            ->where('trans_date', '<=', date('Y-m-d H:i:s', strtotime($req->date2)))
            ->get();
        $users = [];
        foreach ($trans as $t) {
            $users[] = user::find($t->user_id);
            $t->trans_date = date('d-M-Y', strtotime($t->trans_date));
        }
        return response()->json(["tr" => $trans, "us" => $users]);
    }
}
