<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $em = Employee::paginate(5);
            return view('admin.employee.index', compact('em'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'lname' => 'required',
            'rank' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,png'
        ]);
        //dd($request->employee_id,$request->picture,$request->name,$request->lname);

        //การเข้ารหัสรูป
        $picture = $request->file('picture');
        
        //geaerate ชื่อภาพ
        $name_gen = hexdec(uniqid());
        //ดึงนามกลุนภาพ
        $img_ext = strtolower($picture->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
  
        //บันทึกข้อมูลภาพเข้า
        $upload_location = 'image/employee/';
        $full_path = $upload_location.$img_name;
        //dd($full_path);
        //การบันทึกข้อมูลและรูปภาพเข้าฐานข้อมูล
        Employee::create([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'lname' => $request->lname,
            'rank' => $request->rank,
            'picture' => $full_path
        ]);
        $picture->move($upload_location,$img_name);
        //Employee::create($request->all());
            return redirect()->route('employee.index')
               ->with('success' , 'Employee has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        return view('admin.employee.edit', compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //
        $request->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'lname' => 'required',
            'rank' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,png'
        ]);
        $picture = $request->file('picture');
        
        //อัพเดตภาพอย่างเดียว
        if($picture){
            //dd('มีการอัพเดตภาพอย่างเดียว');
            //การเข้ารหัสรูป
            $picture = $request->file('picture');
        
            //geaerate ชื่อภาพ
            $name_gen = hexdec(uniqid());
            //ดึงนามกลุนภาพ
            $img_ext = strtolower($picture->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
  
            //บันทึกข้อมูลภาพเข้า
            $upload_location = 'image/employee/';
            $full_path = $upload_location.$img_name;
            
            //อัพเดตข้อมูล
            Employee::find($id)->update([
                'picture' => $full_path
            ]);

            //ลบภาพเก่าแทนที่ด้วยภาพใหม่
            $old_picture = $request->old_picture;
            unlink($old_picture);
            $picture->move($upload_location,$img_name);
            //Employee::create($request->all());
                return redirect()->route('employee.index')
                   ->with('success' , 'Employee has been updated picture successfully.');
        }else{
            Employee::find($id)->update([
                'name' => $request->name,
                'lname' => $request->lname,
                'rank' => $request->rank,
            ]);

            return redirect()->route('employee.index')
                   ->with('success' , 'Employee has been updated successfully.');
        }
            //dd('มีการอัพเดตทุกอย่าง');
            
        
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
            return redirect()->route('employee.index')
                ->with('success', 'Employee delted sucessfully.');
    }
}
