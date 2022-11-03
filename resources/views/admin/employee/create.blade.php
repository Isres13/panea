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
                        <h2 class="text-center">เพิ่มข้อมูลคณะกรรมการ</h2>
                        <a href="{{route('employee.index')}}" class="btn btn-primary my-3 float-start ">ย้อนกลับ</a>
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

    
                    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="mx-aotu">
                                <div clasa="md-3">
                                    <label for="formGroupExampleInput" class="form-label fw-bold">รหัสคณะกรรมการ</label>
                                    <input type="text" name="employee_id" class="form-control" placeholder="รหัสคณะกรรมการ">
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อ</label>
                                        <input type="text" name="name"class="form-control" placeholder="ชื่อ" maxlength>
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">นามสกุล</label>
                                        <input type="text" name="lname"class="form-control" placeholder="นามสกุล" >
                                    </div>
                                </div>
                                <div class="col ">
                                        <label for="inputState" class="form-label fw-bold">ตำแหน่งงาน</label>
                                            <select id="inputState" class="form-select" name="rank">
                                            <option selected>ตำแหน่งงาน</option>
                                            <option >ทะเบียน</option>
                                            <option >การเงิน</option>
                                            </select>
                                    </div>
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold ">รูปภาพ</label>
                                        <input class="form-control " type="file" id="formFile" name="picture">
                                </div>
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn btn-primary my-5 text-center">เพิ่มข้อมูล</button></center>
                                </div>
                            </div>
                    </form>
            </div>
        </div> 
     </div> <br>
    </div>
</div>

@endsection