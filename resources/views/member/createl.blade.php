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
                        <h2 class="text-center">เพิ่มคำขอกู้</h2>
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
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รหัสสมาชิก</label>
                                        <input type="member" name="user_id"class="form-control" placeholder="รหัสสมาชิก" value="{{ $user[0]->id }}">
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รหัสบัญชีเงินฝาก</label>
                                        <input type="member" name="account_id"class="form-control" placeholder="รหัสบัญชีเงินฝาก" value="{{ $user[0]->idaccount }}">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รหัสซารีกัตมาตี</label>
                                        <input type="text" name="sarikatmati_id"class="form-control" placeholder="รหัสซารีกัตมาตี" value="{{ $user[0]->sarakatmati_id }}">
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">วัน เดือน ปีที่ขอ</label>
                                        <input type="date" name="requested_date"class="form-control" placeholder="นามสกุล" >
                                    </div>
                                </div>
                                <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ประเภทกองทุน</label>
                                        <select class="form-control " aria-label="Default select example" name="fund_id" placeholder="--เลือกประเภทกองทุน--"><option>--เลือกประเภทกองทุน--
                                         @foreach($f as $row) 
                                        <option  value="{{$row->fund_id}}">{{$row->name}}@endforeach </option>
                                        </select>
                                    </div>
                                <div class="col">
                                <div class="col">
                                        <label for="inputState" class="form-label fw-bold">จำนวนปี ที่ผ่อน</label>
                                        <select class="form-select"  id="inputState" caria-label="Default select example" name="installment">
                                            <option selected>--กรุณาเลือกจำนวนปี ที่ผ่อน</option>
                                            <option value="12">1 ปี</option>
                                            <option value="24">2 ปี</option>
                                            <option value="36">3 ปี</option>
                                            <option value="48">4 ปี</option>
                                        </select>
                                </div>
                                        <label for="formGroupExampleInput" class="form-label fw-bold">จำนวนเงิน</label>
                                        <input type="member" name="amount"class="form-control" placeholder="0.00" >
                                </div>
                                <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">วัตถุประสงค์</label>
                                        <textarea class="form-control"  style="height: 100px" name="objective" placeholder="วัตถุประสงค์" ></textarea>
                                </div>
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn btn-primary my-5 text-center">เพิ่มข้อมูล</button></center>
                                </div>
                            </div>
                    </form>
        </div>
        
</div><br>
 
    

@endsection
