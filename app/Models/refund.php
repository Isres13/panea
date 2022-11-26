<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refund extends Model
{
    protected $table = 'loan_agreement';
    use HasFactory;

    protected $fillable=[
        'user_id',
        'date_refund',
        'employee_id',
        'amount',
        'installment',
    ];
}
