@extends('layouts.app')

@section('content')

    @include('layouts.error')
    <br/>
    <div class="ui container">
        <div class="ui styled fluid accordion">
            @foreach($orders as $key => $order)
                <div class="title">
                    <i class="dropdown icon"></i>
                    {{$key}}.Rendelés ideje: {{$order->created_at}}
                </div>
                <div class="content">
                    <p class="transition hidden"><strong>Rendelő neve: {{$order->user->firstname}} {{$order->user->lastname}}</strong></p>
                    <p class="transition hidden">
                    </p>
                    <p class="transition hidden">
                        <a  href="{{route('order.editOrder', $order->id)}}" class="ui button">Rendelés részletei</a>
                    </p>
                </div>



            @endforeach
        </div>
    </div>

    <script>
        $('.ui.accordion')
                .accordion()
        ;
    </script>
@endsection