<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\fundD;
use App\Models\fundt;
use App\Models\depositwithdraw;
use App\Models\User;
use App\Models\details;
use App\Models\loan;
use App\Models\account_DW;
use App\Models\sarikatmati;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loanController extends Controller
{
    //
    public function index()
    {
        //
        $loan = DB::table('loan_request')
            ->join('users','loan_request.user_id','users.id')
            ->join('fund_type','loan_request.fund_id','fund_type.fund_id')
            ->select('loan_request.*','users.name','users.lname','fund_type.name as namefund')
            // ->where('sarikatmati_id',$id)//กำหนดให้แสดงแค่เฉพาะของไอดีนั้น
            ->get();

           
            
            return view('admin.fund.recoverF',compact('loan'));
    }

    public function create()
    {
        //  
        $u = User::all();
        $s = sarikatmati::all();
        $d = depositwithdraw::all();
        $f = fundt::all();

        return view('admin.fund.createl', compact('u','s','d','f'));
    }

    public function store(Request $request)
    {
        //  ยังไม่ได้เช็คว่าคนนี้กู้หรือยัง
        $request->validate([
            'sarikatmati_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
            'account_id' => 'required',
            'requested_date' => 'required',
            'objective' => 'required',
            'installment'=> 'required',
            ],
            [
             'sarikatmati_id.required'=>"กรุณาป้อนรหัสซารีกัตมาตี",
             'user_id.required'=>"กรุณาป้อนรหัสซารีกัตมาตี",
             'amount.required'=>"กรุณาป้อนจำนวนเงิน",
             'account_id.required'=>"กรุณาป้อนรหัสรหัสบัญชีเงินฝาก",
             'requested_date.required'=>"กรุณาป้อนวัน/เดือน/ปีที่ขอ",
             'objective.required'=>"กรุณาป้อนวัตถุประสงค์",
             'installment'=>"กรุณาป้อนจำนวนปีที่จะผ่อน"
            ]
        );

        $user = loan::all()->where('user_id',$request->user_id)
        ->where('total', '>', 1.00);
        $con = count($user);
        // dd($con);
        
        // dd($request->fund_id);
        if($con == 1){
            return redirect()->route('loan.create')
                        ->with('Q', 'ไม่สามารถขอกู้ได้ "เนื่อกจากมีรายการกู้ที่ยังชำระไม่หมด"');
        }else{

            if($request->fund_id == 1){ //กองทุนไทยเข้มแข็ง
                if($request->amount > 30000 ){ 
                    return redirect()->route('loan.create')
                            ->with('Q', 'สามารถขอกู้กองทุนไทยเข้มแข็ง ได้แค่ 30,000 บ.');
                }else{
                    // dd($request);
                    $new =  new loan;
                    $new->sarikatmati_id = $request->sarikatmati_id;
                    $new->user_id = $request->user_id;
                    $new->fund_id = $request->fund_id;
                    $new->account_id = $request->account_id;
                    $new->requested_date = $request->requested_date;
                    $new->amount = $request->amount;
                    $new->installment = $request->installment;
                    $new->total = $request->amount;
                    $new->Approval = 0 ;
                    $new->objective = $request->objective;
                    // dd($new);
                    $new->save();

                    return redirect()->route('loan.index')
                        ->with('success' , 'เพิ่มข้อคำขอกู้กองทุนสำเร็จ.');
                }    

            }elseif($request->fund_id == 2){ //กองทุนเงินล้าน
                if($request->amount > 20000 ){
                    return redirect()->route('loan.create')
                            ->with('Q', 'สามารถขอกู้กองทุนเงินล้าน ได้แค่ 20,000 บ.');
                }else{
                    // dd($request);
                    $new =  new loan;
                    $new->sarikatmati_id = $request->sarikatmati_id;
                    $new->user_id = $request->user_id;
                    $new->fund_id = $request->fund_id;
                    $new->account_id = $request->account_id;
                    $new->requested_date = $request->requested_date;
                    $new->amount = $request->amount;
                    $new->installment = $request->installment;
                    $new->total = $request->amount;
                    $new->Approval = 0 ;
                    $new->objective = $request->objective;
                    // dd($new);
                    $new->save();

                    return redirect()->route('loan.index')
                        ->with('success' , 'เพิ่มคำขอกู้กองทุนสำเร็จ.');
                    // return redirect()->route('loan.index')
                    //     ->with('success' , 'เพิ่มข้อคำขอกู้กองทุนสำเร็จ.');
                } 
            }else{ //กองทุนผ่อนชำระ

                $nm = (($request->amount * 15) / 100 );

                $new =  new loan;
                $new->sarikatmati_id = $request->sarikatmati_id;
                $new->user_id = $request->user_id;
                $new->fund_id = $request->fund_id;
                $new->account_id = $request->account_id;
                $new->requested_date = $request->requested_date;
                $new->amount = $request->amount;
                $new->total = $nm ;
                $new->installment = $request->installment;
                $new->Approval = 0 ;
                $new->objective = $request->objective;
                // dd($new);
                $new->save();

                return redirect()->route('loan.index')
                    ->with('success' , 'เพิ่มคำขอกู้กองทุนสำเร็จ.');
            }

        }
            
    }

    public function createuser()
    {
        //  
        $id=Auth::user()->id;
        // dd($id);
        $user = DB::table('users')
            ->join('sarikatmatis','users.id','sarikatmatis.user_id')
            ->join('depositwithdraw','users.id','depositwithdraw.user_id')
            ->select('users.id','sarikatmatis.sarakatmati_id','depositwithdraw.id as idaccount')
            ->where('users.id',$id)//กำหนดให้แสดงแค่เฉพาะของไอดีนั้น
            ->get();
        
        $f = fundt::all();

        return view('member.createl', compact('user','f'));
    }
    

    // --------------------------------------- การเพิ่ม status ----------------------------------------------------
    public function status($id)
    {
        // 
        loan::where('loan_id',$id)->update(['Approval'=> 1]);
        return redirect()->route('loan.index');
    }

    public function status1($id)
    {
        //  
        loan::where('loan_id',$id)->update([
            'total' => 0.00,
            'Approval'=> 2
        ]);
        return redirect()->route('loan.index');
    }


// --------------------------------------------- user --------------------------------------------------------
    public function storeuser(Request $request)
    {
        //  ยังไม่ได้เช็คว่าคนนี้กู้หรือยัง
        $request->validate([
            'sarikatmati_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
            'account_id' => 'required',
            'requested_date' => 'required',
            'objective' => 'required',
            'installment' => 'required',
            ],
            [
             'sarikatmati_id.required'=>"กรุณาป้อนรหัสซารีกัตมาตี",
             'user_id.required'=>"กรุณาป้อนรหัสซารีกัตมาตี",
             'amount.required'=>"กรุณาป้อนจำนวนเงิน",
             'account_id.required'=>"กรุณาป้อนรหัสรหัสบัญชีเงินฝาก",
             'requested_date.required'=>"กรุณาป้อนวัน/เดือน/ปีที่ขอ",
             'objective.required'=>"กรุณาป้อนวัตถุประสงค์",
             'installment'=>"กรุณาป้อนจำนวนปีที่จะผ่อน"
            ]
        );

        $user = loan::all()->where('user_id',$request->user_id)
        ->where('amount', '>', 1.00);
        $con = count($user);
        // dd($con);
        
        // dd($request->fund_id);
        if($con == 1){
            return redirect()->route('loancreate')
                        ->with('Q', 'ไม่สามารถขอกู้ได้ "เนื่อกจากมีรายการกู้ที่ยังชำระไม่หมด"');
        }else{

            if($request->fund_id == 1){ //กองทุนไทยเข้มแข็ง
                if($request->amount > 30000 ){ 
                    return redirect()->route('loancreate')
                            ->with('Q', 'สามารถขอกู้กองทุนไทยเข้มแข็ง ได้แค่ 30,000 บ.');
                }else{
                    // dd($request);
                    $new =  new loan;
                    $new->sarikatmati_id = $request->sarikatmati_id;
                    $new->user_id = $request->user_id;
                    $new->fund_id = $request->fund_id;
                    $new->account_id = $request->account_id;
                    $new->requested_date = $request->requested_date;
                    $new->amount = $request->amount;
                    $new->total = $request->amount;
                    $new->installment = $request->installment;
                    $new->Approval = 0 ;
                    $new->objective = $request->objective;
                    // dd($new);
                    $new->save();

                    return redirect()->route('home')
                        ->with('success' , 'เพิ่มข้อคำขอกู้กองทุนสำเร็จ.');
                }    

            }elseif($request->fund_id == 2){ //กองทุนเงินล้าน
                if($request->amount > 20000 ){
                    return redirect()->route('loancreate')
                            ->with('Q', 'สามารถขอกู้กองทุนเงินล้าน ได้แค่ 20,000 บ.');
                }else{
                    // dd($request);
                    $new =  new loan;
                    $new->sarikatmati_id = $request->sarikatmati_id;
                    $new->user_id = $request->user_id;
                    $new->fund_id = $request->fund_id;
                    $new->account_id = $request->account_id;
                    $new->requested_date = $request->requested_date;
                    $new->amount = $request->amount;
                    $new->total = $request->amount;
                    $new->installment = $request->installment;
                    $new->Approval = 0 ;
                    $new->objective = $request->objective;
                    // dd($new);
                    $new->save();

                    return redirect()->route('home')
                        ->with('success' , 'เพิ่มคำขอกู้กองทุนสำเร็จ.');
                    // return redirect()->route('loan.index')
                    //     ->with('success' , 'เพิ่มข้อคำขอกู้กองทุนสำเร็จ.');
                } 
            }else{ //กองทุนผ่อนชำระ

                 $nm = (($request->amount * 15) / 100 );
                // dd($nm);     
                $new =  new loan;
                $new->sarikatmati_id = $request->sarikatmati_id;
                $new->user_id = $request->user_id;
                $new->fund_id = $request->fund_id;
                $new->account_id = $request->account_id;
                $new->requested_date = $request->requested_date;
                $new->amount = $request->amount;
                $new->total = $nm;
                $new->installment = $request->installment;
                $new->Approval = 0 ;
                $new->objective = $request->objective;
                // dd($new);
                $new->save();

                return redirect()->route('home')
                    ->with('success' , 'เพิ่มคำขอกู้กองทุนสำเร็จ.');
            }

        }
            
    }

    public function warnuser()
    {
        //  
        $id=Auth::user()->id;

        $loan = DB::table('loan_request')
            ->join('users','loan_request.user_id','users.id')
            ->join('fund_type','loan_request.fund_id','fund_type.fund_id')
            ->select('loan_request.*','users.name','users.lname','fund_type.name as namefund')
            ->where('user_id',$id)//กำหนดให้แสดงแค่เฉพาะของไอดีนั้น
            ->get();
        // dd($loan);
        return view('member.warn', compact('loan'));

    }

// ----------- showคำขอกู้ของกองทุน ----------------------
    public function showuser()
    {
        //  
        $id=Auth::user()->id;

        $loan = loan::all()
        ->where('user_id',$id);
       
        // dd($loan);
        return view('member.showloan', compact('loan'));

    }
    // ----------- showสัญญากู้ของกองทุน ----------------------
    // public function showuser()
    // {
    //     //  
    //     $id=Auth::user()->id;

    //     $loan = DB::table('loan_agreement')
    //         ->join('loan_request','loan_agreementt.loan_id','loan_request.loan_id')
    //         ->join('users','loan_request.user_id','users.id')
    //         ->join('fund_type','loan_request.fund_id','fund_type.fund_id')
    //         ->select('loan_request.*','users.name','users.lname','fund_type.name as namefund')
    //         ->where('users.id',$id)
    //         ->get();
    //     dd($loan);
    //     return view('member.showagreement', compact('loan'));

}
