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
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('member.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {       
        $fT = fundt::all();
        $DW = account_DW::all();
        $SK = account_sarikatmati::all();
            return view('admin.adminHome' ,compact('SK','DW','fT'));
    }

}
