<x-form.layout>
        <x-slot name="title">
            Form 2
        </x-slot>
        <div class="container my-5">
            <h1>Form 2</h1>
            <form action="{{ route('forms.form2') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"  name="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="email">email</label>
                    <input type="text" class="form-control"  name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control"  name="phone" placeholder="Enter your phone">
                </div>
                <div class="mb-3">
                    <label for="password">password</label>
                    <input type="text" class="form-control"  name="password" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="confirm passsword">confirm passsword</label>
                    <input type="text" class="form-control"  name="confirm_password" placeholder="Enter your confirm password">
                </div>
                <button class="btn btn-success px-5 "><i class="fas fa-paper-plane"> </i> Register</button>
            </form>
        </div>
</x-form.layout>
