<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class details extends Model
{
    protected $table = 'detailsdw';
    use HasFactory;
    protected $fillable=[
        'account_id',
        'money',
        'type'
    ];

}
