<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'author_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'author_name'
    ];

    public function Books()
    {
        return $this->hasMany(Book::class,'author_id','author_id');
    }
}
