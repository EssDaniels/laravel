@extends('template')

@section('content')
<div class="container">
    <h2>Dodawanie lekarza</h2>
    <form action="{{action('App\Http\Controllers\DoctorController@editStore')}}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
            <input type="hidden" name="id" value="{{ $doctor->id }}" />
            <label for="name">Imię</label>
            <input type="text" class="form-control" name="name" value="{{$doctor->name}}" />
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" name="surname" value="{{$doctor->lastname}}" />

            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" value="{{$doctor->email}}" />
            <label for="phone">Telefon</label>
            <input type="text" class="form-control" name="phone" value="{{$doctor->phone}}" />
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel" value="{{$doctor->pesel}}" />
            <label for="status">Status</label>
            @if ($doctor->status == "Active")
            Aktywny<input type="radio" class="form-control" name="status" value="Active" checked />
            Nieaktywny<input type="radio" class="form-control" name="status" value="Inactive" />
            @else
            Aktywny<input type="radio" class="form-control" name="status" value="Active" />
            Nieaktywny<input type="radio" class="form-control" name="status" value="Inactive" checked />
            @endif
            <label for="specialization">Specjalizacja</label>

            @foreach ($specializations as $specialization)

            @if($doctor->specializations->contains($specialization->id))
            <label>{{$specialization-> name}}</label><input type="checkbox" class="form-control" name="specializations[]" value="{{$specialization->id}}" checked> </br>
            @else
            <label>{{$specialization-> name}}</label><input type="checkbox" class="form-control" name="specializations[]" value="{{$specialization->id}}"> </br>
            @endif
            @endforeach


        </div>
        <input type="submit" value="Edytuj" class="btn btn-primary" />
    </form>
</div>
@endsection('content')