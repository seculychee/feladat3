@extends('layouts.app')

@section('content')

    @include('layouts.error')
    <div class="ui container">
        <h1 class="ui header">Kosár tartalma</h1>
    </div>

    <div class="ui container">
        <table class="ui celled table">
            <thead>
            <tr>
                <th>#</th>
                <th>Pizza</th>
                <th>Darab</th>
                <th>Ár</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <td>
                        <div class="ui ribbon label">{{$key}}</div>
                    </td>
                    <td>{{$item["name"]}}</td>
                    <td>{{$item["quantity"]}}</td>
                    <td>{{$item["price"]}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br/>
    <div class="ui container">
        <h2 class="ui header">Rendelés leadáshoz adja meg az adatait</h2>
    </div>
    <div class="ui container">
        <form class="ui form" action="{{route('storeCart')}}" method="post">
            {{--{{method_field('PUT')}}--}}
            {{ csrf_field() }}

            <div class="two fields">
                <div class="field">
                    <label>Vezetéknév</label>
                    <input type="text" name="firstname" placeholder="Vezetéknév" >
                </div>
                <div class="field">
                    <label>Keresztnév</label>
                    <input type="text" name="lastname" placeholder="Keresztnév" >
                </div>
            </div>


                <div class="field">
                    <label>Telefonszám</label>
                    <input type="number" name="phone" placeholder="Telefonszám" >
                </div>

            <div class="three fields">
                <div class="field">
                    <label>Város</label>
                    <input type="text" name="city" placeholder="Város" >
                </div>
                <div class="field">
                    <label>Utca</label>
                    <input type="text" name="street" placeholder="Utca" >
                </div>
                <div class="field">
                    <label>Házszám</label>
                    <input type="text" name="h_number" placeholder="Darab" >
                </div>
            </div>


            <div class="ui black deny button">
                Mégse
            </div>
            <button type="submit" class="ui positive right labeled icon button">
                Rendelés leadása
                <i class="checkmark icon"></i>
            </button>
        </form>
    </div>
    <br/>

    <script>
        $('.ui.form')
                .form({
                    fields: {
                        firstname: {
                            identifier: 'firstname',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Adja meg a darabszámot!'
                                }
                            ]
                        },
                        lastname: {
                            identifier: 'lastname',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Adja meg a darabszámot!'
                                }
                            ]
                        },
                        phone: {
                            identifier: 'phone',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Adja meg a darabszámot!'
                                }
                            ]
                        },
                    }
                })
        ;
    </script>

@endsection