@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<style>
hr.hr{
    
	border: 0;
    width: 90%;
    background-color: #8c8b8ba1;
    margin-top: 0;
	box-shadow: 0px 1.5px 0px 0.1px  #8c8b8ba1 ;
            
}
</style> 
</head>
@section('content')
<div class="container  body" style="padding-bottom: 3rem; padding-top: 3rem; max-width: 1000px;">
<div class="contain">
    <div class="contain">
        <div class="row ">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header h5 text-center">บัญชีซารีกัตมาตี</div>
                    <div class="card-body">
                        <h3 class="text-center">{{$SK[0]->balance}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header h5 text-center">บัญชีเงินฝาก</div>
                    <div class="card-body">
                        <h3 class="text-center">{{$DW[0]->balance}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <center><hr class="hr"></center>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header h5 text-center">บัญชีกองทุนไทยเข้มแข็ง</div>
                    <div class="card-body">
                        <h3 class="text-center">{{$fT[0]->balance}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header h5 text-center">บัญชีกองทุนเงินล้าน</div>
                    <div class="card-body">
                        <h3 class="text-center">{{$fT[2]->balance}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header h5 text-center">บัญชีกองทุนผ่อนชำระ</div>
                    <div class="card-body">
                        <h3 class="text-center">{{$fT[1]->balance}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection