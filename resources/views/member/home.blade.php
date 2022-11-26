@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<style>
.details::before {
    content: '';
    width: 90%;
    height: 6px;
    display: block;
    position: absolute;
    margin-top: 12px;
    z-index: -9;
    background: #3C8085;
    background: -moz-linear-gradient(left, #3C8085, #F6F5FF);
    background: -webkit-linear-gradient(left, #3C8085,#F6F5FF);
    background: linear-gradient(to right, #3C8085,#F6F5FF);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3C8085', endColorstr='#F6F5FF',GradientType=1 );
}
.details-title {
    margin-bottom: 10px;
    font-size: 18px;
}
.details-title-text {
    background-color: #F6F5FF;
    padding-right: 15px;
    color: #3C8085;
    
}
.details-title i {
    font-size: 22px;
    margin-right: 7px;
}
.user-item {
    text-align: center;
    display: block;
    padding: 10px;
    margin-top: 25px;
    font-weight: bold;
    text-decoration:none;
}
.user-item i {
    font-size: 30px;
    color: #3C8085;
}
.menu-text {
    font-size: 13px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    padding-top: 10px;
    
}
.menu-main {
    margin-right: -50px;
    margin-left: -50px;
    
}
.menu-main .col-auto {
    padding-right: 0px;
    padding-left: 0px;
    margin: 10px;
    width: 200px;
    
}
.menu-item {
    text-align: center;
    display: block;
    padding: 10px;
    color: #000;
    height: 106px;
    font-weight: bold;
    text-decoration:none;
}
.menu-item i {
    font-size: 40px;
    margin-right: 7px;
    color: #3C8085;
}
.menu-icon {
    font-size: 40px;
    margin-bottom: 12px;
    color: #3C8085;
}
.menu-desc {
    font-size: 13px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    padding-top: 15px;
    
}
</style>
@section('content')

        
                        @if ($message = Session::get('success'))
                         <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        @if ($message = Session::get('Q'))
                         <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                       
<div class="container">
    <div class="row ">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header h5 text-center">ยอดเงินในบัญชี</div>
                <div class="card-body">
                    <h3 class="text-center">{{$showuser[0]->balance}}</h3>
            </div>
        </div>
    </div>
    <div class="col-9"></div>
        <div class="col">
            <a class="user-item" href="{{route('showuser')}}" title="" >
                    <i class="bi bi-person-circle"></i>
                    <div class="menu-text">ข้อมูลผู้ใช้</div>
            </a>
        </div>
</div>
</div>
<div class="container">
    <div class="details mt-5" >
        <div class="details-title">
            <span class="details-title-text">
                <i class="bi bi-info-circle-fill" ></i>
                ฝาก - ถอน </span>
                
                <div class="row menu-main justify-content-center justify-content-sm-start mt-2">
                    <div class="col-auto">
                        <a class="menu-item" href="{{ route ('detail') }}" title="" >
                            <i class="bi bi-cash-coin" ></i>
                            <div class="menu-desc">รายละเอียดการฝาก - ถอน</div>
                        </a>
                    </div>
                </div>
        </div>
    </div>



    <div class="details mt-5" >
        <div class="details-title">
            <span class="details-title-text">
                <i class="bi bi-info-circle-fill" ></i>
                ซารีกัตมาตี </span>

                <div class="row menu-main justify-content-center justify-content-sm-start mt-2">
                    <div class="col-auto">
                        <a class="menu-item" href="{{ route('Usersarikatmati') }}" title="" >
                            <i class="bi bi-journal-bookmark-fill"></i>
                            <div class="menu-desc">ข้อมูลซารีกัตมาตี</div>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    <div class="details mt-5" >
        <div class="details-title">
            <span class="details-title-text">
                <i class="bi bi-info-circle-fill" ></i>
                รายละเอียดการกู้ </span>

                <div class="row menu-main justify-content-center justify-content-sm-start mt-2">
                    <div class="col-auto">
                        <a class="menu-item" href="{{ route('loancreate') }}" title="" >
                            <i class="bi bi-bank"></i>
                            <div class="menu-desc">คำขอกู้เงินกองทุน</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="menu-item" href="{{ route('createage')}}" title="" >
                            <i class="bi bi-clipboard-data-fill"></i>
                            <div class="menu-desc">สัญญากู้</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="menu-item" href="{{route('warn')}}" title="" >
                            <i class="bi bi-bell-fill"></i>
                            <div class="menu-desc">สถานะการกู้เงิน</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="menu-item" href="#" title="" >
                            <i class="bi bi-currency-exchange"></i>
                            <div class="menu-desc">หนี้สินคงเหลือ</div>
                        </a>
                    </div>
                </div>


                <div class="row menu-main justify-content-center justify-content-sm-start mt-2">
                    <div class="col-auto">
                        <a class="menu-item" href="{{ route ('showloan') }}" title="" >
                            <i class="bi bi-journal-bookmark-fill"></i>
                            <div class="menu-desc">ข้อมูลคำขอกู้เงินกองทุน</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="menu-item" href="#" title="" >
                            <i class="bi bi-journal-bookmark-fill"></i>
                            <div class="menu-desc">ข้อมูลสัญญากู้เงิน</div>
                        </a>
                    </div>
                </div>
        </div>
    </div><br><br>
</div>
@endsection
