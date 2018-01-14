@extends('layouts.app')

@section('content')
    <div class="ui center aligned  container">
        <h1 class="ui header">Belépés</h1>
    </div>
    <div class="ui container">
        @if ($errors->has('email') || $errors->has('password'))

            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">
                    There were some errors with your submission
                </div>
                <ul class="list">
                    @if ($errors->has('email'))
                        <li>{{ $errors->first('email') }}</li>
                    @endif
                    @if ($errors->has('password'))
                        <li>{{ $errors->first('password') }}</li>
                    @endif
                </ul>
            </div>
        @endif
        <form class="ui form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="field">
                <label>Email</label>
                <input type="email" name="email"
                       value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="field">
                <label>Jelszó</label>
                <input type="password" name="password" placeholder="Jelszó">
            </div>
            <div class="ui center aligned container">
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }} tabindex="0" class="hidden">
                        <label>Emlékezz rám</label>
                    </div>
                </div>
                <button class="ui button" type="submit">Submit</button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Elfelejtette a jelszót?
                </a>
            </div>
        </form>
    </div>


@endsection
