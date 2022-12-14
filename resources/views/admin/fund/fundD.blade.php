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
                            <p class="h3 fw-bold text-white ">คืนเงิน</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content   bd-highlight bg-gray-100 ">
<!--กลุ่มปุ่ม ButtonGroup-->
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="{{ route('loan.index') }}"  class="btn btn-outline-secondary text-dark">ขอกู้กองทุน</a>
                    <a href="#"  class="btn btn-outline-secondary text-dark">คืนเงิน</a>
                    <a href="{{ route('fundtype.index') }}"  class="btn btn-outline-secondary text-dark">ประเภทกองทุน</a>
                </div>
                </div>
        <div class="card  mt-3"  style="max-width: 60rem; left: 150px; ">
        <div class=" row ">
            <div class=" col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <h3 class="text-center">คืนเงิน</h3>
                    </div>
                </div>
    
                    <form action="#" method="POST">
                        @csrf
                            <div class="mx-aotu " >
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">รหัสสมาชิก</label>
                                        <input type="number" name="" class="form-control" placeholder="รหัสสมาชิก" maxlength>
                                    </div>
                                    <div class="col ">
                                        <label for="inputState" name="status"class="form-label fw-bold">ฝาก - ถอน</label>
                                            <select id="inputState" class="form-select">
                                            <option selected></option>
                                            <option >ฝาก</option>
                                            <option >ถอน</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label for="formGroupExampleInput" class="form-label fw-bold">จำนวน</label>
                                        <input type="number" name="" class="form-control" placeholder="จำนวน" maxlength>
                                    </div>
                                    <div class="col-md-4 ">
                                        <label for="birthday" class="form-label fw-bold ">วัน / เดือน / ปีเกิด</label> <br>
                                        <input type="date" id="birthday" name="" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center><button type="Submit" class="btn btn-primary my-5 text-center">เพิ่มข้อมูล</button></center>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
                <div>
                    <div class="alert alert-Light border rounded-1 p-1  mt-3" role="alert">
                                    <div class="continea">
                        <div class="row ">
                            <div class="  mx-auto">
                                <div class=""row mt-4>
                                    <h3 class="text-center mt-3">ข้อมูลการคืนเงิน</h3>
                                    <a href="{{ route('employee.create') }}" class="btn btn-success my-3 float-end">Creat new member</a>
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
                                <th scope="col">รหัสคณะกรรมการ</th>
                                <th scope="col">ชื่อ - สกุล</th>
                                <th scope="col">ตำแหน่ง</th>
                                <th scope="col">รูป</th> 
                                <th width="300px"></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            
                                
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <form class="EDS"action="#" method="POST">
                                        <a href="#" class="btn btn-info">show</a>
                                        <a href="#" class="btn btn-primary">edit</a>
                                        @csrf <!--Cross-site request forgery เป็นตัวป้องกันฟอร์ม-->
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                                </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
        </div>
    </div>
</div>  
@endsection
