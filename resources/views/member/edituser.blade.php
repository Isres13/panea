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
                        <h2 class="text-center">แก้ไขข้อมูลผู้ใช้</h2>
                        <div>
                            <a href="{{ route('home') }}" class="btn  my-3 " style="background-color: #3C8085; color: #FFF;">ย้อนกลับ</a>
                        </div>
                        
                    </div>
                </div>

                <form action="{{ route('updateuser', $user->id)}}" method="POST">
                        @csrf
                        @method('put') <!--ฟังก์ชั่นสำหรับการแก้ไข-->
                            <div class="mx-aotu">
                                <!-- <div clasa="col-md-12">
                                    <strong>รหัสสมาชิก :</strong>
                                    <input type="number" name="id" value="{{ $user->id }}" class="form-control">
                                </div> -->
                                <div clasa="col-md-12">
                                    <strong>อีเมล :</strong>
                                    <input type="Email" name="email" value="{{ $user->email }}" class="form-control" >
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <strong>ชื่อ :</strong>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" >
                                    </div>
                                    <div class="col">
                                        <strong>นามสกุล :</strong>
                                        <input type="text" name="lname" class="form-control" value="{{ $user->lname }}" >
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <strong>ชื่อเล่น :</strong>
                                        <input type="text" name="Nname" class="form-control" value="{{ $user->Nname }}" >
                                    </div>
                                    <div class="col ">
                                            <strong>เพศ :</strong>
                                            <input type="text" name="sex" class="form-control" value="{{ $user->sex }}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <strong>วัน / เดือน / ปีเกิด :</strong> <br> 
                                        <input type="date" id="birthday" class="form-control" value="{{ $user->birthday }}" name="birthday" >
                                    </div>
                                    <div class="col ">
                                        <strong>สถานภาพ :</strong>
                                            <select id="inputState" class="form-select" name="status" value="{{ $user->status }}" >
                                                <option selected >{{ $user->status }}</option>
                                                <option>โสด</option>
                                                <option>แต่งงาน</option>
                                                <option>หม้าย</option>
                                                <option>หญ่า</option>
                                            </select>
                                    </div>
                                </div>
                                <div clasa="col">
                                    <strong>เบอร์โทรศัพท์ :</strong>
                                    <input type="number" name="tel" class="form-control" placeholder="xxx-xxx-xxxx" value="{{ $user->tel}}">
                                </div>
                                <!--ที่อยู๋ต้องเปลี่ยนเป็นป้อนค่าอัตโนมัติ-->
                                <div class="col">
                                    <strong>ที่อยู่ :</strong>
                                    <textarea class="form-control"  style="height: 100px" name="address" placeholder="ที่อยู่ปัจจุบัน">{{ $user->address}}</textarea>
                                </div>
                                <!-- <div class="col">
                                        <strong>รหัสผ่าน :</strong>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="********"  required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                confirmpassword-->
                                <!-- <div class="col">
                                        <strong>ยืนยันรหัสผ่าน :</strong>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="********"  required autocomplete="new-password">
                                </div> -->
                                
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn btn-primary my-5 text-center">บันทึกข้อมูล</button></center>
                                </div>
                            </div>
                </form>
        </div>
        
</div><br>
 
    

@endsection
