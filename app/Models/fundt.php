<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundt extends Model
{
    protected $table = 'fund_type';
    use HasFactory;

    protected $fillable=[
        'fund_id',
        'name',
        'details',
        'balance',
    ];
}
