<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edite Course</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="max-w-7xl mx-auto mt-10">
        <div class="flex item-center justify-between mb-3">
            <h1 class="text-3xl font-bold mb-4">Edite Course {{ $coures->id }} </h1>
            <a class="bg-slate-500 text-white p-2 rounded" href="{{ route('courses.index') }}"> All courses </a>
        </div>

        <form action="{{ route('courses.update',$coures->id) }}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if (request()->page)
            <input type="hidden" name="page" value="{{ request()->page }}">
            @endif
            @include('courses._forme')
        </form>
    </div>

</body>

</html>
