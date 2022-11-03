<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sarikatmati extends Model
{
    protected $table = 'sarikatmatis';
    use HasFactory;

    protected $fillable = [
        'sarakatmati_id',
        'user_id',
        'applydate',
    ];
}
