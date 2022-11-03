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
                <div class="row mt-4">
                    <h3 class="text-center mt-3">ข้อมูลการฝาก-ถอน</h3>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3 ">
                            <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#deposit">
                                ฝาก - ถอน
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('M'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
    @endif

    @if ($message = Session::get('P'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif

    @if ($message = Session::get('W'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
    @endif
       
    <table class="table mt-3">
        <thead>
            <tr>
                <th width="90px">ลำดับ</th>
                <th>ชื่อ-สกุลสมาชิก</th>
                <th>ยอดคงเหลือ</th>
                <th >วันที่</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php($i=1)
                @foreach( $depositwithdraw as $row )
                <tr>
                    <th >{{$i++}}</th>
                    <td>{{$row->name}} {{$row->lname}}</td>
                    <td>{{$row->balance}}</td>
                    <td>{{$row->updated_at}}</td>
                    <td>
                        <a href="{{route('listDW',$row->id)}}" class="btn btn-info">view</a>
                    </td>
                </tr>@endforeach
        </tbody>
    </table>




<!-- formฝาก - ถอน -->
    <div class="modal" id="deposit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title " id="staticBackdropLabel">ฝาก</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
            <form  class="mt-3" action="{{ route('DWmoney.store') }}" method="post">
                        @csrf
                            <div class="mx-aotu">
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รหัสสมาชิก</label>
                                        <input type="number" id="user_id" name="user_id" class="form-control" placeholder="รหัสสมาชิก">
                                    </div>
                                    <div class="col ">
                                        <label for="inputState"  class="form-label fw-bold">ประเภท</label>
                                            <select id="withdraw" class="form-select"  name="type">
                                            <option value="0">ฝาก</option>
                                            <option value="1">ถอน</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">จำนวนเงิน</label>
                                        <input type="number" name="money" id="money" class="form-control" placeholder="จำนวน" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
            </form>
            </div>
        </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection