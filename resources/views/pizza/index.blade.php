@extends('layouts.app')

@section('content')

    @include('layouts.error')
    <div class="ui container">
        <button class="ui button" id="pizza_new">
            Új pizza felvitele
        </button>
    </div>
    <br/>
    @include('pizza.create')
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
                        <button id="pizza_edit{{$key}}" class="ui button">Szerkesztés</button>
                    </p>
                </div>


                {{-- pizza szerkesztés modal --}}
                <div class="ui modal" id="edit_pizza{{$key}}">
                    <i class="close icon"></i>
                    <div class="header">
                        Pizza szerkesztése
                    </div>

                    <div class="content">
                        <form class="ui form" action="{{route('admin_pizza.edit_pizza', $pizza->id)}}" method="post">
                            {{method_field('PUT')}}
                            {{ csrf_field() }}
                            <div class="field">
                                <label>Pizza neve</label>
                                <input type="text" name="name" placeholder="Pizza neve" value="{{$pizza->name}}">
                            </div>
                            <div class="field">
                                <label>Ár</label>
                                <input type="number" name="price" placeholder="Ár" value="{{$pizza->price}}">
                            </div>
                            <div class="field">
                                <label>Leírás</label>
                                <textarea name="desc" >{{$pizza->desc}}</textarea>
                            </div>

                            <div class="ui black deny button">
                                Mégse
                            </div>
                            <button type="submit" class="ui positive right labeled icon button">
                                Mentés
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
        $('.ui.form')
                .form({
                    fields: {
                        name: {
                            identifier: 'name',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Adja meg a pizza nevét!'
                                }
                            ]
                        },
                        price: {
                            identifier: 'price',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Adja meg az árat!'
                                }
                            ]
                        },
                    }
                })
        ;
    </script>
    <script>
        $('.ui.accordion')
                .accordion()
        ;
    </script>
@endsection