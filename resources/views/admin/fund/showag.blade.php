@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>
tr{
    text-align: center;
}
.EDS{
    width: 300px;
    margin-bottom: 0;
    margin-right: -40px;
    margin-left: 0;
}
</style> 
</head>
@section('content')

<div class="conteiner mt-5">
<div>
    <div class="card "  style="max-width: 60rem; left: 150px; ">
        <div class=" row ">
            <div class=" col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h2 class="text-center">สัญญากู้</h2>
                        <a href="{{route('loan.index')}}" class="btn btn-primary my-3 float-start ">ย้อนกลับ</a>
                    </div>
                </div>

                @if ($errors -> any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>
                        โปรดป้อนข้อมูล.. <br><br>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form  >

                        @if ($message = Session::get('Q'))
                         <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

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
                                            <strong > * จำนวนที่ต้องจ่ายแต่ละงวด (ไม่ต่ำ): 300 บาท</strong>
                                            <input type="hidden" name="fund_id"class="form-control"  value="{{$loan[0]->fund_id}}">
                                        </div>
                                        <div class="col"></div>
                                    @endif
                                    <!-- กองทุนไทยเข้มแข็ง 300 บาท -->
                                    @if($loan[0]->fund_id == 2)
                                        <div class="col ">
                                            <strong > * จำนวนที่ต้องจ่ายแต่ละงวด (ไม่ต่ำ): 250 บาท</strong>
                                            <input type="hidden" name="fund_id"class="form-control"  value="{{$loan[0]->fund_id}}">
                                        </div>
                                        <div class="col"></div>
                                    @endif
                                    <!-- กองทุนผ่อนชำระ 400 บาท -->
                                    @if($loan[0]->fund_id == 3)
                                        <div class="col ">
                                            <strong > * จำนวนที่ต้องจ่ายแต่ละงวด (ไม่ต่ำ) : 400 บาท</strong>
                                            <input type="hidden" name="fund_id"class="form-control"  value="{{$loan[0]->fund_id}}">
                                        </div>
                                        <div class="col"></div>
                                    @endif
                                </div>
                                <br>
                                <div class="col">
                                        <strong >ชื่อ - สกุล *(ผู้ค้ำประกัน) : {{$loan[0]->guarantor}}</strong>
                                </div>
                                <div class="col">
                                        <strong >เบอร์โทร *(ผู้ค้ำประกัน) : {{$loan[0]->tel_guarantor}}</strong>
                                </div>
                                <br><br>
                            </div>
                    </form>
            </div>
        </div> 
     </div> <br>
    </div>
</div>

@endsection