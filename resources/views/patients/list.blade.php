@extends('template')

@section('content')
<div class="container">
    <h2>Pacjenci</h2>
    <a href="{{URL :: to('patients/create')}}">Dodaj nowego lekarza</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefon</th>
                <th scope="col">PESEL</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($patientsList as $patient)
            <tr>
                <th scope="row">{{$patient->id}}</th>
                <td><a href="{{URL::to('patients/'.$patient->id)}}">{{$patient-> name}}</a></td>
                <td>{{$patient-> lastname}}</td>
                <td>{{$patient-> email}}</td>
                <td>{{$patient-> phone}}</td>
                <td>{{$patient-> pesel}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('content')