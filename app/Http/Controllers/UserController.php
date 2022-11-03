<?php

namespace App\Http\Controllers;
use App\Models\depositwithdraw;
use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    // Create Index
    public function index(Request $request) {
        $search = $request->search;
        //dd($search);
        if($search != ''){
            $data['user'] = User::where('id','like', '%'.$search.'%')->Orwhere('name','like', '%'.$search.'%')->get();
        }else{
            $data['user'] = User::orderBy('id', 'asc')->where('is_admin', array(0))->paginate(15);
        }
            return view('admin.user.index', $data);
    }
    
    // Create resource
    public function create() {

        return view('admin.user.create');

    }

    //store resource
    public function store(Request $request ){
        /*เป้นการตรวจสอบ input */
        $request->validate([
            'name' => 'required',
            'lname' => 'required',
            'Nname' => 'required',
            'sex' => 'required',
            'status' => 'required',
            'tel' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'email' => 'required', 
            'password' => 'required',
            'is_admin' => '0'
        ]);
        $i=User::Orderby('id','DESC')->limit(1)->get();//เอาค่าไอดีตัวล่สุดมา บวก 1เพื่อเพิ่มข้อมูลสมาชิกคนใหม่
        foreach( $i as $row){
                    $id = $row->id;
                    // dd($id);
                }
        $id= $id + 1 ;
        $users = new User;
        $users->id = $id;
        $users->name = $request->name;
        $users->lname = $request->lname;
        $users->Nname = $request->Nname;
        $users->sex = $request->sex;
        $users->status = $request->status;
        $users->tel = $request->tel;
        $users->birthday = $request->birthday;
        $users->address = $request->address;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->is_admin = 0 ;

            $users->save();
    
        $user_id = $id;
        $account = new depositwithdraw();
          $account->user_id = $user_id;
          $account->balance = 0.00;
          $account->save();


                return redirect()->route('user.index')
                    ->with('success' , 'เพิ่มข้อมูล ผู้ใช้สำเร็จ.');
    }

    public function edit(User $user) {

        return view('admin.user.edit', compact('user'));

    }

    public function update(Request $request, $id) {

        $request->validate([
            'name' => 'required',
            'lname' => 'required',
            'name' => 'required',
            'sex' => 'required',
            'status' => 'required',
            'tel' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $users = User::find($id);
        $users->name = $request->name;
        $users->lname = $request->lname;
        $users->Nname = $request->Nname;
        $users->sex = $request->sex;
        $users->status = $request->status;
        $users->tel = $request->tel;
        $users->birthday = $request->birthday;
        $users->address = $request->address;
        $users->email = $request->email;
        $users->password = bcrypt('$request->password');
        
        $users->save();
            return redirect()->route('user.index')
                ->with('success', 'อัพเดคข้อมูล ผู้ใช้สำเร็จ.');
    }


    public function show( $id ) {

        $user = User::find($id);
        //dd($id);
        //echo $id->account_id ;
            return view('admin.user.show', compact('user'));

    }


    public function destroy(User $user) {

        $user->delete();
            return redirect()->route('user.index')
                ->with('D', 'ลบข้อมูล ผู้ใช้สำเร็จ.');
    }



}
