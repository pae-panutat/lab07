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
                    <div class="card-header">ตารางข้อมูลบริการ</div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered my-2">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ภาพประกอบ</th>
                                    <th scope="col">ชื่อบริการ</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    @foreach ($services as $row)
                                    <tr>
                                        <th scope="row">{{ $services->firstItem()+$loop->index }}</th>
                                        <td>{{ $row->service_image }}</td>
                                        <td>{{ $row->service_name }}</td>
                                        {{-- <td>{{ $row->name }}</td> --}}
                                        <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('restoreDepartment', $row->id )}}" class="btn btn-info btn-sm">กู้คืนข้อมูล</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/department/delete', $row->id) }}" class="btn btn-danger btn-sm deleteForm">ลบข้อมูลถาวร</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        {{ $services->links() }}
                    </div>
                </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์มบริการ</div>
                        <div class="card-body">
                            <form action="{{ route('') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            
                               <div class="form-group">
                                    <label for="service_name">ชื่อบริการ</label>
                                    <input type="text" class="form-control my-2" name="department_name">
                               </div>
                               <div class="form-group">
                                    <label for="service_image">ภาพประกอบ</label>
                                    <input type="file" class="form-control my-2" name="service_image">
                               </div>
                               @error('service_name')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                               @enderror
                               @error('service_image')
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
     <script>
        $( document ).ready(function() {
            $('.deleteForm').click('submit', function(){
                if(confirm('ต้องการลบข้อมูล?')){
                    return true;
                } else {
                    return false;
                }
            })            
        });
    </script>
</x-app-layout>
