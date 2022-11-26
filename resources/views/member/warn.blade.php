@extends('layouts.app')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>
 i {
    font-size: 30px;
    margin-right: 7px;
    color: #3C8085;
}
.details-title {
    margin-bottom: 10px;
    font-size: 18px;
    padding-right: 15px;
}
</style> 
</head>
    
@section('content')
<div class="container  body" style="padding-bottom: 3rem; padding-top: 3rem; max-width: 1000px;">
    <div class="contain">
    <div class="details-title">
        <i class="bi bi-bell-fill"></i>
        <strong class="" > แจ้งเตือน  </strong>
    </div> 

    
    <div class="mt-3">
        <a href="{{ route('home') }}" class="btn  my-3 " style="background-color: #3C8085; color: #FFF;">ย้อนกลับ</a>
    </div>
    

    </div>
    <br>
    <hr>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-9">

            @foreach( $loan as $row )
            <div class="container overflow-hidden alert alert-success mt-3">
                            <div class="row ">
                                    <div class="p-1  text-end text-dark">
                                        @if($row->Approval == 0 )
                                            <div class="alert alert-Warning text-center fs-5" role="alert" style="left: 50px;" >
                                                คำขอกู้ของคุณยังไม่ได้รับการอนุมัติแล้ว
                                            </div>
                                        @endif
                                        @if($row->Approval == 1 )
                                            <div class="alert alert-Success text-center fs-5" role="alert" style="left: 50px;">
                                                คำขอกู้ของคุณได้รับการอนุมัติแล้ว
                                            </div>
                                        @endif
                                        @if($row->Approval == 2)
                                            <div class="alert alert-Danger text-center fs-5" role="alert" style="left: 50px;">
                                                คำขอกู้ของคุณไม่ผ่าน
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
            </div>
            @endforeach
            </div>
            <div class="clo-1"></div>
        </div>   
</div>
</div>

 

@endsection
