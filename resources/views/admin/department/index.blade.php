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
                       <div>
                        <div class="card-header">ตารางข้อมูลแผนก</div>
                            <div class="card-body">
                            <table class="table table-striped table-bordered my-2">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อแผนก</th>
                                    <th scope="col">ชื่อพนักงาน</th>
                                    <th scope="col">สร้างเมื่อ</th>
                                    <th scope="col">แก้ไข</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    @foreach ($departments as $row)
                                    <tr>
                                        <th scope="row">{{ $departments->firstItem()+$loop->index }}</th>
                                        <td>{{ $row->department_name }}</td>
                                        {{-- <td>{{ $row->user->name }}</td> --}}
                                        <td>{{ $row->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('editDepartment', $row->id )}}" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                              </table>
                              {{ $departments->links() }}
                            </div>
                       </div>
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{ route('addDepartment') }}" method="post">
                                @csrf
                            
                               <div class="form-group">
                                    <label for="department_name">ชื่อแผนก</label>
                                    <input type="text" class="form-control my-2" name="department_name">
                               </div>
                               @error('department_name')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                               @enderror
                                    <br>
                                    <input type="submit" value="บันทึก" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</x-app-layout>
