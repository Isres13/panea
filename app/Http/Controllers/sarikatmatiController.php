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
        $user = DB::table('sarikatmatis')
        ->join('users','sarikatmatis.user_id','users.id')
        ->select('sarikatmatis.*','users.name','users.lname')
        ->get();
            
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
        
        $user = $request->id;
        $request->validate([
            'applydate' => 'required',
            'name' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
        ]);
        $q=sarikatmati::Orderby('sarakatmati_id','DESC')->limit(1)->get();
        foreach( $q as $row){
                    $id = $row->sarakatmati_id;
                }
                
         $id= $id + 1 ;
        //  dd($id);
        $S = new sarikatmati;
        $S->sarakatmati_id = $id;
        $S->user_id = $user;
        $S->applydate = $request->applydate;
        $S->save();
        // dd($S);
        
        $sarikatmati_id = $id;
        $n = count($request->name);
        for($i=0;$i<$n;$i++){
            $f = new familys;
            $f->sarikatmati_id = $sarikatmati_id;
            $f->name = $request->namef[$i];
            $f->lname = $request->lnamef[$i];
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
    public function edit(sarikatmati $sarikatmati)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sarikatmati  $sarikatmati
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sarikatmati $sarikatmati)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sarikatmati  $sarikatmati
     * @return \Illuminate\Http\Response
     */
    public function destroy(sarikatmati $sarikatmati)
    {
        //
    }
}
