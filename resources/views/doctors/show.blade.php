@extends('template')

@section('content')

<div class="card">
    <div class="card-header">
        {{$doctor->name}}
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Name:</td>
                <td>{{$doctor->name}}</td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td>{{$doctor->lastname}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{$doctor->email}}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{$doctor->phone}}</td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>{{$doctor->status}}</td>
            </tr>
            <tr>
                <td>Specjalizacja:</td>
                <td>
                    <ul>
                        @foreach ($doctor->specializations as $specialization)
                        <li>{{$specialization->name}}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>

</div>
@endsection('content')