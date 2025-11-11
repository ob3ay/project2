<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trashed Courses</title>
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
            <h1 class="text-3xl font-bold mb-4">Trashed Courses  </h1>
            <a class="bg-indigo-500 text-white p-2 rounded" href="{{ route('courses.index') }}">All courses</a>
        </div>
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th class="text-start border p-2 bg-gray-100">ID</th>
                    <th class="text-start border p-2 bg-gray-100">Image</th>
                    <th class="text-start border p-2 bg-gray-100">Title</th>
                    <th class="text-start border p-2 bg-gray-100">Deleted at</th>
                    <th class="text-start border p-2 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $coures)
                <tr>
                    <td class="border p-2 ">{{ $coures->id }}</td>
                    <td class="border p-2 "> <img width="100" height="100" src="{{ asset( $coures->image ) }}" alt=""></td>
                    <td class="border p-2 ">{{ $coures->title }}</td>
                    <td class="border p-2 ">{{ $coures->deleted_at->diffForHumans() }}</td>
                    <td class="border p-2 ">
                        <a class="bg-blue-600 text-white py-1 px-1 rounded  shadow-sm"
                        href="{{ route('courses.restore',[$coures->id,'page'=>request()->page]) }}">Restore</a>
                        <form class="inline" action="{{ route('courses.forcedelete',$coures->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure?!')" class="bg-red-600 text-white py-1 px-1 rounded  shadow-sm">Delete</button>
                    </form>
                </td>
                </tr>
                @empty
                <td class="border p-2 text-center" colspan="6" >No Data Found</td>
                @endforelse
            </tbody>
        </table>
        {{ $courses->appends($_GET)->links() }}
        {{-- {{ $courses->withQueryString()->links() }} --}}
    </div>
</body>
</html>
