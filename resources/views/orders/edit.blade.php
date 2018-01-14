@extends('layouts.app')

@section('content')

    @include('layouts.error')

    <i class="close icon"></i>
    <div class="header">
        Rendelés adatai
    </div>

    <div class="content">
        <p>Rendelő neve: {{$orders->user->firstname}} {{$orders->user->lastname}}</p>
        <p>Rendelő telefonszáma: {{$orders->user->phone}}</p>

        @if(isset($orders->user->city))
        <p>Rendelő címe: {{$orders->user->city}}, {{$orders->user->street}} {{$orders->user->h_number}}</p>
        @endif

        <p>Rendelő pizzái:
            @foreach($cart as $item)
                {{$item->pizza->name}}: {{$item->quantity}} darab, Ár: {{$item->price}} <br />
            @endforeach</p>

        <p><strong>Összesen: {{$orders->price}} Ft</strong> </p>
    </div>


@endsection