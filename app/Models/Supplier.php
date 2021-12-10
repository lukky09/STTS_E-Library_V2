<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends Authenticatable
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'supplier_name',
        'supplier_saldo',
        'supplier_email',
        'supplier_pass'
    ];

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->supplier_pass;
    }
    public function SupplierBooks()
    {
        return $this->belongsToMany(Book::class,'supplierbooks','supplier_id','book_id')->withPivot(['qty','price']);
    }
}
