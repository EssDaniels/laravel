@extends('template')

@section('content')
<div class="container">
    <h2>Wizyty</h2>
    <a href="{{URL :: to('visits/create')}}">Dodaj nową wizytę</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pacjent</th>
                <th scope="col">Lekarz</th>
                <th scope="col">Data wizyty</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($visits as $visit)
            <tr>
                <th scope="row">{{$visit->id}}</th>
                <td>{{$visit-> patient->name}}<span> </span>{{$visit-> patient->lastname}}</td>
                <!-- patient jest to funkcja stworzona w modelu visit -->
                <td>{{$visit-> doctor->name}}<span> </span>{{$visit-> doctor->lastname}}</td>
                <!-- doctor jest to funkcja stworzona w modelu visit -->
                <td>{{$visit-> date}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('content')