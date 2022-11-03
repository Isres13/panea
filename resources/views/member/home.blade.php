@extends('layouts.app')

@section('content')
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
</div>
@endsection
