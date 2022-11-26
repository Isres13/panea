@extends('layouts.app')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
    
@section('content')
<div class="container  body" style="padding-bottom: 3rem; padding-top: 3rem; max-width: 1000px;">
    <div class="contain">
    <div>
        <a href="{{ route('home') }}" class="btn  my-3 " style="background-color: #3C8085; color: #FFF;">ย้อนกลับ</a>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col">
            <strong class="fs-6">รหัสซารีกัตมาตี : {{ $sarikatmati[0]->sarakatmati_id }}</strong>
        </div>
        <div class="col">
            <strong class="fs-6">ชื่อ-นามสกุล : {{ $sarikatmati[0]->name }} {{ $sarikatmati[0]->lname }}</strong>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col">
            <strong class="fs-6">วันที่สมัคร : {{ $sarikatmati[0]->applydate }}</strong>
        </div>
        <div class="col-5"></div>
    </div>
    </div>
    <br>
    <hr>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-9">
                @if($sarikatmati[0]->type == 0) 
                    <div class="alert alert-Danger text-center fs-5" role="alert" style="left: 50px;">
                        คุณยังไม่ชำระซารีกัตมาตี
                    </div>
                @endif
                @if($sarikatmati[0]->type == 1) 
                    <div class="alert alert-Success text-center fs-5" role="alert" style="left: 50px;">
                        ชำระซารีกัตมาตีเรียบร้อย
                    </div>
                @endif
            </div>
            <div class="clo-1"></div>
        </div>
    <hr> 
    <div class="">
        <strong class="fs-6"> ข้อมูลสมาชิกในครอบครัว : </strong>
    </div>   
    <div>
    <table class="table table-responsive-lg text-center " id="dynamicAddRemove">
                          
                          <tr class=" text-white  fs-6" style="background: #3C8085" >
                            <th width="30 px ">#</th>
                            <th width="100 px">ชื่อ</th>
                            <th width="100 px">นามสกุล</th>
                            <th width="100 px">เพศ</th>
                            <th width="100 px">วัน/เดือน/ปี เกิด</th>
                          </tr>
    </thead>
    <tbody>
                              @php($i=1)
                                 @foreach( $sarikatmati as $row )
                                <tr>
                                    <td>{{$i++}}</td>
                                        <td>
                                            <input type="text" name="name" class="form-control mt-1" value="{{ $row->namef }}"/>
                                        </td>
                                        <td>
                                            <input type="text" name="lname"  class="form-control mt-1" value="{{ $row->lnamef }}"/></td>
                                        <td>
                                            <input type="text" name="sex"  class="form-control mt-1" value="{{ $row->sex }}"/></td>
                                        </td> 
                                        <td>
                                            <input type="text" name="birthday"  class="form-control mt-1" value="{{ $row->birthday }}"/>
                                        </td> 
                                    </tr>
                                    @endforeach
                              </tbody>
</div>
</div>

 

@endsection
