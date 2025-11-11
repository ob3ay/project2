<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $coures->title) }}" placeholder="Title "
            class="p-2 border border-gray-400 rounded w-full @error('title')
        border-red-500

        @enderror">
        @error('title')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>
    <div class="img-wrapper">
        <label for="image">Image</label>
        <input type="file" id="image" name="image"
            class="p-2 border border-gray-400 rounded w-full @error('image')
        border-red-500
        @enderror">
        @error('image')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
        <img width="100" class="p-1 border mt-1" height="100" src="{{ asset($coures->image) }}" alt="">
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" id="price" name="price" value="{{ old('price', $coures->price) }}"
            placeholder="Price "
            class="p-2 border border-gray-400 rounded w-full @error('price')
        border-red-500

        @enderror">
        @error('price')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>
    <div>
        <label for="category">Category</label>
        <input type="text" id="category" name="category" value="{{ old('category', $coures->category) }}"
            placeholder="Category "
            class="p-2 border border-gray-400 rounded w-full @error('category')
        border-red-500

        @enderror">
        @error('category')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-span-2">
        <label for="description">Description</label>
        <textarea rows="5" id="description" name="description" placeholder="Description "
            class="p-2 border border-gray-400 rounded w-full
        @error('description')
        border-red-500
        @enderror">{{ old('description', $coures->description) }}</textarea>
        @error('description')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>
    @if ($coures->title)
        <div>
            <button
                class="bg-indigo-500 text-white p-2 px-10 font-semibold duration-200 hover:bg-indigo-600 rounded">Upated</button>
        </div>
    @else
        <div>
            <button
                class="bg-green-500 text-white p-2 px-10 font-semibold duration-200 hover:bg-green-600 rounded">Save</button>
        </div>
    @endif

</div>
