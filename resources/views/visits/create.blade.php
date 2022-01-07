@extends('template')

@section('content')
<div class="container">
    <h2>Dodawanie wizyty</h2>
    <form action="{{action('App\Http\Controllers\VisitController@store')}}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
            <label for="name">Lekarz</label>
            <select name="doctor">
                @foreach ($doctors as $doctor)
                <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->lastname}}</option>
                @endforeach
            </select>

            <label for="surname">Pacjent</label>
            <select name="patient">
                @foreach ($patients as $patient)
                <option value="{{$patient->id}}">{{$patient->name}} {{$patient->lastname}}</option>
                @endforeach
            </select>
            <label for="date">Data wizyty</label>
            <input type="date" class="form-control" name="date" />




        </div>
        <input type="submit" value="Dodaj" class="btn btn-primary" />
    </form>
</div>
@endsection('content')