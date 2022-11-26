<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fundD;
use App\Models\fundt;
use App\Models\depositwithdraw;
use App\Models\User;
use App\Models\details;
use App\Models\account_DW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Fund_DeController extends Controller
{
    //
    public function index()
    {
        //  
    }

    // เพิ่มเงินเข้าไปใน กองทุน
    public function store(Request $request)
    {
        //
        //  dd($request);
        $f = $request->fund_id;
        $i = fundt::where('fund_id',$f)->get();
        foreach( $i as $row){
            $balance = $row->balance;
            }
        $fundd = new fundD;
        $fundd->fund_id = $f;
        $fundd->name_OG = $request->name_OG;
        $fundd->amount = $request->amount;
        // dd($fundd);
         $fundd->save();

         $balance = ($balance + $request->amount);
             fundt::where('fund_id',$f)->update([
                 'balance' => $balance
                 ]);

        return redirect()->route('fundtype.index')
             ->with('success' , 'เพิ่มข้อมูลการเงินกองทุนสำเร็จ.');
       
    }



}
