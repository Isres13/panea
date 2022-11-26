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

class fundController extends Controller
{
    //
    public function index()
    {
        //
        $fund = fundt::all();
            return view('admin.fund.index_type', compact('fund'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'details' => 'required',
        ]);
        $fund = new fundt();
        $fund->name = $request->name;
        $fund->balance = $request->amount;
        $fund->details = $request->details;
                //  dd($detil->sarikatmati_id);
            $fund->save();

        return redirect()->route('fundtype.index')
            ->with('success' , 'เพิ่มข้อมูลประเภทกองทุนสำเร็จ.');
    }

    public function edit($id) 
    {
        $fund_t = fundt::where('fund_id',$id)->get();
        // dd($fund_t);
            return view('admin.fund.fund_edit', compact('fund_t'));
    }

    public function update(Request $request, $id) 
    {
        //

        fundt::where('fund_id',$id)->update([
            'name' => $request->name,
            'balance' => $request->amount,
            'details' => $request->details,
        ]);
        // dd($de);
        return redirect()->route('fundtype.index')
            ->with('success' , 'อัพเดตข้อมูลประเภทกองทุนสำเร็จ.');
    }

    public function show($id)
    {
        $id=$id;
        //  dd($id);
        $show = DB::table('fund_detail')
            ->join('fund_type','fund_type.fund_id','fund_detail.fund_id')
            ->select('fund_type.*','fund_detail.*')
            ->where('fund_detail.fund_id',$id)//กำหนดให้แสดงแค่เฉพาะของไอดีนั้น
            ->get();
       
            return view('admin.fund.fund_show',compact('show'));
               
    }

}
