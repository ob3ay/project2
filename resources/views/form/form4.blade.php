<x-form.layout>
        <x-slot name="title">
            Form 4
        </x-slot>
        <div class="container my-5">
            <h1>{{ __('Uploaded File') }}</h1>
            <h4>{{ __('custom.shoping',['cost'=>'120','delivery'=>'150']) }}</h4>
            <h4>{{ trans_choice('custom.Comments',1) }}</h4>
            {{-- <x-form.errors/> --}}
            <form action="{{ route('forms.form4') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input name="image" type="file" lable="avater"   />

                <button class="btn btn-success px-5 "><i class="fas fa-paper-plane"> </i> Register</button>
            </form>
        </div>
</x-form.layout>
