<x-app-layout>
    <x-slot name="header">
        <h2 class="font text-xl text-gray-800">
            ยินดีต้อนรับคุณ:  {{ Auth::User()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session("success"))
                    <div class="card-header alert alert-success col-md-12">
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif
                   <div class="card">
                    <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        <div class="card-body">
                            <form action="{{ route('updateService', $service->id )}}" method="post" enctype="multipart/form-data">
                                @csrf
                            
                            <div class="form-group">
                                    <label for="service_name">ชื่อบริการ</label>
                                    <input type="text" class="form-control my-2" name="service_name" value="{{ $service->service_name}}">
                            </div>
                            @error('service_name')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="service_image">ภาพประกอบ</label>
                                <input type="file" class="form-control my-2" name="service_image" value="{{ $service->service_image}}">
                           </div>
                           @error('service_image')
                            <div class="my-2">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                           @enderror 
                            <div class="form-group">
                                <img src={{ asset($service->service_image) }} width="250px" height="250px" alt="" />
                            </div>

                                <br>
                                <input type="hidden" value="{{ $service->service_image }}" class="btn btn-success btn-sm" name="old_image">
                                <input type="submit" value="อัพเดท" class="btn btn-success btn-sm">
                            </form>
                        </div>
                   </div>
                </div>
            </div>
       </div>
    </div>
</x-app-layout>
