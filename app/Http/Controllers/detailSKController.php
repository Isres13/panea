<?php

namespace App\Http\Controllers;

use App\Models\sarikatmati;
use App\Models\detailsarikat;
use App\Models\account_sarikatmati;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\details;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class detailSKController extends Controller
{
    //
    public function index()
    {
        //

        $Esarikatmati = DB::table('detailsarikat')
        ->join('sarikatmatis','detailsarikat.sarikatmati_id','sarikatmatis.sarakatmati_id')
        ->select('detailsarikat.*','sarikatmatis.sarakatmati_id')
        ->get();

        $employee = Employee::all();

            return view('admin.sarikatmati.DWsarikatmati', compact('Esarikatmati','employee'));
    }
       
    public function type()
    {
        // dd($id);
        $satatus = sarikatmati::all();
        $type = count($satatus);
        //  dd($satatus);
        for($i=0;$i<$type;$i++){
            $id = $satatus[$i]->sarakatmati_id;
            // $t = $satatus[$i]->type;
            sarikatmati::where('sarakatmati_id',$id)->update(['type'=> 0]);
        }
        return redirect()->route('sarikatmati.index');
    }

    // แสดงข้อมูลหน้า index ในการฝากเงิน ซารีกัตมาตี
   
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'sarikatmati_id' => 'required',
            'employee_id' => 'required',
            'amount' => 'required',
            'paymentdate' => 'required',
        ]);
        
        $detil = new detailsarikat();
        // $users->id = $id;
        $detil->sarikatmati_id = $request->sarikatmati_id;
        $detil->employee_id = $request->employee_id;
        $detil->amount = $request->amount;
        $detil->paymentdate = $request->paymentdate;
                //  dd($detil->sarikatmati_id);
           $detil->save();

        $i=account_sarikatmati::where('id','=' , 1)->get();
        foreach( $i as $row){
            $balance = $row->balance;
        }
        $id = 1;
        $sum = $request->amount;
        $balance = ($balance + $sum);
                account_sarikatmati::find($id)->update([
                    'balance' => $balance 
                ]);

        $satatus = sarikatmati::where('sarakatmati_id',$detil->sarikatmati_id)->value('type');
        sarikatmati::where('sarakatmati_id',$detil->sarikatmati_id)->update(['type'=> 1]);

        return redirect()->route('DWcsarikatmati.index')
            ->with('success' , 'เพิ่มข้อมูลจ่ายเงินซารีกัตมาตีสำเร็จ.');
    }

    // public function showSK()
    // {
    //     //

    //     $SK = account_sarikatmati::all();
    //         return view('admin.home', compact('SK'));
    // }
}
