@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
    
@section('content')
<div class="conteiner">
<div>
    <div class="card "  style="max-width: 60rem; left: 150px;">
        <div class=" row ">
            <div class=" col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h2 class="text-center">แก้ไขข้อมูล</h2>
                        <a href="{{route('fundtype.index')}}" class="btn btn-primary my-3 float-start ">ย้อนกลับ</a>
                    </div>
                </div>

               
                    <form action="{{ route('fundupdate', $fund_t[0]->fund_id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                            <div class="mx-aotu">
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อกองทุน</label>
                                        <input type="text" id="name" name="name" value="{{$fund_t[0]->name}}" class="form-control" >
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">จำนวนเงินเริ่มต้น</label>
                                        <input type="number"  id="amount" name="amount" class="form-control" value="{{$fund_t[0]->balance}}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รายละเอียดกองทุน</label>
                                        <textarea class="form-control"  style="height: 100px" name="details" >{{$fund_t[0]->details}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                    </form>
            </div>
        </div> 
     </div> <br>
    </div>
</div>

@endsection
