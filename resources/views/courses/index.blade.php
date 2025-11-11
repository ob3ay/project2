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
            <h1 class="text-3xl font-bold mb-4">All Courses ({{ $courses->total() }}) </h1>
           <div>
            <a class="bg-gray-500 text-white p-2 rounded" href="{{ route('courses.trashed') }}">Trashed courses</a>
            <a class="bg-indigo-500 text-white p-2 rounded" href="{{ route('courses.create') }}">Add new courses</a>
           </div>
        </div>
        <div class="my-2 ">
            <form class="flex gap-2" action="{{ route('courses.index') }}" method="get">
                <input type="text" name="search" placeholder="Search Courses"
                class="p-2 border border-gray-400 rounded w-[70%]"
                value="{{request()->search}}">
                <select name="order"class="p-2 border border-gray-400 rounded w-[10%]" >
                    <option @selected(request()->order=='ASC') value="ASC">ASC</option>
                    <option @selected(request()->order=='DESC') value="DESC">DESC</option>
                </select>
                <select name="count"class="p-2 border border-gray-400 rounded w-[10%]" >
                    <option @selected(request()->count=='10' )  value="10">10</option>
                    <option @selected(request()->count=='20' ) value="30">30</option>
                    <option @selected(request()->count=='{{ $courses->total() }}' ) value="{{ $courses->total() }}">All</option>
                </select>
                <button type="submit" class="p-2 border bg-teal-500 text-white rounded w-[10%]">Filter</button>
            </form>
        </div>
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th class="text-start border p-2 bg-gray-100">ID</th>
                    <th class="text-start border p-2 bg-gray-100">Image</th>
                    <th class="text-start border p-2 bg-gray-100">Title</th>
                    <th class="text-start border p-2 bg-gray-100">Category</th>
                    <th class="text-start border p-2 bg-gray-100">Price</th>
                    <th class="text-start border p-2 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $coures)
                <tr>
                    <td class="border p-2 ">{{ $coures->id }}</td>
                    <td class="border p-2 "> <img width="100" height="100" src="{{ asset( $coures->image ) }}" alt=""></td>
                    <td class="border p-2 ">{{ $coures->title }}</td>
                    <td class="border p-2 ">{{ $coures->category }}</td>
                    <td class="border p-2 ">{{ $coures->price }}</td>
                    <td class="border p-2 ">
                        <a class="bg-blue-600 text-white py-1 px-1 rounded  shadow-sm"
                        href="{{ route('courses.edite',[$coures->id,'page'=>request()->page]) }}">Edite</a>
                        <form class="inline" action="{{ route('courses.destroy',$coures->id) }}" method="post">
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
