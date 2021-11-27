<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'user_email',
        'user_fname',
        'user_lname',
        'user_pass',
        'user_saldo',
        'user_role'
    ];

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->user_pass;
    }

}
