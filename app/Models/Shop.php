<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';
    protected $primaryKey = 'shop_id';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'shop_email',
        'shop_name',
        'shop_pass',
        'shop_phone',
        'shop_saldo'
    ];
}
