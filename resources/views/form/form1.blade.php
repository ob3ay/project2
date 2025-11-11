<x-form.layout>
        <x-slot name="title">
            Form 1
        </x-slot>
        <div class="container my-5">
            <h1>Form 1</h1>
            <form action="{{ route('forms.form1') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"  name="name" placeholder="Enter your name">

                </div>
                <button class="btn btn-success px-5">Send</button>
            </form>
        </div>
</x-form.layout>
