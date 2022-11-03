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
<div class="continea">
        <div class="row ">
            <div class="  mx-auto">
                <div class="">
                    <h3 class="text-center mt-3">ข้อมูลคณะกรรมการ</h3>
                    <a href="{{ route('employee.create') }}" class="btn btn-success my-3 float-end">เพิ่มข้อมูลคณะกรรมการ</a>
                </div>
            </div>
        </div>
</div>
    @if ($message = Session::get('success'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
    @endif
    <table class="table">
        <thead class="table-light">
            <tr class="TRCENTER">
                <th scope="col"  width="30px">ลำดับ</th>
                <th scope="col">รหัสคณะกรรมการ</th>
                <th scope="col">ชื่อ - สกุล</th>
                <th scope="col">ตำแหน่ง</th>
                <th scope="col">รูป</th> 
                <th width="300px"></th>
            </tr>
        </thead>
            
        <tbody>
            @php($i=1)
                @foreach( $em as $employee  )
                <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$employee->employee_id}}</td>
                <td>{{$employee->name}} {{$employee->lname}}</td>
                <td>{{$employee->rank}}</td>
                <td>
                    <img src="{{asset($employee->picture)}}" alt="" width="80px" height="100px">
                </td>
                <td>
                    <form class="EDS"action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                        <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-info">เพิ่มเติม</a>
                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">แก้ไข</a>
                        @csrf <!--Cross-site request forgery เป็นตัวป้องกันฟอร์ม-->
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">ลบ</button>
                    </form>
                </td>
                </tr>@endforeach
        </tbody>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection