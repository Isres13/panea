<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailsarikat extends Model
{
    protected $table = 'detailsarikat';
    use HasFactory;

    protected $fillable = [
        'sarikatmati_id',
        'employee_id',
        'amount',
        'paymentdate',
    ];

}
