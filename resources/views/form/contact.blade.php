<x-form.layout>
        <x-slot name="title">
            Contact Us
        </x-slot>
        <div class="container my-5">
            <h1>{{ _('Contact Us') }}</h1>

            <form action="{{ route('forms.contact') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-form.input name="name" type="text" lable="Name" hint="enter your name"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <x-form.input name="email" type="email" lable="email" hint="enter your email"   />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb3">
                            <x-form.input name="phone" type="text" lable="phone" hint="enter your phone"  />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb3">
                            <x-form.input name="subject" type="text" lable="subject" hint="enter your subject"  />
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb3">
                                <x-form.input name="cv" type="file" lable="CV" hint="enter your cv"  />
                            </div>
                            </div>
                        <div class="col-md-12">
                        <div class="mb3">
                            <x-form.textarea name="message" id="message" lable="message" hint="enter your message"  ></x-form.textarea>

                        </div>

                    </div>
                </div>


                <button class="btn btn-success px-5 "><i class="fas fa-paper-plane"> </i> Send</button>
            </form>
        </div>
</x-form.layout>
