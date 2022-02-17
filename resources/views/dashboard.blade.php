<x-app-layout>
    <x-slot name="header">
        <h2 class="font text-xl text-gray-800">
            ยินดีต้อนรับคุณ:  {{ Auth::User()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">ลำดับ</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $row)
                <tr>
                    <th scope="row">{{ $row['id']}}</th>
                    <td>{{ $row['name']}}</td>
                    <td>{{ $row['email']}}</td>
                    <td>{{ $row['updated_at']}}</td>
                    <td>{{ $row['email']}}</td>
                </tr>
                @endforeach
                </tbody>
          </table>
       </div>
    </div>
</x-app-layout>
