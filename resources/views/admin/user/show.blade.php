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

    
                    <form >
                            <div class="mx-aotu">
                                <div clasa="col-md-12">
                                    <strong>รหัสสมาชิก :</strong>
                                    <input type="number" name="id" class="form-control" value="{{ $user->id }}">
                                </div>
                                <div clasa="col-md-12">
                                    <strong>อีเมล :</strong>
                                    <input type="Email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <strong>ชื่อ :</strong>
                                        <input type="text" name="name" class="form-control"  value="{{ $user->name }}">
                                    </div>
                                    <div class="col">
                                        <strong>นามสกุล :</strong>
                                        <input type="text" name="lname"class="form-control" value="{{ $user->lname }}">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <strong>ชื่อเล่น :</strong>
                                        <input type="text" name="Nname"class="form-control"  value="{{ $user->Nname }}">
                                    </div>
                                    <div class="col ">
                                        <strong>เพศ :</strong>
                                        <input type="text" name="sex"class="form-control" value="{{ $user->sex}}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <strong>วัน / เดือน / ปีเกิด :</strong> <br>
                                        <input type="date" id="birthday" class="form-control" name="birthday" value="{{ $user->birthday }}">
                                    </div>
                                    <div class="col ">
                                        <strong>สถานภาพ :</strong>
                                        <input type="text" class="form-control"  name="status" value="{{ $user->status }}">
                                    </div>
                                </div>
                                <div clasa="col">
                                    <strong>เบอร์โทรศัพท์ :</strong>
                                    <input type="number" name="tel" class="form-control" value="{{ $user->tel }}">
                                </div>
                                <!--ที่อยู๋ต้องเปลี่ยนเป็นป้อนค่าอัตโนมัติ-->
                                <div class="col">
                                        <strong>ที่อยู่ :</strong>
                                        <textarea class="form-control"  style="height: 100px" name="address">{{ $user->address }}</textarea>
                                </div>
                                <div class="col">
                                        <strong>รหัสผ่าน :</strong>
                                        <input type="password" class="form-control" name="password" value="{{ $user->tel }}"></input>
                                </div>
                                <!--<div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold">รหัสผ่าน</label>
                                        <input type="password" class="form-control" name="password" placeholder="********" >
                                            <ion-icon name="eye-off-outline"></ion-icon>
                                        </input>
                                </div>-->
                            
                            </div>
                    </form>
            </div><br><br><br>
        </div>
    </div>
    

@endsection
