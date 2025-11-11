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
                <a class="edit-row bg-blue-600 text-white py-1 px-1 rounded  shadow-sm" data-target="edit-coures"
                href="{{ route('courses.edite',[$coures->id,'page'=>request()->page]) }}">Edit</a>
                <form  class="inline" action="{{ route('courses.destroy',$coures->id) }}" method="post">
            @csrf
            @method('delete')
            <button onclick="deleteRow(event)" class="bg-red-600 text-white py-1 px-1 rounded  shadow-sm">Delete</button>
            </form>
        </td>
        </tr>
        @empty
        <td class="border p-2 text-center" colspan="6" >No Data Found</td>
        @endforelse
    </tbody>
</table>
<div class="pagination">{{ $courses->links() }}
</div>
