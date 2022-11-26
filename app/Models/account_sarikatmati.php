<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_sarikatmati extends Model
{
    protected $table = 'account_sarikatmati';
    use HasFactory;

    protected $fillable=[
        'balance',
    ];
}
