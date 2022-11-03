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
                        <h2 class="text-center">เพิ่มข้อมูลสมาชิก</h2>
                        <a href="{{ route('user.index') }}" class="btn btn-primary my-3 ">ย้อนกลับ</a>
                    </div>
                </div>
                <!--Error-->
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

    
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
            
                        <div class="mx-aotu">
                                <!-- <div clasa="col-md-12">
                                    <label for="formGroupExampleInput" class="form-label fw-bold">รหัสสมาชิก</label>
                                    <input type="number" id="id" name="id" class="form-control" placeholder="รหัสสมาชิก">
                                </div> -->
                                <div clasa="col-md-12">
                                    <label for="formGroupExampleInput" class="form-label fw-bold">อีเมล</label> 
                                    <input type="Email" id="email" name="email" class="form-control" placeholder="@gmail.com">
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อ</label>
                                        <input type="text" id="name"name="name"class="form-control" placeholder="First name" maxlength>
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">นามสกุล</label>
                                        <input type="text" id="lname"name="lname"class="form-control" placeholder="Last name" >
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อเล่น</label>
                                        <input type="text" id="Nname" name="Nname"class="form-control" placeholder="First name" maxlength>
                                    </div>
                                    <div class="col ">
                                        <div class="form-ckeck form-ckeck=inline">
                                            <label for="formGroupExampleInput"  class="form-lable fw-bold">เพศ</label><br>
                                                <div class="form-ckeck form-check-inline mt-3">
                                                    <input class="form-check-input"type="radio" name="sex" id="sex" value="ชาย">
                                                    <label class="form-check-label" for="inlineRadio1">ชาย</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sex" id="sex" value="หญิง">
                                                    <label class="form-check-label" for="inlineRadio2">หญิง</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="form-check-input" class="form-label fw-bold ">วัน / เดือน / ปีเกิด</label> <br>
                                        <input type="date" id="birthday" class="form-control" name="birthday" >
                                    </div>
                                    <div class="col ">
                                        <label for="inputState" class="form-label" name="status">สถานภาพ</label>
                                            <select id="status" class="form-select" name="status">
                                                <option selected >โปรดเลือกสถานะ</option>
                                                <option>โสด</option>
                                                <option>แต่งงาน</option>
                                                <option>หม้าย</option>
                                                <option>หญ่า</option>
                                            </select>
                                    </div>
                                </div>
                                <div clasa="col">
                                    <label for="formGroupExampleInput" class="form-label fw-bold">เบอร์โทรศัพท์</label> 
                                    <input type="number" id="tel" name="tel" class="form-control" placeholder="xxx-xxx-xxxx" max Length="10">
                                </div>
                                <!--ที่อยู๋ต้องเปลี่ยนเป็นป้อนค่าอัตโนมัติ-->
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold @error('password') is-invalid @enderror">ที่อยู่</label>
                                        <textarea class="form-control"  style="height: 100px" name="address" placeholder="ที่อยู่ปัจจุบัน" ></textarea>
                                </div>
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold">รหัสผ่าน</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="********"  required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--confirmpassword-->
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold">ยืนยันรหัสผ่าน</label>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="********"  required autocomplete="new-password">
                                </div>
                                <!--<div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold">รหัสผ่าน</label>
                                        <input type="password" class="form-control" name="password" placeholder="********" >
                                            <ion-icon name="eye-off-outline"></ion-icon>
                                        </input>
                                </div>-->
                                
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn btn-primary my-5 text-center">เพิ่มข้อมูล</button></center>
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
