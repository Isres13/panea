@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

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
                            <p class="h3 fw-bold text-white ">คำขอกู้</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content   bd-highlight bg-gray-100 ">
<!--กลุ่มปุ่ม ButtonGroup-->
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="#"  class="btn btn-outline-secondary text-dark">ขอกู้กองทุน</a>
                    <a href="{{ route('fundoi') }}"  class="btn btn-outline-secondary text-dark">คืนเงิน</a>
                    <a href="{{ route('fundtype.index') }}"  class="btn btn-outline-secondary text-dark">ประเภทกองทุน</a>
                </div>
                </div>

                <div>
                    <div class="alert alert-Light border rounded-1 p-1  " role="alert">
                    <div class="continea">
        <div class="row ">
            <div class="  mx-auto">
                <div class=""row mt-4>
                    <h3 class="text-center mt-3">ข้อมูลคำขอกู้</h3>
                    <a href="{{ route('loan.create') }}" class="btn btn-success my-3 float-end">เพิ่มคำขอกู้</a>
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
                <th scope="col">ชื่อผู้กู้</th>
                <th scope="col">จำนวนเงิน</th>
                <th scope="col">ประเภท</th>
                <th scope="col">จำนวนงวด</th>
                <th width="130px"></th>
                <th width="200px"></th>
                <th></th>
            </tr>
        </thead>
            
        <tbody>
        @php ($i=1)
          @foreach( $loan as $row)
                <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{ $row->name}} {{ $row->lname }}</td>
                <td>{{ $row->amount }}</td>
                <td>{{ $row->namefund}}</td>
                <td>{{ $row->installment}}</td>
                <td>
                    @if($row->Approval == 0)
                        <p class="btn btn-warning">รอการอนุมัติ</p>
                    @endif
                    @if($row->Approval == 1 || $row->Approval == 3)
                        <p class="btn btn-success">อนุมัติ</p>
                    @endif
                    @if($row->Approval == 2)
                        <p class="btn btn-danger">ไม่อนุมัติ</p>
                    @endif
                </td>
                <td>
                    @if($row->Approval == 1)
                        <a href="{{route('agreemant' ,$row->loan_id )}}" class="btn btn-warning">ทำสัญญากู้</a>
                        <!-- <a href="#" class="btn btn-danger">ลบ</a> -->
                    @endif
                    @if($row->Approval == 2)
                        <a href="#" class="btn btn-danger">ลบ</a>
                    @endif
                    @if($row->Approval == 3)
                        <a href="{{ route('showagreemant' ,$row->loan_id )}}" class="btn btn-Primary">ดูสัญญากู้</a>
                        <!-- <a href="#" class="btn btn-danger">ลบ</a> -->
                    @endif
                </td>
                <td>
                    @if($row->Approval == 0)
                        <a href="{{ route ('status1', $row->loan_id ) }}" class="btn btn-success bi bi-check2-circle" onclick="return confirm('คุณต้องอนุมัติการขอกู้นี้หรือไหม')"></a>
                        <a href="{{ route ('status2', $row->loan_id ) }}" class="btn btn-danger bi bi-x-circle" onclick="return confirm('คุณต้องแน่ใจ! จะไม่อนุมัติการขอกู้นี้หรือไหม')"></a>
                    @endif
                </td>
                </tr>


           @endforeach   
           
        </tbody>
    </table>
            
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
            


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
