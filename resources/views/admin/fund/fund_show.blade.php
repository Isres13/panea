@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
@section('content')

<div class="conteiner ">
<div>
    <div class="card "  style="max-width: 60rem; left: 140px; top: 100%">
        <div class=" row ">
            <div class=" col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h2 class="text-center">รายการเงินกองทุน{{$show[0]->name}}</h2>
                        <a href="{{route('fundtype.index')}}" class="btn btn-primary my-3 float-start ">ย้อนกลับ</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        
                    </div>
                    <div class="col">
                        <p class=" text-center h5  alert alert-secondary text-dark">ยอดเงิน : {{$show[0]->balance}}</p>
                    </div>
                </div>
                
                @foreach( $show as $row )
                        <div class="container overflow-hidden alert alert-success mt-3">
                        <div class="row ">
                                <div class="col ">
                                    <div class="p-1 text-dark fs-5 fw-bold">{{$row->name_OG}}</div>
                                    <div class="p-1 text-dark">{{$row->created_at}}</div>
                                </div>
                                <div class="col-2">
                                <div class="p-1  text-end text-dark" style="margin-top: 19px;">+ {{$row->	amount}}</div>
                                </div>
                        </div>

                            
                @endforeach
                     
                
                            

@endsection