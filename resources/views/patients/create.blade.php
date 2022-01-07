@extends('template')

@section('content')
<div class="container">
    <h2>Dodawanie pacjenta</h2>
    <form action="{{action('App\Http\Controllers\PatientController@store')}}" method="POST" role="form">
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



        </div>
        <input type="submit" value="Dodaj" class="btn btn-primary" />
    </form>
</div>
@endsection('content')