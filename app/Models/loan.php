<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    protected $table = 'loan_request';
    use HasFactory;

    protected $fillable=[
        'sarikatmati_id',
        'user_id',
        'fund_id',
        'account_id',
        'requested_date',
        'installment',
        'objective',
        'amount',
        'Approval',
    ];
}
