<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan_agreement extends Model
{
    protected $table = 'loan_agreement';
    use HasFactory;

    protected $fillable=[
        'loan_id',
        'guarantor',
        'tel_guarantor',
    ];
}
