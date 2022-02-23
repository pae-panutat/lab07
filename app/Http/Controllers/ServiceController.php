<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(5); // ดึงแบบแบ่งหน้า
        return view('admin.service.index', compact('services'));

    }

    public function store(Request $request){
        // dd($request->department_name);
            $request->validate(
            [
                'service_name' => 'required|unique:services|max:255',
                'service_image' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'service_name.required' => "กรุณาป้อนชื่อบริการด้วยค่ะ",
                'service_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'service_name.unique' => "มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้วค่ะ",

                'service_image.required' => "กรุณาใส่ภาพประกอบด้วยค่ะ",
            ]
        );

        //การเข้ารหัสรูปภาพ
        // dd($request->service_name, $request->service_image);
        // $service_image = $request->file('service_image');
        
        // //Generate ชื่อภาพ
        // $name_gen = hexdec(uniqid());
       
        // //ดึงไฟล์นามสกุล
        // $img_ext = strtolower($service_image->getClientOriginalExtension());
       
        // //รวมชื่อภาพ+ไฟล์นามสกุล
        // $img_name = $name_gen.'.'.$img_ext; 

        // //อัพโหลดและบันทึกรูปภาพ
        $upload_location = 'image/services/';
        // $full_path = $upload_location.$img_name;

        $imageName = time().'.'.$request->service_image->extension();  
     
        $full_path = $request->service_image->move($upload_location, $imageName);


        //บันทึกและอัพโหลด
        Service::insert([
            'service_name' => $request->service_name,
            'service_image' => $full_path,
            'created_at' => Carbon::now()
        ]);
        // $service_image->move($upload_location.$img_name);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
