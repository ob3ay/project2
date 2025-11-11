<x-form.layout>
        <x-slot name="title">
            Form 3
        </x-slot>
        <div class="container my-5">
            <h1>Validation</h1>
            {{-- <x-form.errors/> --}}
            <form action="{{ route('forms.form3') }}" method="post">
                @csrf
                <x-form.input name="name" type="text" lable="Name" hint="enter your name"  />
                <x-form.input name="email" type="email" lable="email" hint="enter your email"   />
                <x-form.input name="phone" type="text" lable="phone" hint="enter your phone"  />
                <x-form.input name="password" type="password" lable="password" hint="enter your password"  />
                <x-form.input name="password_confirmation" type="password" lable="password_confirmation" hint="enter your confirm password "  />

                <button class="btn btn-success px-5 "><i class="fas fa-paper-plane"> </i> Register</button>
            </form>
        </div>
</x-form.layout>
