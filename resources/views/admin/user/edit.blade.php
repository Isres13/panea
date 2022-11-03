@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
    
@section('content')

<div class="conteiner">
        <div class=" row ">
            <div class=" col-lg-6 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h2 class="text-center">แก้ไขข้อมูล</h2>
                        <a href="{{ route('user.index') }}" class="btn btn-primary my-3 ">ย้อนกลับ</a>
                    </div>
                </div>

            
                    <form action="{{ route('user.update',$user->id ) }}" method="POST">
                        @csrf
                        @method('PUT') <!--ฟังก์ชั่นสำหรับการแก้ไข-->
                            <div class="mx-aotu">
                                <!-- <div clasa="col-md-12">
                                    <label for="formGroupExampleInput" class="form-label fw-bold">รหัสสมาชิก</label>
                                    <input type="number" name="id" value="{{ $user->id }}" class="form-control">
                                </div> -->
                                <div clasa="col-md-12">
                                    <label for="formGroupExampleInput" class="form-label fw-bold">อีเมล</label> 
                                    <input type="Email" name="email" value="{{ $user->email }}" class="form-control" >
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อ</label>
                                        <input type="text" name="name"class="form-control" value="{{ $user->name }}" >
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">นามสกุล</label>
                                        <input type="text" name="lname"class="form-control" value="{{ $user->lname }}" >
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อเล่น</label>
                                        <input type="text" name="Nname"class="form-control" value="{{ $user->Nname }}" >
                                    </div>
                                    <div class="col ">
                                            <label for="formGroupExampleInput" class="form-lable fw-bold">เพศ</label>
                                            <input type="text" name="sex"class="form-control" value="{{ $user->sex }}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="form-check-input" class="form-label fw-bold ">วัน / เดือน / ปีเกิด</label> <br>
                                        <input type="date" id="birthday" class="form-control" value="{{ $user->birthday }}" name="birthday" >
                                    </div>
                                    <div class="col ">
                                        <label for="inputState"  class="form-label" >สถานภาพ</label>
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
                                    <label for="formGroupExampleInput" class="form-label fw-bold">เบอร์โทรศัพท์</label> 
                                    <input type="number" name="tel" class="form-control" placeholder="xxx-xxx-xxxx" value="{{ $user->tel}}">
                                </div>
                                <!--ที่อยู๋ต้องเปลี่ยนเป็นป้อนค่าอัตโนมัติ-->
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold">ที่อยู่</label>
                                        <textarea class="form-control"  style="height: 100px" name="address" placeholder="ที่อยู่ปัจจุบัน">{{ $user->address}}</textarea>
                                </div>
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold">รหัสผ่าน</label>
                                        <input type="password" class="form-control" name="password" placeholder="********" value="{{ $user->password}}">
                                </div>
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold">รหัสผ่าน</label>
                                        <input type="password" class="form-control" name="password" placeholder="********" value="{{ $user->password}}">
                                            <ion-icon name="eye-off-outline"></ion-icon>
                                        
                                </div>
                                
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn btn-primary my-5 text-center">บันทึกข้อมูล</button></center>
                                </div>
                            </div>
                    </form>
            </div>
        </div>
    </div>
    

    
    <script>
        const pass_field = doucument.querySelector("pw");
        const show_btn = doucument.querySelector("i");
        show_btn.addEventListener("click", function){
            if(pass_field.type === "password"){
                pass_field.type = "text"
            }
        }

    </script>
    
@endsection

