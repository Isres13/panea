<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundD extends Model
{
    protected $table = 'fund_detail';
    use HasFactory;

    protected $fillable=[
        'name_OG',
        'amount',
        'fund_id',
    ];
}
