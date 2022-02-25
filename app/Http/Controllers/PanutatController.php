<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanutatController extends Controller
{
    public function index(){
       
        // $data = 'ทดสอบ';
        // return view('admin.panutat.index', ['data' => $data]);

        // //Eloquent
        // // $departments = Department::all(); // ดึงมาทั้งหมด
        // $departments = Department::paginate(5); // ดึงแบบแบ่งหน้า
        // $trashDepartments = Department::onlyTrashed()->paginate(5);

        //Query Builder
        // $departments = DB::table('departments')->get(); // ดึงมาทั้งหมด
        $fetch_data = DB::table(Auth::User()->name)
                        ->join('users', Auth::User()->name.'.name_id', 'users.id')
                        ->select(Auth::User()->name.'.*', 'users.name')
                        ->paginate(5); // ดึงแบบแบ่งหน้า
        // dd($fetch_data);
        // dd(Auth::User()->name);
        return view('admin.panutat.index', compact('fetch_data'));
    }
}

