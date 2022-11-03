@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
@section('content')

<div class="conteiner ">
<div>
    <div class="card "  style="max-width: 60rem; left: 150px; top: 100%">
        <div class=" row ">
            <div class=" col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h2 class="text-center">แสดงข้อมูล</h2>
                        <a href="{{route('employee.index')}}" class="btn btn-primary my-3 float-start ">ย้อนกลับ</a>
                    </div>
                </div>

               
                    <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="mx-autu">
                                <div clasa="md-3">
                                    <strong>รหัสคณะกรรมการ :</strong>
                                    <input type="text" name="employee_id" class="form-control" value="{{ $employee->employee_id }}" >
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <strong>ชื่อ :</strong>
                                        <input type="text" name="name"class="form-control" value="{{ $employee->name }}" >
                                    </div>
                                    <div class="col">
                                        <strong>นามสกุล :</strong>
                                        <input type="text" name="lname"class="form-control" value="{{ $employee->lname }}"  >
                                    </div>
                                </div>
                                <div class="col ">
                                        <strong>ตำแหน่งงาน :</strong>
                                        <input type="text" name="rank" class="form-control" value="{{ $employee->rank}}">
                                    </div>
                                <div class="col">
                                        <strong>รูปภาพ :</strong>
                                        <div class="form-group mt-3 text-center">
                                            <img src="{{asset($employee->picture)}}" alt="" width="50%" height="50%">
                                         </div>  
                                </div>
                                
                            </div>
                    </form>
            </div>
        </div> 
      </div> <br>
    </div>
</div>

@endsection