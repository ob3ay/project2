<!DOCTYPE html>
<html lang="{{ App::currentLocale()}}" dir="{{ App::currentLocale()=='ar'?'rtl':'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="#">{{ __('custom.fr') }}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  {{ app()->getlocale()=='ar'? 'me-auto':'ms-auto' }} ">
                  <li class="nav-item ">
                    <a class="nav-link {{ request()->routeIs('forms.form1')? 'active':' '  }}" aria-current="page" href="{{ route('forms.form1') }}">{{ trans('custom.f1') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('forms.form2')? 'active':' '  }}" aria-current="page" href="{{ route('forms.form2') }}">{{ trans('custom.f2') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('forms.form3')? 'active':' '  }}" aria-current="page" href="{{ route('forms.form3') }}">{{ __('custom.f3') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('forms.form4')? 'active':' '  }}" aria-current="page" href="{{ route('forms.form4') }}">{{ trans('custom.f4') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('forms.contact')? 'active':' '  }}" aria-current="page" href="{{ route('forms.contact') }}">{{ trans('custom.Contact') }}</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __('language') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (config('app.languages') as $code => $lang )
                        <li><a class="dropdown-item" href="{{ request()->url() }}?lang={{ $code }}">{{ $lang }}</a></li>
                        @endforeach
                    </ul>
                  </li>
                </ul>

              </div>
            </div>
          </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer class="bg-light py-4 ">
        <p class="text-center m-0">All copyright reserved to <a href=""> Obay Dagga</a> <i class="far fa-copyright"></i> {{ date('Y') }}</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
