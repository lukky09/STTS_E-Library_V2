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
        'genre_id',
        'publisher_id',
        'author_id'
    ];
}
