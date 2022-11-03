<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class familys extends Model
{
    protected $table = 'family';
    use HasFactory;
    
    protected $fillable = [
        'sarikatmati_id',
        'namef',
        'lnamef',
        'sex',
        'birthday',
    ];

}
