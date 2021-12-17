<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierTrans extends Model
{
    use HasFactory;

    protected $table = 'suppliertrans';
    protected $primaryKey = 'supptrans_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'supp_id',
        'book_qty',
        'subtotal'
    ];

}
