<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $primaryKey = 'program_id';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'title',
        'years',
        'created_on',
        'created_by',
        'updated_on',
        'updated_by',
    ];
}