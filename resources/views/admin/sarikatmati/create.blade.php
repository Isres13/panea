@extends('layouts.layout')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

</style> 
</head>
    
@section('content')
<div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลซารีกัตมาตี</h2>
                <a href="{{route('sarikatmati.index')}}" class="btn btn-primary my-3 float-start ">ย้อนกลับ</a>
            </div>
           
           
            <form action="{{ route('sarikatmati.store') }}" method="post" class="mt-2">
                @csrf
                <div class="row">
                    <div class="col-md-12">  
                         @if ($message = Session::get('Error'))
                        <div class="alert alert-success mt-2">
                         <p>{{ $message }}</p>
                        </div>
                        @endif
                    
                    </div>
                    <div class="col-md-3">
                     
                        <div class="form-group my-3">
                            <strong>หัวหน้าครอบครัว</strong>
                            <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="id" placeholder="Enter subject"><option >
                                @foreach($user as $row) 
                                <option  value="{{$row->id}}">{{$row->name}} {{$row->lname}}@endforeach </option>
                            </select><br>
                            <strong>วันที่สมัคร</strong>
                            <input type="date" name="applydate" placeholder="ชื่อ" class="form-control">
                            @error('id')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <hr  style="height: 100 px">
                    <div class="col-md-12 mt-3 ml-1 text-center">
                       
                            <h4>สมาชิกในครอบครัว</h4>
                     
                    </div>
                   
                        
                        <table class="table table-responsive-lg text-center " id="dynamicAddRemove">
                          
                              <tr class=" text-white  " style="background: #3C8085" >
                                <th width="30 px">#</th>
                                <th width="100 px">ชื่อ</th>
                                <th width="100 px">นามสกุล</th>
                                <th width="100 px">เพศ</th>
                                  <th width="100 px">วัน/เดือน/ปี เกิด</th>
                                  <th width="100 px"><button type="button" name="add" id="dynamic-ar"  style="background: hsl(207, 96%, 11%) " class="btn text-white  px-3 bi bi-plus-square"> Add</button></th>
                              </tr>
                            </thead>
                              <tr>    
                              </tr>
                          </table>
                    </div>
                   
                    
                    <div class="col-md-4 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
       
     
  
  <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    
    $("#dynamic-ar").click(function () {
       
         $("#dynamicAddRemove").append('<tr><td></td><td><input type="text" name="namef[]" placeholder="ชื่อ" class="form-control mt-1" /></td><td><input type="text" name="lnamef[]" placeholder="นามสกุล" class="form-control mt-1" /></td><td><select class="form-select" name="sex[]"><option selected >--โปรดระบุ--</option><option>ชาย</option><option>หญิง</option></select></td> <td><input type="date" name="birthday[]" placeholder="" class="form-control mt-1" /></td> <td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>  


@endsection
