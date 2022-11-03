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
                            <p class="h3 fw-bold text-white ">คำขอกู้</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content   bd-highlight bg-gray-100 ">
<!--กลุ่มปุ่ม ButtonGroup-->
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="#"  class="btn btn-outline-secondary text-dark">ขอกู้กองทุน</a>
                    <a href="{{ route('contractF') }}"  class="btn btn-outline-secondary text-dark">สัญญากู้</a>
                    <a href="{{ route('fundD') }}"  class="btn btn-outline-secondary text-dark">คืนเงิน</a>
                    <a href="{{ route('typeF') }}"  class="btn btn-outline-secondary text-dark">ประเภทกองทุน</a>
                </div>
                </div>

                <div>
                    <div class="alert alert-Light border rounded-1 p-1  " role="alert">
                    <div class="continea">
        <div class="row ">
            <div class="  mx-auto">
                <div class=""row mt-4>
                    <h3 class="text-center mt-3">ข้อมูลคำขอกู้</h3>
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
