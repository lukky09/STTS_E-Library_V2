<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    use HasFactory;

    protected $table = 'booktypes';
    protected $primaryKey = 'booktype_id';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'booktype'
    ];
}
