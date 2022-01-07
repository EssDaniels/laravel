@extends('template')

@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2>Dodawanie lekarza</h2>
    <form action="{{action('App\Http\Controllers\DoctorController@store')}}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" class="form-control" name="name" />
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" name="surname" />
            <label for="password">Hasło</label>
            <input type="password" class="form-control" name="password" />
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" />
            <label for="phone">Telefon</label>
            <input type="text" class="form-control" name="phone" />
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel" />
            <input type="hidden" name="status" value="Active" />
            <label for="specialization">Specjalizacja</label>

            @foreach ($specializations as $specialization)


            <label>{{$specialization-> name}}</label><input type="checkbox" class="form-control" name="specializations[]" value="{{$specialization->id}}"> </br>

            @endforeach


        </div>
        <input type="submit" value="Dodaj" class="btn btn-primary" />
    </form>
</div>
@endsection('content')