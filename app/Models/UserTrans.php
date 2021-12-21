<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class UserTrans extends Model
{
    use HasFactory;

    protected $table = 'usertrans';
    protected $primaryKey = 'trans_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'subtotal',
        'trans_date'
    ];

    public function Books()
    {
        return $this->belongsToMany(Book::class, 'usertransdetail', 'trans_id', 'book_id')
            ->withPivot(['qty', 'price'])
            ->as('detail');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
