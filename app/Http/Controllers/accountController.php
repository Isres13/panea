<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sarikatmati;
use App\Models\fundt;
use App\Models\fundD;
use App\Models\depositwithdraw;
use App\Models\detailsarikat;
use App\Models\account_sarikatmati;
use App\Models\account_DW;
use App\Models\User;
use App\Models\details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{
    //
    public function index()
    {       
        $fT = fundt::all();
        $DW = account_DW::all();
        $SK = account_sarikatmati::all();
            return view('admin.account' ,compact('SK','DW','fT'));
    }   
}
