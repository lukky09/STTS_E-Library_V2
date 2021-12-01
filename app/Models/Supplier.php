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
        'supplier_saldo'
    ];

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->supplier_pass;
    }
}
