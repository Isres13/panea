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
            <div class=" mx-auto">
                <div class=""row mt-4>
                    <h2 class="text-center mt-3">ข้อมูลสมาชิก</h2>
                    <form action="{{ route('user.index') }}" method="get">
                        <div class="row">
                            <div class="col-5">
                                <input type="text" class="my-3 form-control" name="search" placeholder="ค้นหารหัสสมาชิก , ชื่อ">
                            </div>
                            <div class="col">
                                <a href="{{ route('user.create') }}" class="btn btn-success my-3 float-end">เพิ่มข้อมูลสมาชิก</a>
                            </div> 
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-info">ค้นหา</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
</div>
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif

    @if ($message = Session::get('D'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
    @endif
    <table class="table mt-3">
        <thead class="table-light">
            <tr class="TRCENTER">
                <th scope="col"  width="30px">ลำดับ</th>
                <th scope="col">รหัสสมาชิก</th>
                <th scope="col">ชื่อ - สกุล</th>
                <th scope="col" width="30px">เพศ</th>
                <th scope="col">เบอร์โทรศัพท์</th> 
                <th width="300px"></th>
            </tr>
        </thead>   
        <tbody>
            @php($i=1)
                @foreach( $user as $users )
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}} {{$users->lname}}</td>
                    <td>{{$users->sex}}</td>
                    <td>{{$users->tel}}</td>
                    <td>
                        <form class="EDS"action="{{ route('user.destroy', $users->id) }}" method="POST">
                            <a href="{{ route('user.show', $users->id) }}" class="btn btn-info">เพิ่มเติม</a>
                            <a href="{{ route('user.edit', $users->id) }}" class="btn btn-primary">แก้ไข</a>
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