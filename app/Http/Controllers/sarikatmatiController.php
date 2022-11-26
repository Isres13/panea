<?php

namespace App\Http\Controllers;

use App\Models\sarikatmati;
use App\Models\User;
use App\Models\familys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class sarikatmatiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sarikatmati = DB::table('sarikatmatis')
        ->join('users','sarikatmatis.user_id','users.id')
        ->select('sarikatmatis.*','users.name','users.lname')
        ->get();

        
            return view('admin.sarikatmati.index', compact('sarikatmati'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user=user::all()->where('is_admin', '=', 0);
        // $user = DB::table('sarikatmatis')
        // ->join('users','sarikatmatis.user_id','users.id')
        // ->select('sarikatmatis.*','users.name','users.lname')
        // ->get();
            
            return view('admin.sarikatmati.create',compact('user'));
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
        // dd($request);
        $user = $request->id;
        // dd($user);
        $request->validate([
            'applydate' => 'required',
            'namef' => 'required',
            'lnamef' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
        ]);
        $q=sarikatmati::Orderby('sarakatmati_id','DESC')->limit(1)->get();
        foreach( $q as $row){
                    $id = $row->sarakatmati_id;
                }
        $t=0;
         $id= $id + 1 ;
        //  dd($id);
        $S = new sarikatmati;
        $S->sarakatmati_id = $id;
        $S->user_id = $user;
        $S->type = $t;
        $S->applydate = $request->applydate;
        $S->save();
        // dd($S);

        //สมาชิกครอบครัว
        $sarikatmati_id = $id;
        $n = count($request->namef);
        for($i=0;$i<$n;$i++){
            $f = new familys;
            $f->sarikatmati_id = $sarikatmati_id;
            $f->namef = $request->namef[$i];
            $f->lnamef = $request->lnamef[$i];
            $f->sex = $request->sex[$i];
            $f->birthday = $request->birthday[$i];
            $f->save();
        }
            
                return redirect()->route('sarikatmati.index')
                    ->with('success' , 'เพิ่มข้อมูล ซารีกัตมาตีสำเร็จ.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sarikatmati  $sarikatmati
     * @return \Illuminate\Http\Response
     */


    
    public function show($id)
    {
        //
        
        $id=$id;
        //  dd($id);
        //
        $viewF = DB::table('family')
            ->join('sarikatmatis','family.sarikatmati_id','sarikatmatis.sarakatmati_id')
            ->join('users','sarikatmatis.user_id','users.id')
            ->select('family.*','sarikatmatis.applydate','users.name','users.lname')
            ->where('sarikatmati_id',$id)//กำหนดให้แสดงแค่เฉพาะของไอดีนั้น
            ->get();

             return view('admin.sarikatmati.view',compact('viewF'));
               
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sarikatmati  $sarikatmati
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $fm = familys::where('sarikatmati_id',$id)->get();
        $sk = DB::table('sarikatmatis')
            ->join('users','sarikatmatis.user_id','users.id')
            ->select('sarikatmatis.*','users.name','users.lname')
            ->where('sarakatmati_id',$id)//กำหนดให้แสดงแค่เฉพาะของไอดีนั้น
            ->get();
        // dd($fund_t);
            return view('admin.sarikatmati.edit', compact('fm','sk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sarikatmati  $sarikatmati
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //บันทึกค่าใหม่

        // dd($request);
        $n = count($request->namefn);
        for($i=0;$i<$n;$i++){
            $ne = new familys;
            $ne->sarikatmati_id = $id;
            $ne->namef = $request->namefn[$i];
            $ne->lnamef = $request->lnamefn[$i];
            $ne->sex = $request->sexn[$i];
            $ne->birthday = $request->birthdayn[$i];
            $ne->save();
        }

        //อัพเดตได้แค่ค่าเดียว ค่าที่ 1
        // $d = count($request->namef);
        // for($i=0;$i<$n;$i++){
        //     familys::where('sarikatmati_id',$id)->update([
        //         'sarikatmati_id' => $id,
        //         'namef' => $request->namef[$i],
        //         'lnamef' => $request->lnamef[$i],
        //         'sex' => $request->sex[$i],
        //         'birthday' => $request->birthday[$i],
        //     ]);
        // }

        return redirect()->route('sarikatmati.index')
            ->with('success' , 'อัพเดตข้อมูลซารีกัตมาตีสำเร็จ.');
    }
        

   
    public function destroy(sarikatmati $sarikatmati)
    {
        //

    }

    public function showuser()
    {
        //
        $id=Auth::user()->id;
        $id=$id;
        
        // dd($id);
        $sarikatmati = DB::table('sarikatmatis')
        ->join('users','sarikatmatis.user_id','users.id')
        ->join('family','sarikatmatis.sarakatmati_id','family.sarikatmati_id')
        ->select('sarikatmatis.*','family.*','users.name','users.lname')
        ->where('sarikatmatis.user_id',$id)
        ->get();


        // dd($sarikatmati);
            return view('member.sarikatmati', compact('sarikatmati'));
        
    }
}
