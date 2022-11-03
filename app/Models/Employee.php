<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'lname',
        'rank',
        'picture'
    ];
}
