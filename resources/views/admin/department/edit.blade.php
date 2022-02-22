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
                            <form action="{{ route('updateDepartment', $department->id )}}" method="post">
                                @csrf
                            
                            <div class="form-group">
                                    <label for="department_name">ชื่อแผนก</label>
                                    <input type="text" class="form-control my-2" name="department_name" value="{{ $department->department_name}}">
                            </div>
                            @error('department_name')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                                    <br>
                                    <input type="submit" value="อัพเดท" class="btn btn-success btn-sm">
                            </form>
                        </div>
                   </div>
                </div>
            </div>
       </div>
    </div>
</x-app-layout>
