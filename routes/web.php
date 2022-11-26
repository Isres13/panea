<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\fundController;
use App\Http\Controllers\loanController;
use App\Http\Controllers\Fund_DeController;
use App\Http\Controllers\depositwithdrawcontroller;
use App\Http\Controllers\sarikatmatiController;
use App\Http\Controllers\detailSKController;
use App\Http\Controllers\agreementController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//กำหนดสิทธิการเข้าถึงเป็นgrop
/*Route::middleware(['auth::sanctum', 'verified'])->get('/login' , function(){

}) */

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//--------------------------------------------- admin -------------------------------------------------------------//
Route::get('/account', [accountController::class, 'index'])->name('account');
Route::resource('user', UserController::class);//->middleware('is_admin');
Route::get('/Uemployee/{id}', [EmployeeController::class, 'edit'])->name('Uemployee');
Route::resource('employee', EmployeeController::class);//->middleware('is_admin');
//-------- ฝาก-ถอน ---------------
Route::get('/list/{id}',[depositwithdrawController::class, 'show'])->name('listDW');
Route::resource('DWmoney', depositwithdrawController::class);//->middleware('is_admin');
//--------- ซารีกัตมาตี -------
Route::get('/view/{id}',[sarikatmatiController::class, 'show'])->name('viewS');
Route::get('/edtitsarikatmati/{id}',[sarikatmatiController::class, 'edit'])->name('editS');
Route::post('/sarikatmati_update/{id}', [sarikatmatiController::class,'update'])->name('updateS');
Route::resource('sarikatmati', sarikatmatiController::class);//->middleware('is_admin');
Route::get('/updatetype', [detailSKController::class, 'type'])->name('updatetype');
// -------- จ่ายเงินซารีกัตมาตี ---------
Route::get('/DWs', [detailSKController::class, 'index'])->name('DWsarikatmati');
Route::resource('/DWcsarikatmati', detailSKController::class);
//--------- ประเภทกองทุน -----------
Route::resource('/fundtype', fundController::class);
Route::get('/fundtype_edit/{id}', [fundController::class, 'edit'])->name('fundedit');
Route::put('/fundtype_update/{id}', [fundController::class,'update'])->name('fundupdate');
Route::get('/fundtype_show/{fund_id}', [fundController::class, 'show'])->name('fundshow');
Route::resource('/fundtypeD', Fund_DeController::class);
//---------- สัญญากู้ ---------------
Route::get('/agreement/{loan_id}', [agreementController::class, 'create'])->name('agreemant');
Route::post('/createagreement', [agreementController::class, 'store'])->name('createagreemant');
Route::get('/showagreement/{loan_id}', [agreementController::class, 'show'])->name('showagreemant');

//--------- กู้เงินกองทุน ------------
Route::resource('/loan', loanController::class);
Route::get('/loanstatus/{loan_id}', [loanController::class, 'status'])->name('status1');
Route::get('/loanstatus1/{loan_id}', [loanController::class, 'status1'])->name('status2');


//------------------------------- user -----------------------------------------------
Route::get('/show',[depositwithdrawController::class, 'showuser'])->name('home');
Route::get('/detail',[depositwithdrawController::class, 'showdetail'])->name('detail');
Route::get('/showuser',[UserController::class, 'showuser'])->name('showuser');
Route::get('/edituser/{id}',[UserController::class, 'edituser'])->name('edituser');
Route::put('/editus/{id}',[UserController::class, 'updateuser'])->name('updateuser');
Route::get('/sarikatmatiS',[sarikatmatiController::class, 'showuser'])->name('Usersarikatmati');
Route::get('/loancreate',[loanController::class, 'createuser'])->name('loancreate');
Route::post('/loanstore',[loanController::class, 'storeuser'])->name('loanstore');
Route::get('/warn',[loanController::class, 'warnuser'])->name('warn');
Route::get('/createage', [agreementController::class, 'createag'])->name('createage');
Route::post('/agreement', [agreementController::class, 'storeuser'])->name('agreementuser');
Route::get('/showloan', [loanController::class, 'showuser'])->name('showloan');
//--เบิกซารีกัตมาตี--ยังไม่ทำ


// route::get('/DW',function(){
//     return view('admin.sarikatmati.DWsarikatmati');
// })->name('DWsrikat');

route::get('/W',function(){
    return view('admin.sarikatmati.Wsarikatmati');
})->name('Wsrikatmati');
//คำขอกู้

//สัญญากุ้
//คืนเงินกองทุน
route::get('/Dfund',function(){
    return view('admin.fund.fundD');
})->name('fundoi');


/*
/*member  ดึงค่าที่เป็น user*/
// Route::post('/createmumber', function(){
//     return view('admin.createmumber');
// })->name('createmumber');

// /*employee*/ 
// Route::post('/DWmoney', function(){
//     return view('admin.DWmoney');
// })->name('DWmoney');

// Route::post('/Sarikatmati', function(){
//     return view('admin.Sarikatmati');
// })->name('Sarikatmati');
