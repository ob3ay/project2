@use('App\Models\Course')
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
            <h1 class="text-3xl font-bold mb-4">All Courses (<span class="count">{{ $courses->total() }}</span> ) </h1>
            <div>
                <a class="bg-gray-500 text-white p-2 rounded" href="{{ route('courses.trashed') }}">Trashed courses</a>
                <button class="add-new-coures bg-indigo-500 text-white p-2 rounded  " data-target="add-new-coures">Add
                    new courses</button>
            </div>
        </div>
        <div class="my-2 ">
            <form onsubmit="filter(event)" class="flex gap-2" action="{{ route('courses.index') }}" method="get">
                <input onkeyup="filter(event)" type="text" name="search" placeholder="Search Courses"
                    class="p-2 border border-gray-400 rounded w-[70%]" value="{{ request()->search }}">
                <select onchange="filter(event)" name="order"class="p-2 border border-gray-400 rounded w-[10%]">
                    <option @selected(request()->order == 'ASC') value="ASC">ASC</option>
                    <option @selected(request()->order == 'DESC') value="DESC">DESC</option>
                </select>
                <select onchange="filter(event)" name="count"class="p-2 border border-gray-400 rounded w-[10%]">
                    <option @selected(request()->count == '10') value="10">10</option>
                    <option @selected(request()->count == '20') value="30">30</option>
                    <option @selected(request()->count == '{{ $courses->total() }}') value="{{ $courses->total() }}">All</option>
                </select>
                <button type="submit" class="p-2 border bg-teal-500 text-white rounded w-[10%]">Filter</button>
            </form>
        </div>
        <div class="table-conetent">
            @include('courses._table-form', ['courses' => $courses])
        </div>
        {{-- {{ $courses->withQueryString()->links() }} --}}
    </div>
</body>
{{-- model add new coures --}}
<div id="add-new-coures"class="modal fixed top-0 left-0 w-full h-full backdrop-blur-[1px] bg-black bg-opacity-50 hidden">
    <div class=" content max-w-3xl bg-white p-6 mx-auto rounded mt-20">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h1 class="text-lg font-bold text-gray-700">Add New Course</h1>
            <svg class="w-5 h-5 cursor-pointer close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor">
                <path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637
                    16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574
                    7.05093L7.04996 5.63672L11.9997 10.5865Z"></path>
            </svg>
        </div>
        <div class="alert-error bg-red-100 text-red-600 my-2 p-4 rounded hidden">
        </div>
        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('courses._forme', ['coures' => new Course()])

        </form>
    </div>
</div>
{{-- model edit coures --}}
<div id="edit-coures" class=" modal fixed top-0 left-0 w-full h-full backdrop-blur-[1px] bg-black bg-opacity-50 hidden">
    <div class=" content max-w-3xl bg-white p-6 mx-auto rounded mt-20">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h1 class="text-lg font-bold text-gray-700">Edit Course</h1>
            <svg class="w-5 h-5 cursor-pointer close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor">
                <path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637
                    16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574
                    7.05093L7.04996 5.63672L11.9997 10.5865Z"></path>
            </svg>
        </div>
        <div class="alert-error bg-red-100 text-red-600 my-2 p-4 rounded hidden">
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if (request()->page)
                <input type="hidden" name="page" value="{{ request()->page }}">
            @endif
            @include('courses._forme')
        </form>
    </div>
</div>
<script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('front/crud/crud.js') }}"></script>

</html>
