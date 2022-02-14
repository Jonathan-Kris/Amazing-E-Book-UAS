<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    <title>Amazing E-Book Home</title>
</head>

<body>
    {{-- If User is logged in --}}
    @if (Auth::check())
        @php
            $user_id = Auth::user()->id;
        @endphp
        <nav class="navbar navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="index/{{ $locale }}"><strong>Amazing E-book</strong></a>
                <form class="d-flex">
                    <a href="/logout/{{ $locale }}"><button type="button"
                            class="btn btn-warning">{{ __('msg.Logout') }}</button></a>
                </form>
            </div>
        </nav>
        @if (Auth::user()->role_id == '1')
            {{-- 1 = role admin --}}
            <nav class="navbar navbar-dark bg-warning justify-content-center align-items-center py-0">
                <ul class="list-inline py-0= mb-1">
                    <a class="navbar-brand py-0 text-dark" href="/index/{{ $locale }}">{{ __('msg.Home') }}</a>
                    <a class="navbar-brand py-0 text-dark"
                        href="/showCart/{{ $user_id }}/{{ $locale }}">{{ __('msg.Cart') }}</a>
                    <a class="navbar-brand py-0 text-dark"
                        href="/profilePage/{{ $locale }}">{{ __('msg.Profile') }}</a>
                    <a class="navbar-brand py-0 text-dark"
                        href="/accPage/{{ $locale }}">{{ __('msg.Account_Maintenance') }}</a>
                </ul>
            </nav>
        @else
            {{-- Role User --}}
            <nav class="navbar navbar-dark bg-warning justify-content-center align-items-center py-0">
                <ul class="list-inline py-0= mb-1">
                    <a class="navbar-brand py-0 text-dark"
                        href="/index/{{ $locale }}">{{ __('msg.Home') }}</a>
                    <a class="navbar-brand py-0 text-dark"
                        href="/showCart/{{ $user_id }}/{{ $locale }}">{{ __('msg.Cart') }}</a>
                    <a class="navbar-brand py-0 text-dark"
                        href="/profilePage/{{ $locale }}">{{ __('msg.Profile') }}</a>
                </ul>
            </nav>
        @endif
    @else
        {{-- Not Logged In --}}
        <nav class="navbar navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="/index"><strong>Amazing E-book</strong></a>
            </div>
        </nav>
        <nav class="navbar navbar-dark bg-warning justify-content-center align-items-center py-0">
            <ul class="list-inline py-0= mb-1">
                <a class="navbar-brand py-0 text-dark" href="/register/{{ $locale }}">{{ __('msg.Register') }}</a>
                <a class="navbar-brand py-0 text-dark"
                    href="/login/{{ $locale }}">{{ __('msg.Log_In') }}</a>
            </ul>
        </nav>
    @endif

    {{-- Main --}}
    @yield('content')

    {{-- Footer --}}
    <footer class="footer">
        <footer class="page-fotter text-center text-white bg-primary fixed-bottom py-2">
            <small>@ Jonathan Kristanto 2022</small>
        </footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/js/clock.js') }}"></script>
</body>

</html>
