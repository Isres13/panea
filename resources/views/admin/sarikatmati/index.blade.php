@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
<style>

</style> 
</head>
    
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg">
<!-- Flex -->   <div class="alert " style="background: #3C8085;  margin-bottom: 0rem; ">
                    <div class="d-flex align-items-center ">
                        <div class=" ms-3"   >
                            <p class="h3 fw-bold text-white ">ซารีกัตมาตี</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content   bd-highlight bg-gray-100 ">
<!--กลุ่มปุ่ม ButtonGroup-->
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="#" class="btn btn-outline-secondary text-dark">สมัครซารีกัตมาตี</a>
                    <a href="{{ route('DWsrikat') }}"  class="btn btn-outline-secondary text-dark">จ่ายเงิน</a>
                    <a href="{{ route('Wsrikatmati') }}"  class="btn btn-outline-secondary text-dark">เบิกเงิน</a>
                </div>
                </div>

                <div>
                    <div class="alert alert-Light border rounded-1 p-1  " role="alert">
                    <div class="continea">
        <div class="row ">
            <div class="  mx-auto">
                <div class=""row mt-4>
                    <h3 class="text-center mt-3">ข้อมูลซารีกัตมาตี</h3>
                    <a href="{{route('sarikatmati.create')}}" class="btn btn-success my-3 float-end">เพิ่มข้อมูลซารีกัตมาตี</a>
                </div>
            </div>
        </div>
    </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
         @endif
    <table class="table">
        <thead class="table-light">
            <tr class="TRCENTER">
                <th scope="col"  width="150px">ลำดับ</th>
                <th scope="col">รหัสซารีกัตมาตี</th>
                <th scope="col">ชื่อ - สกุล</th>
                <th scope="col">วันที่สมัคร</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php($i=1)
                @foreach( $sarikatmati as $row )
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$row->sarakatmati_id}}</td>
                    <td>{{$row->name}} {{$row->lname}}</td>
                    <td>{{$row->applydate}}</td>
                    <td>
                        <a href="{{route('viewS', $row->sarakatmati_id)}}" class="btn btn-info">view</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
