@extends('template')

@section('content')
<div class="container">
    <h2>Lekarze</h2>
    <a href="{{URL :: to('doctors/create')}}">Dodaj nowego lekarza</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefon</th>
                <th scope="col">Specjalizacja</th>
                <th scope="col">Status</th>
                <th scope="col">Operacje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctorsList as $doctor)
            <tr>
                <th scope="row">{{$doctor->id}}</th>
                <td><a href="{{URL::to('doctors/'.$doctor->id)}}">{{$doctor-> name}}</a></td>
                <td>{{$doctor-> lastname}}</td>
                <td>{{$doctor-> email}}</td>
                <td>{{$doctor-> phone}}</td>
                <td>
                    <ul>
                        @foreach ($doctor->specializations as $specialization)
                        <li>{{$specialization->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$doctor-> status}}</td>
                <td><a href="{{URL::to('doctors/delete/'.$doctor->id)}}" onclick="return confirm('Czy na pewno usunąć?')">Usuń lekarza</a></br>
                    <a href="{{URL::to('doctors/edit/'.$doctor->id)}}">Edycja lekarza</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($statistic as $stat)
    @if ($stat->status == 'Active')
    Liczba lekarzy dostępnych: {{$stat->user_count}}</br>
    @endif
    @if ($stat->status == 'Inactive')
    Liczba lekarzy niedostępnych: {{$stat->user_count}}
    @endif

    @endforeach
</div>
@endsection('content')