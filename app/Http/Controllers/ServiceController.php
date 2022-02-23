<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(5); // ดึงแบบแบ่งหน้า
        return view('admin.service.index', compact('services'));

    }
}
