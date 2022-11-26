<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_dw extends Model
{
    protected $table = 'account_dw';
    use HasFactory;

    protected $fillable=[
        'balance',
    ];
}
