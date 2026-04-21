<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'account_type',
        'created_on',
        'created_by',
        'updated_on',
        'updated_by',
    ];

    protected $hidden = [
        'password',
    ];
}