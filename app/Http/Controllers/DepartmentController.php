<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    public function index(){
        //Eloquent
        // $departments = Department::all(); // ดึงมาทั้งหมด
        // $departments = Department::paginate(5); // ดึงแบบแบ่งหน้า

        //Query Builder
        // $departments = DB::table('departments')->get(); // ดึงมาทั้งหมด
        $departments = DB::table('departments')
                        ->join('users', 'departments.user_id', 'users.id')
                        ->select('departments.*', 'users.name')
                        ->paginate(5); // ดึงแบบแบ่งหน้า
        return view('admin.department.index', compact('departments'));
    }

    public function store(Request $request){
        // dd($request->department_name);
            $request->validate(
            [
                'department_name' => 'required|unique:departments|max:255',
            ],
            [
                'department_name.required' => "กรุณาป้อนชื่อแผนกด้วยค่ะ",
                'department_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'department_name.unique' => "มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้วค่ะ",
            ]
        );

        //Eloquent
        /* $department = new Department;
        $department->department_name = $request->department_name;
        $department->user_id = Auth::User()->id;
        $department->save(); */

        //Query Builder
        $data = array();
        $data['department_name'] = $request->department_name;
        $data['user_id'] = Auth::User()->id;
        $data['created_at'] = now();
        DB::table('departments')->insert($data);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }

    public function edit($id){
        $department = Department::find($id);
        dd($department->department_name);

    }
}
