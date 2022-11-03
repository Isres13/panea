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
                <h2>ข้อมูลซารีกัตมาตี</h2>
            </div>
           
           
            <form action="#" class=" p-5">
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
                            <input type="text" class="form-control" value="{{$viewF[0]->name}} {{$viewF[0]->lname}}"><br>
                            <strong>วันที่สมัคร</strong>
                            <input type="date" name="applydate" placeholder="ชื่อ" class="form-control"value="{{$viewF[0]->applydate}}">
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
                            </thead>
                              <tbody>
                              @php($i=1)
                                 @foreach( $viewF as $row )
                                <tr>
                                    <td></td>
                                        <td>
                                            <input type="text" name="name" class="form-control mt-1" value="{{ $row->namef }}"/>
                                        </td>
                                        <td>
                                            <input type="text" name="lname"  class="form-control mt-1" value="{{ $row->lnamef }}"/></td>
                                        <td>
                                            <input type="text" name="sex"  class="form-control mt-1" value="{{ $row->sex }}"/></td>
                                        </td> 
                                        <td>
                                            <input type="text" name="birthday"  class="form-control mt-1" value="{{ $row->birthday }}"/>
                                        </td> 
                                    </tr>
                                    @endforeach
                              </tbody>
                          </table>
                    </div>
                   
                    
                    

                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
 


@endsection
