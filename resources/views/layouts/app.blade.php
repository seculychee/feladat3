<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="css/semantic-ui/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/semantic-ui/semantic.min.css">


</head>
<body>

<div class="ui top attached demo menu">
    <div class="header item">
        Our Company
    </div>
    @guest

    <div class="right menu">
        <a class="item" href="/">Kezdőlap</a>{{--
        <a class="item" href="{{ route('register') }}">Regisztráció</a>--}}
    </div>
</div>

@else
    <a class="item">
        <i class="sidebar icon"></i> Menu
    </a>

    </div>
    <div class="ui bottom attached segment">
        <div class="ui inverted labeled icon left inline vertical demo sidebar menu">
            <a class="item" href="home">
                <i class="home icon"></i> Kezdőlap
            </a>
            <a class="item" href="{{ url('/admin_pizza') }}">
                <i class="block layout icon"></i> Pizzák
            </a>
            <a class="item" href="{{url('/order')}}">
                <i class="smile icon"></i> Rendelések
            </a>
            <div class="item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="sign out icon"></i>Kijelentkezés
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        @endguest


        <div class="pusher">
            <div class="ui basic segment">
                @yield('content')
            </div>
        </div>
    </div>



    <script>
        $('.ui.sidebar').sidebar({
            context: $('.bottom.segment')
        })
                .sidebar('attach events', '.menu .item');
    </script>

</body>
</html>
