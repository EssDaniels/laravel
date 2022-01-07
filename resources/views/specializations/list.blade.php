@extends('template')

@section('content')
<div class="container">
    <h2>Specjalizacje</h2>
    <a href="{{URL :: to('specializations/create')}}">Dodaj nową specjalizację</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($specializations as $specialization)
            <tr>
                <th scope="row">{{$specialization->id}}</th>
                <td><a href="{{URL :: to('doctors/specializations/' . $specialization->id )}}">{{$specialization-> name}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('content')