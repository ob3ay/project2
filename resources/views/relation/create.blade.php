<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="max-w-7xl mx-auto my-10">
        <div class="max-w-7xl mx-auto my-10">

            @if ($errors->any())
                <div class="p-2 bg-red
                    -100 text-red-600 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="p-2 bg-red-100 text-red-600 rounded mb-2  ">
                                <li>{{ $error }}</li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <h3 class="font-bold text-2xl mb-2">Add Post</h3>
        <form action="{{ route('post.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Add title">
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content"
                        class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Add content" rows="4"></textarea>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image"
                        class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="gallery" class="block text-sm font-medium text-gray-700">Gallery</label>
                    <input type="file" id="gallery" name="gallery[]" multiple
                        class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <h4 class="font-bold">Tags</h4>
                <div>
                    <ul class="columns-2 tags max-w-80">
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <button onclick="addTag(event)" class="bg-indigo-400 text-white px-2 mt-2 ">+</button>
                </div>
                <div>
                    <button type="submit"
                        class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 transition-colors duration-200">
                        Add Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function addTag(e) {
        e.preventDefault();
        let tag = prompt('Enter tag name');
        axios.post('/api/v1/add-tag', {
            name: tag,
            _token: '{{ csrf_token() }}'
        }).then((res) => {
            let el =
                `<li><label>
                        <input type="checkbox" name="tags[]" value="${res.data.tag.id}"> ${res.data.tag.name}</label></li>`;
            document.querySelector('.tags').insertAdjacentHTML('beforeend', el);
        }).catch((err) => {
            console.error('Error adding tag:', err);
        });
    }
</script>

</html>
