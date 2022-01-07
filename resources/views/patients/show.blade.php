@extends('template')

@section('content')

<div class="card">
    <div class="card-header">
        {{$patient->name}}
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Name:</td>
                <td>{{$patient->name}}</td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td>{{$patient->lastname}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{$patient->email}}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{$patient->phone}}</td>
            </tr>
            <tr>
                <td>PESEL:</td>
                <td>{{$patient->pesel}}</td>
            </tr>
        </table>
    </div>

</div>
@endsection('content')