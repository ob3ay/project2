<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
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
            <h1 class="text-3xl font-bold mb-4">All Posts  </h1>
            <a href="{{ route('post.create') }}" class="bg-indigo-500 text-white p-2 rounded-sm shadow text-sm">Add Post</a>
        </div>
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th class="text-start border p-2 bg-gray-100">ID</th>
                    <th class="text-start border p-2 bg-gray-100">Title</th>
                    <th class="text-start border p-2 bg-gray-100">Content</th>
                    <th class="text-start border p-2 bg-gray-100">Comments Count</th>
                    <th class="text-start border p-2 bg-gray-100 w-100">Created At</th>
                    <th class="text-start border p-2 bg-gray-100 w-100">Updated At</th>
                    <th class="text-start border p-2 bg-gray-100">Show</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td class="border p-2 ">{{ $post->id }}</td>
                    <td class="border p-2 ">{{ $post->title}}</td>
                    <td class="border p-2 ">{{ Str::words($post->content, 10, '...') }}</td>
                    <td class="border p-2 ">{{ $post->comments_count }}</td>
                    <td class="border p-2 ">{{ $post->created_at->format('M,d,Y') }}</td>
                    <td class="border p-2 ">{{ $post->updated_at->diffForHumans() }}</td>
                    <td class="border p-2 "><a class="bg-indigo-500 text-white p-1 rounded-sm shadow text-sm" href="/posts/{{ $post->id }}">Show</a></td>
                </tr>
                @empty
                <td class="border p-2 text-center" colspan="7" >No Post Found</td>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
