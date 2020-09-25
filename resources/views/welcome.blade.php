<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>System Notes</title>
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/stylesOne.css')}}">
</head>

<body>
    <div class="container">
        <div class="blue">
            <div class="blue__img">
                <img src="{{asset('img/fond2.webp')}}" alt="">
            </div>
            <p class="blue__item">
                <b class="shadow">System Notes</b>
            </p>
        </div>
        <div class="box">
            <p class="name"><b>Blac Desings</b></p>
        </div>
    </div>
    <div class="bloc">
        @guest
        <a class="text" href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
        @if (Route::has('register'))
        <a class="text" href="{{ route('register') }}"><b>{{ __('Register') }}</b></a>
        @endif
        @else
        <a class="text" href="{{ route('home') }}"><b>{{ __('Mantainer') }}</b></a>
        <a class="text" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <b>{{ __('Logout') }}</b>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </div>
</body>

</html>