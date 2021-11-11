<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $table = 'writers';
    protected $primaryKey = 'writer_id';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'writer_name'
    ];
}
