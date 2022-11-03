<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class depositwithdraw extends Model
{
    protected $table = 'depositwithdraw';
    use HasFactory;

    protected $fillable=[
        'user_id',
        'balance',
    ];
   
}
