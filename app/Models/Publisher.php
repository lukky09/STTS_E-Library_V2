<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $table = 'publishers';
    protected $primaryKey = 'publisher_id';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'publisher_name'
    ];
}
