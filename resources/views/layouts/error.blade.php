@if (count($errors) > 0)
    <br/>
    <div class="ui container">
        <div class="ui negative message">
            <div class="header">
                Hiba a felvitel során!
            </div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <br/>
@endif

@if(Session::has('success'))
    <br/>
    <div class="ui container">
        <div class="ui success message">
            <div class="header">
                Sikeres művelet!
            </div>
            <p>{{ Session::get('success')}}</p>
            <p></p>
        </div>
    </div>
    <br/>
@endif
