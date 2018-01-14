<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Semantic UI -->
    <link rel="stylesheet" type="text/css" href="css/semantic-ui/semantic.min.css">
    <script
            src="js/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="css/semantic-ui/semantic.min.js"></script>


</head>
<body>

<div class="ui menu">
    <div class="header item">
        Our Company
    </div>

    <div class="right menu">
        @if (Route::has('login'))

            @auth
            <a class=" item" href="{{ url('/home') }}">Admin</a>
        @else
            {{--<a class=" item" href="{{ route('login') }}">Kosár</a>
              <a class=" item" href="{{ route('login') }}">Bejelentkezés</a>
                <a class=" item" href="{{ route('register') }}">Regisztráció</a>--}}

            <div class="ui  dropdown link item">
                <span class="text"><i class="shopping bag icon"></i>Kosár</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="header">Kosár tartalma</div>
                    @if(isset($items))
                        @foreach($items as $item)
                            <div class=""><i class="plus icon"></i>{{$item["name"]}}</div>
                        @endforeach
                    @else
                        <div class=""><i class="plus icon"></i>Üres</div>
                    @endif
                    <div class="divider"></div>
                    <div class="header">Műveletek</div>
                    <a href="{{route('showCart')}}" class="item">Tovább a rendeléshez</a>
                </div>
            </div>
            @endauth

        @endif
    </div>
</div>


@include('layouts.error')

<div class="ui container">
    <div class="ui styled fluid accordion">
        @foreach($pizzas as $key => $pizza)
            <div class="title">
                <i class="dropdown icon"></i>
                {{$key}}. {{$pizza->name}}
            </div>
            <div class="content">
                <p class="transition hidden"><strong>Ár: {{$pizza->price}}</strong></p>
                <p class="transition hidden">{{$pizza->desc}}</p>
                <p class="transition hidden">
                    <button id="pizza_edit{{$key}}" class="ui button">Hozzáaadás a kosárhoz</button>
                </p>
            </div>


            {{-- add cart modal --}}
            <div class="ui modal" id="edit_pizza{{$key}}">
                <i class="close icon"></i>
                <div class="header">
                    Adja meg a darab számot
                </div>

                <div class="content">
                    <form class="ui form" action="{{route('addCart', $pizza->id)}}" method="post">
                        {{--{{method_field('PUT')}}--}}
                        {{ csrf_field() }}

                        <div class="field">
                            <label>Darab</label>
                            <input type="number" name="quantity" placeholder="Darab" value="1">
                        </div>

                        <div class="ui black deny button">
                            Mégse
                        </div>
                        <button type="submit" class="ui positive right labeled icon button">
                            Hozzáaadás a kosárhoz
                            <i class="checkmark icon"></i>
                        </button>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $("#pizza_edit{{$key}}").click(function () {
                        $('#edit_pizza{{$key}}')
                                .modal('show')
                        ;
                    });
                });
            </script>

        @endforeach
    </div>
</div>

<script>
    $('.ui.accordion')
            .accordion();
    $('.ui.dropdown')
            .dropdown();
</script>
<script>
    $('.ui.form')
            .form({
                fields: {
                    quantity: {
                        identifier: 'quantity',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Adja meg a darabszámot!'
                            }
                        ]
                    }
                }
            })
    ;
</script>

</body>
</html>
