<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Courses</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="max-w-7xl mx-auto my-10">
        <div>
            @if (session('msg'))
            <div class="p-2 bg-green-100 text-green-600 rounded">{{ session('msg') }}</div>
            @endif
        </div>
        <div class="flex item-center justify-between mb-3">
            <h1 class="text-3xl font-bold mb-4">All customers  </h1>
        </div>
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th class="text-start border p-2 bg-gray-100">ID</th>
                    <th class="text-start border p-2 bg-gray-100">Name</th>
                    <th class="text-start border p-2 bg-gray-100">Email</th>
                    <th class="text-start border p-2 bg-gray-100">fb</th>
                    <th class="text-start border p-2 bg-gray-100">x</th>
                    <th class="text-start border p-2 bg-gray-100">li</th>
                    <th class="text-start border p-2 bg-gray-100">ig</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                <tr>
                    <td class="border p-2 ">{{ $customer->id }}</td>
                    <td class="border p-2 ">{{ $customer->name }}</td>
                    <td class="border p-2 ">{{ $customer->email }}</td>
                    <td class="border p-2 ">{{ $customer->profile->fb }}</td>
                    <td class="border p-2 ">{{ $customer->profile->x }}</td>
                    <td class="border p-2 ">{{ $customer->profile->ln }}</td>
                    <td class="border p-2 ">{{ $customer->profile->ig }}</td>
                </tr>
                @empty
                <td class="border p-2 text-center" colspan="7" >No Data Found</td>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
