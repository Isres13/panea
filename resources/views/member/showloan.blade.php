@extends('layouts.app')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
    
@section('content')

<div class="conteiner">
            <div class=" col-lg-6 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h2 class="text-center">คำขอกู้</h2>
                        <div>
                            <a href="{{ route('home') }}" class="btn  my-3 " style="background-color: #3C8085; color: #FFF;">ย้อนกลับ</a>
                        </div>
                        
                    </div>
                </div>

                
                @if ($errors -> any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>
                            The were some problemr with you input. <br><br>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> 
                 @endif

                @if ($message = Session::get('Q'))
                         <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                @endif
                 
                <form action="{{ route('loanstore') }}" method="POST" >
                    
                        @csrf
                            <div class="mx-aotu">
                                <div class="row ">
                                    <div class="col ">
                                        <strong>รหัสขอกู้ : {{$loan[0]->loan_id}}</strong>
                                    </div>
                                    <div class="col">
                                        <strong>รหัสบัญชีเงินฝาก : {{$loan[0]->account_id}}</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row ">
                                    <div class="col ">
                                        <strong>รหัสซารีกัตมาตี : {{$loan[0]->sarikatmati_id}}</strong>
                                    </div>
                                    <div class="col">
                                        <strong>วัน เดือน ปีที่ขอ : {{$loan[0]->requested_date}}</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                        <strong>ประเภทกองทุน : {{$loan[0]->Approval}}</strong>     
                                </div>
                                <br>
                                <div class="col">
                                        <strong>จำนวนเงิน : {{$loan[0]->amount}}</strong>
                                </div>
                                <div class="col">
                                        <strong>วัตถุประสงค์ : {{$loan[0]->objective}}</strong>            
                                </div>
                               
                            </div>
                    </form>
        </div>
        
</div><br>
 
    

@endsection
