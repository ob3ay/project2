<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post-{{$post->title}}</title>
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
            <h1 class="text-3xl font-bold mb-4">Post <span class="text-indigo-400">{{$post->title}}</span> </h1>
        </div>

        <div class="mb-4   " style="width: 25%; height: 25%">
            <img class="" src="{{ asset($post->main_image) }}">
        </div>


        {!! $post->content !!}
        <hr class="my-5">
        <div class="flex flex-wrap space-x-2 mb-4">

            @foreach ($post->gallery as $image)
                <div style="width: 10%; height: 10%">
                    <img src="{{ asset($image->path) }}" class="w-32 h-32 object-cover rounded-md">
                </div>
            @endforeach
        </div>
        <div class="flex flex-wrap space-x-2">
            @foreach ($post->tags as $tag)
                <a class="bg-gray-200 px-2 py-1 rounded-md text-gray-600">{{ $tag->name }}</a>
            @endforeach
        </div>
        <hr class="my-5">
        <h3 class="font-semibold text-2xl">Comments ({{ $post->comments_count }})</h3>
        <div class="flex flex-col space-y-4 mb-6">
            @foreach ($post->comments as $comment)
                <div class="bg-gray-50 p-4 rounded-md shadow-md">
                    <p class="text-gray-600 font-bold">{{ $comment->user->name }}</p>
                    <p class="text-gray-600">{{ $comment->comment }}</p>
                    <p class="text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>

        <form action="{{ route('comment.store', $post->id) }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-4">
                <textarea name="comment" class="w-full border border-gray-300 p-2 rounded-md" placeholder="Add Comment" rows="4"></textarea>
                <div>
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Add Comment</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
