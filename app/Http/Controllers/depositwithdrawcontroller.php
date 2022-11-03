<?php

namespace App\Http\Controllers;

use App\Models\depositwithdraw;
use App\Models\User;
use App\Models\details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class depositwithdrawcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depositwithdraw = DB::table('depositwithdraw')
            ->join('users','depositwithdraw.user_id','users.id')
            ->select('depositwithdraw.*','users.name','users.lname')
            ->get();

        
                return view('admin.DWmoney.index',compact('depositwithdraw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('DWmoney.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //
            if($request->type == 0){
                $p =$request->user_id;
                $i=depositwithdraw::where('user_id',$p)->Orderby('id','DESC')->limit(1)->get();
                foreach( $i as $row){
                    $balance = $row->balance;
                    $id = $row->id;
                }
                // dd($id);
                $details = new details;
                $details->account_id = $id;
                $details->money = $request->money;
                $details->type = $request->type;
                $details->save();



                $balance = ($balance + $request->money);
            //    dd($id);
                depositwithdraw::find($id)->update([
                    'balance' => $balance 
                ]);
                return redirect()->route('DWmoney.index')
                    ->with('P', 'ทำการฝากเสร็จสิ้น.');
            }else{
                $p =$request->user_id;
                $i=depositwithdraw::where('user_id',$p)->Orderby('id','DESC')->limit(1)->get();
                foreach( $i as $row){
                    $balance = $row->balance;
                    $id = $row->id;
                }
                if($balance <= 0.00){
                    return redirect()->route('DWmoney.index')
                        ->with('M', 'ยอดเงินของคุณมีไม่เพียงพอ.');
                }elseif($request->money > $balance){
                    return redirect()->route('DWmoney.index')
                        ->with('M', 'ยอดเงินของคุณมีไม่เพียงพอ.');
                }
                else{

                $details = new details;
                $details->account_id = $id;
                $details->money = $request->money;
                $details->type = $request->type;
                $details->save();

                    $balance = ($balance - $request->money);
                        depositwithdraw::find($id)->update([
                            'balance' => $balance ,
                            'type' => $request->type
                        ]);
                }
                return redirect()->route('DWmoney.index')
                 ->with('W', 'ทำการถอนเสร็จสิ้น.');
               
            }
            
        // }else{
        //     $request->validate([
        //         'account_id' => 'required',
        //         'money' => 'required',
        //         'type' => 'required',
        //     ]);
            
        // }
        
             
        //     //return redirect()->route('DWmoney.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\depositwithdraw  $depositwithdraw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=$id;
        // dd($id);
        //

        $liats = DB::table('detailsdw')
            ->join('depositwithdraw','detailsdw.account_id','depositwithdraw.id')
            ->join('users','depositwithdraw.user_id','users.id')
            ->select('detailsdw.*','depositwithdraw.id','depositwithdraw.balance','users.name','users.lname')
            ->where('depositwithdraw.id',$id)//กำหนดให้แสดงแค่เฉพาะของไอดีนั้น
            ->orderBy('detailsdw.id', 'DESC')
            ->get();

             return view('admin.DWmoney.listDW',compact('liats'));
               
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\depositwithdraw  $depositwithdraw
     * @return \Illuminate\Http\Response
     */
    public function showuser()
    {
        $id=Auth::user()->id;
        
        $id=$id;
        // dd($id);
        $showuser = DB::table('depositwithdraw')
            ->join('users','depositwithdraw.user_id','users.id')->where('depositwithdraw.user_id',$id)
            ->select('depositwithdraw.*','users.name','users.lname')
            ->get();
        // dd($showuser);
              return view('member.home',compact('showuser'));
               
    }
    public function edit(depositwithdraw $depositwithdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\depositwithdraw  $depositwithdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, depositwithdraw $depositwithdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\depositwithdraw  $depositwithdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(depositwithdraw $depositwithdraw)
    {
        //
    }
}
