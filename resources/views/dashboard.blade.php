<x-app-layout>
    <x-slot name="header">
        <h2 class="font text-xl text-gray-800">
            ยินดีต้อนรับคุณ:  {{ Auth::User()->name}}

           <p class="font text-xl text-gray-800 float-end">จำนวนผู้ใช้ระบบ {{ count($users) }} คน</p>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">อีเมล์</th>
                <th scope="col">เริ่มใช้งานระบบ</th>
                <th scope="col">เข้าใช้งานระบบล่าสุด</th>
                <th scope="col">แก้ไข | ลบ</th>
              </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach ($users as $row)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                    <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm">แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
          </table>
       </div>
    </div>
</x-app-layout>
