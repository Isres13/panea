@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>
tr{
    text-align: center;
}
</style> 
</head>
    
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg">
<!-- Flex -->   <div class="alert " style="background: #3C8085;  margin-bottom: 0rem; ">
                    <div class="d-flex align-items-center ">
                        <div class=" ms-3"   >
                            <p class="h3 fw-bold text-white ">ประเภทกองทุน</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content   bd-highlight bg-gray-100 ">
<!--กลุ่มปุ่ม ButtonGroup-->
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="{{ route('loan.index') }}"  class="btn btn-outline-secondary text-dark">ขอกู้กองทุน</a>
                    <a href="{{ route('fundoi') }}"  class="btn btn-outline-secondary text-dark">คืนเงิน</a>
                    <a href="#"  class="btn btn-outline-secondary active">ประเภทกองทุน</a>
                </div>
                </div>

                            <div>
                                <div class="alert alert-Light border rounded-1 p-1  " role="alert">
                                <div class="continea">
                    <div class="row ">
                        <div class="  mx-auto">
                            <div class=""row mt-4>
                                <h3 class="text-center mt-3">ข้อมูลประเภทกองทุน</h3>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3 ">
                                        <button type="button" class="btn btn-success btn" data-bs-toggle="modal" data-bs-target="#type">
                                            เพิ่มประเภทกองทุน
                                        </button>
                                        <button type="button" class="btn btn-success btn" data-bs-toggle="modal" data-bs-target="#deposit">
                                            เพิ่มจำนวนเงินกองทุน
                                        </button>
                                    </div>
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
                            <th scope="col"  width="30px">ลำดับ</th>
                            <th scope="col">รหัสกองทุน</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">จำนวนเงิน</th>
                            <th width="300px"></th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        @php($i=1)
                            @foreach( $fund as $row)
                            <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$row->fund_id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->balance}}</td>
                            <td>
                                <a href=" {{ route('fundedit', $row->fund_id) }} " class="btn btn-success ">แก้ไข</a>
                                <a href=" {{ route('fundshow', $row->fund_id) }} " class="btn btn-info">view</a>
                            </td>
                            </tr>@endforeach
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
 <!-- เพิ่มประเภทกองทุน    -->
    <div class="modal" id="type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title " id="staticBackdropLabel">เพิ่มประเภทกองทุน</h2>
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
            <form  class="mt-3" action="{{ route('fundtype.store') }}" method="post">
                        @csrf
                            <div class="mx-aotu">
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อกองทุน</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="ชื่อกองทุน">
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">จำนวนเงินเริ่มต้น</label>
                                        <input type="number"  id="amount" name="amount" class="form-control" placeholder="จำนวน" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รายละเอียดกองทุน</label>
                                        <textarea class="form-control"  style="height: 100px" name="details" placeholder="รายละเอียด" ></textarea>
                                    </div>
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
    
    <!-- เพิ่มจำนวนเงินกองทุน -->
    <div class="modal" id="deposit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title " id="staticBackdropLabel">เพิ่มจำนวนเงินกองทุน</h2>
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
            <form  class="mt-3" action="{{route('fundtypeD.store')}}" method="post">
                        @csrf
                            <div class="mx-aotu">
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ชื่อองค์กร / หน่วยงาน</label>
                                        <input type="text"  id="name_OG" name="name_OG" class="form-control" placeholder="องค์กร,หน่วยงาน" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">จำนวนเงิน</label>
                                        <input type="number"  id="amount" name="amount" class="form-control" placeholder="จำนวน" >
                                    </div>
                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">ประเภทกองทุน</label>
                                        <select class="form-control " aria-label="Default select example" name="fund_id" placeholder="--เลือกประเภทกองทุน--"><option>--เลือกประเภทกองทุน--
                                         @foreach($fund as $row) 
                                        <option  value="{{$row->fund_id}}">{{$row->name}}@endforeach </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
            </form>
            </div>
        </div>
        </div>
    </div>  

@endsection
