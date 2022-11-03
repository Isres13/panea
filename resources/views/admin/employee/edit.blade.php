@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
@section('content')

<div class="conteiner ">
<div>
    <div class="card "  style="max-width: 60rem; left: 150px;">
        <div class=" row ">
            <div class=" col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h2 class="text-center">แก้ไขข้อมูล</h2>
                        <a href="{{route('employee.index')}}" class="btn btn-primary my-3 float-start ">ย้อนกลับ</a>
                    </div>
                </div>

               
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="mx-autu">
                                <div clasa="md-3">
                                    <label for="formGroupExampleInput" class="form-label fw-bold">รหัสคณะกรรมการ</label>
                                    <input type="text" name="employee_id" class="form-control" value="{{ $employee->employee_id }}" >
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อ</label>
                                        <input type="text" name="name"class="form-control" value="{{ $employee->name }}" >
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">นามสกุล</label>
                                        <input type="text" name="lname"class="form-control" value="{{ $employee->lname }}"  >
                                    </div>
                                </div>
                                <div class="col ">
                                        <label for="inputState" class="form-label fw-bold">ตำแหน่งงาน</label>
                                            <select id="inputState" class="form-select" name="rank" value="{{ $employee->rank}}">
                                            <option selected>{{ $employee->rank }}</option>
                                            <option >ทะเบียน</option>
                                            <option >การเงิน</option>
                                            </select>
                                    </div>
                                <div class="col">
                                        <label for="formGroupExampleInput"  class="form-lable fw-bold ">รูปภาพ</label>
                                        <input class="form-control " type="file" name="picture">
                                </div>
                                <!--การเก็บรูปภาพก่อนจะมาอัพเดต-->
                                <input type="hidden" name="old_picture" value="{{ $employee->picture}}">
                                <div class="form-group mt-3 text-center">
                                    <img src="{{asset($employee->picture)}}" alt="" width="30%" height="30%">
                                </div>
                                
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn btn-primary my-5 text-center">บันทึกข้อมูล</button></center>
                                </div>
                            </div>
                    </form>
            </div>
        </div> 
     </div> <br>
    </div>
</div>

@endsection