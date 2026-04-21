<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'title',
        'unit',
        'created_on',
        'created_by',
        'updated_on',
        'updated_by',
    ];
}