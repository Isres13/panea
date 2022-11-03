<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\depositwithdrawcontroller;
use App\Http\Controllers\sarikatmatiController;
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


Route::resource('user', UserController::class);//->middleware('is_admin');
Route::get('/Uemployee/{id}', [EmployeeController::class, 'edit'])->name('Uemployee');
Route::resource('employee', EmployeeController::class);//->middleware('is_admin');
Route::get('/list/{id}',[depositwithdrawController::class, 'show'])->name('listDW');
Route::resource('DWmoney', depositwithdrawController::class);//->middleware('is_admin');
Route::get('/view/{id}',[sarikatmatiController::class, 'show'])->name('viewS');
Route::resource('sarikatmati', sarikatmatiController::class);//->middleware('is_admin');

Route::get('/show',[depositwithdrawController::class, 'showuser'])->name('home');

// route::get('/addfamily',function(){
//     return view('admin.sarikatmati.addFamily');
// })->name('addFamily');



route::get('/DW',function(){
    return view('admin.sarikatmati.DWsarikatmati');
})->name('DWsrikat');

route::get('/W',function(){
    return view('admin.sarikatmati.Wsarikatmati');
})->name('Wsrikatmati');
//คำขอกู้
route::get('/q',function(){
    return view('admin.fund.recoverF');
})->name('recoverF');
//สัญญากุ้
route::get('/C',function(){
    return view('admin.fund.contractF');
})->name('contractF');
//คืนเงินกองทุน
route::get('/Dfund',function(){
    return view('admin.fund.fundD');
})->name('fundD');
//ประเภทกองทุน
route::get('/typeF',function(){
    return view('admin.fund.typeF');
})->name('typeF');
///ฝากถอนเงิน

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
