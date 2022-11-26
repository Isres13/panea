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
                            <p class="h3 fw-bold text-white ">ถอนซารีกัตมาตี</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content   bd-highlight bg-gray-100 ">
<!--กลุ่มปุ่ม ButtonGroup-->
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="{{ route('sarikatmati.index') }}"  class="btn btn-outline text-dark" style="color: #3C8085; ">สมัครซารีกัตมาตี</a>
                    <a href="{{ route('DWsarikatmati') }}"  class="btn btn-outline- text-dark" style="color: #3C8085; ">จ่ายเงิน</a>
                    <a href="#"  class="btn btn-outline text-light active" style="Background: #3C8085; ">เบิกเงิน</a>
                </div>
                </div>


                <div>
                    <div class="alert alert-Light border rounded-1 p-1  mt-3" role="alert">
                        <div class="continea">
                            <div class="row ">
                                <div class="mx-auto">
                                    <div class=""row mt-4>
                                        <h3 class="text-center mt-3">ข้อมูลเบิกซารีกัตมาตี</h3>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3 ">
                                            <button type="button" class="btn btn-success btn" data-bs-toggle="modal" data-bs-target="#deposit">
                                                เบิกซารีกัตมาตี
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

                        <table class="table mt-3">
                            <thead class="table-light">
                                <tr class="TRCENTER">
                                    <th scope="col"  width="30px">ลำดับ</th>
                                    <th scope="col">รหัสซารีกัตมาตี</th>
                                    <th scope="col">รหัสคณะกรรมการ</th>
                                    <th scope="col">จำนวนเงิน</th>
                                    <th scope="col">วัน/เดือน/ปีที่จ่าย</th> 
                                </tr>
                            </thead>
                                
                            <tbody>
                               
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- จ่ายเงินซารีกัตมาตี modal  -->
<div class="modal" id="deposit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title " id="staticBackdropLabel">จ่ายซารีกัตมาตี</h2>
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
            <form  class="mt-3" action="#" method="post">
                        @csrf
                            <div class="mx-aotu">
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รหัสซารีกัตมาตี</label>
                                        <input type="number" id="sarikatmati_id" name="sarikatmati_id" class="form-control" placeholder="รหัสซารีกัตมาตี">
                                    </div>
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รหัสคณะกรรมการ</label>
                                        <input type="text" id="employee_id" name="employee_id" class="form-control dropdown-toggle" placeholder="รหัสคณะกรรมการ" >
                                        
                                        <option  > </option>
                                        </input>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">จำนวนเงิน</label>
                                        <input type="number"  id="amount" name="amount" class="form-control" placeholder="จำนวน" >
                                    </div>

                                    <div class="col">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">วัน/เดือน/ปีที่จ่าย</label>
                                        <input type="date" id="paymentdate" name="paymentdate"  class="form-control"  >
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
@endsection
