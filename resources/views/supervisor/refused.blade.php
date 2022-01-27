@extends('layouts.supervisor')
@section('content')
<table class="table mt-4">
    <thead class="thead thead-light">
        <th>Nom</th>
        <th>Projet</th>
        <th>Résumé</th>
        <th>message</th>
    </thead>
    <tbody>
        @foreach ($defense as $student)
        <tr>
            <td>{{$student->firstname}} {{$student->lastname}}</td>
            <td>{{$student->project}}</td>
            <td>{{$student->summary}}</td>
            <td>{{$student->message}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>@endsection
