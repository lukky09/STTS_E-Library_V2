<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books';
    protected $primaryKey = 'book_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'book_name',
        'shop_qty',
        'shop_price',
        'book_synopsis',
        'genre_id',
        'publisher_id',
        'author_id',
        'book_dir'
    ];
    public function Suppliers()
    {
        return $this->belongsToMany(Supplier::class,'supplierbooks','book_id','supplier_id')->withPivot(['qty','price']);
    }
    public function Authors()
    {
        return $this->belongsTo(Author::class,'author_id','author_id');
    }


}
