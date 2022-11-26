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
                        <h2 class="text-center">เพิ่มสัญญากู้</h2>
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
                 
                <form action="{{ route ('agreementuser')}}" method="POST" >
                        @csrf
                            <div class="mx-aotu">
                                <div class="row ">
                                    <div class="col ">
                                        <strong >รหัสสมาชิก : {{$loan[0]->user_id}} </strong>
                                        <input type="hidden" name="loan_id"class="form-control" value="{{$loan[0]->loan_id}}">
                                    </div>
                                    <div class="col">
                                        <strong >ชื่อ - นามสกุล : {{$loan[0]->name}} {{$loan[0]->lname}}</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row ">
                                    <div class="col ">
                                        <strong >จำนวนเงิน : {{$loan[0]->total}} บาท.</strong>
                                        <input type="hidden" name="total"class="form-control"  value="{{$loan[0]->total}}">
                                    </div>
                                    <div class="col">
                                        <strong >วัน/เดือน/ปีที่เริ่ม : {{$loan[0]->requested_date}}</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col ">
                                        <strong >ประเภทกองทุน : {{$loan[0]->fundname}}</strong>
                                    </div>
                                    <div class="col">
                                        <strong >จำนวนงวดทั้งหมด : {{$loan[0]->installment}}</strong>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <!-- กองทุนไทยเข้มแข็ง 300 บาท -->
                                    @if($loan[0]->fund_id == 1)
                                        <div class="col ">
                                            <strong > * จำนวนที่ต้องจ่ายแต่ละงวด (ขั้นต่ำ): 300 บาท</strong>
                                            <input type="hidden" name="fund_id"class="form-control"  value="{{$loan[0]->fund_id}}">
                                        </div>
                                        <div class="col"></div>
                                    @endif
                                    <!-- กองทุนไทยเข้มแข็ง 300 บาท -->
                                    @if($loan[0]->fund_id == 2)
                                        <div class="col ">
                                            <strong > * จำนวนที่ต้องจ่ายแต่ละงวด (ขั้นต่ำ): 250 บาท</strong>
                                            <input type="hidden" name="fund_id"class="form-control"  value="{{$loan[0]->fund_id}}">
                                        </div>
                                        <div class="col"></div>
                                    @endif
                                    <!-- กองทุนผ่อนชำระ 400 บาท -->
                                    @if($loan[0]->fund_id == 3)
                                        <div class="col ">
                                            <strong > * จำนวนที่ต้องจ่ายแต่ละงวด (ขั้นต่ำ) : 400 บาท</strong>
                                            <input type="hidden" name="fund_id"class="form-control"  value="{{$loan[0]->fund_id}}">
                                        </div>
                                        <div class="col"></div>
                                    @endif
                                    
                                </div>
                                <br>
                                <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อ - สกุล *(ผู้ค้ำประกัน)</label>
                                        <input type="text" name="guarantor" class="form-control" placeholder="ชื่อ - สกุล" >
                                </div>
                                <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">เบอร์โทร *(ผู้ค้ำประกัน)</label>
                                        <input type="member" name="tel_guarantor"class="form-control" placeholder="xxx-xxx-xxxx" >
                                </div>
                                
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn  my-5 text-center" style="background-color: #3C8085; color: #FFF;">เพิ่มข้อมูล</button></center>
                                </div>
                            </div>
                    </form>
        </div>
        
</div><br>
 
    

@endsection
