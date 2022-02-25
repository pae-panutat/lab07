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
                   
                   <div class="card">
                       <div>
                        <div class="card-header">ตารางข้อมูลแผนก</div>
                            <div class="card-body">
                            <table class="table table-striped table-bordered my-2">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อพนักงาน</th>
                                    <th scope="col">ข้อมูล</th>
                                    {{-- <th scope="col">สร้างเมื่อ</th> --}}
                                  </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    @foreach ($fetch_data as $row)
                                    <tr>
                                        <th scope="row">{{ $fetch_data->firstItem()+$loop->index }}</th>
                                        <td>{{ $row->name }} </td>
                                        <td>{{ $row->data + $row->data2 }}</td>
                                        {{-- <td>{{ $row->name }}</td> --}}
                                        {{-- <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td> --}}
                                    </tr>
                                    @endforeach
                                    </tbody>
                              </table>
                              {{ $fetch_data->links() }}
                            </div>
                       </div>
                   </div>
                </div>
            </div>
       </div>
    </div>
</x-app-layout>
