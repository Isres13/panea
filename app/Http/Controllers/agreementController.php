<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fundD;
use App\Models\fundt;
use App\Models\loan;
use App\Models\loan_agreement;
use App\Models\depositwithdraw;
use App\Models\User;
use App\Models\details;
use App\Models\account_DW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class agreementController extends Controller
{
    //

    public function create($id)
    {
        $loan = DB::table('loan_request')
        ->join('users','loan_request.user_id','users.id')
        ->join('fund_type','loan_request.fund_id','fund_type.fund_id')
        ->select('loan_request.*','users.name','users.lname','fund_type.name as fundname')
        ->where('loan_id',$id)
        ->get();
        // dd($loan);
        return view('admin.fund.agreement', compact('loan'));
    }

    public function store(Request $request)
    {
        //  
        $request->validate([
            'guarantor' => 'required',
            'tel_guarantor' => 'required',
            ],
            [
             'guarantor.required'=>"กรุณาป้อนชื่อผู้ค้ำประกัน",
             'tel_guarantor.required'=>"กรุณาป้อนเบอร์โทรศัพพ์ ผู้ค้ำประกัน",
            ]
        );
        // dd($request);

        $a = new loan_agreement;
        $a->loan_id = $request->loan_id;
        $a->guarantor = $request->guarantor;
        $a->tel_guarantor = $request->tel_guarantor;
        $a->save();


        $f = $request->fund_id ; 
        $b = fundt::where('fund_id',$f)->get();
                foreach( $b as $row){
                   $total = $row->balance;
                    }
                $all = ( $total - $request->total );
                    fundt::where('fund_id',$f)->update([
                       'balance' => $all
                    ]); 

        $loan = $request->loan_id;
        loan::where('loan_id',$loan)->update(['Approval'=> 3]);
        

        return redirect()->route('loan.index')
            ->with('success', 'เพิ่มข้อมูลสัญญาเรียบร้อย');
    }

    public function show($id)
    {
        $loan = DB::table('loan_agreement')
            ->join('loan_request','loan_agreement.loan_id','loan_request.loan_id')
            ->join('users','loan_request.user_id','users.id')
            ->join('fund_type','loan_request.fund_id','fund_type.fund_id')
            ->select('loan_agreement.*','loan_request.*','users.name','users.lname','fund_type.name as fundname')
            ->where('loan_agreement.loan_id',$id)
            ->get();

        // dd($loan);
        return view('admin.fund.showag', compact('loan'));
    }


    
    //------------------------- เพิ่มข้อมูลสัญญากู้ของ user --------------------------
    public function createag(){

        $id=Auth::user()->id;

        $loan = DB::table('loan_request')
        ->join('users','loan_request.user_id','users.id')
        ->join('fund_type','loan_request.fund_id','fund_type.fund_id')
        ->select('loan_request.*','users.name','users.lname','fund_type.name as fundname')
        ->where('user_id',$id)
        ->get();
        // dd($loan);
        
        return view('member.createag',compact('loan'));
    }

    public function storeuser(Request $request)
    {
        //  

        dd($request);
        // $request->validate([
        //     'guarantor' => 'required',
        //     'tel_guarantor' => 'required',
        //     ],
        //     [
        //      'guarantor.required'=>"กรุณาป้อนชื่อผู้ค้ำประกัน",
        //      'tel_guarantor.required'=>"กรุณาป้อนเบอร์โทรศัพพ์ ผู้ค้ำประกัน",
        //     ]
        // );
        // // dd($request);

        // $a = new loan_agreement;
        // $a->loan_id = $request->loan_id;
        // $a->guarantor = $request->guarantor;
        // $a->tel_guarantor = $request->tel_guarantor;
        // $a->save();


        // $f = $request->fund_id ; 
        // $b = fundt::where('fund_id',$f)->get();
        //         foreach( $b as $row){
        //            $total = $row->balance;
        //             }
        //         $all = ( $total - $request->total );
        //             fundt::where('fund_id',$f)->update([
        //                'balance' => $all
        //             ]); 

        // $loan = $request->loan_id;
        // loan::where('loan_id',$loan)->update(['Approval'=> 3]);
        

        // return redirect()->route('home')
        //     ->with('success', 'เพิ่มข้อมูลสัญญาเรียบร้อย');
    }
}
