@extends('layouts.admin')
@section('content')
@auth
<table class="table ">
    <thead class="thead-dark">
        <th>Etudiant :</th>
        <th>Encadrant :</th>
        <th>Date de soutenance :</th>
        <th>Operations</th>
    </thead>
    <tbody>
        @foreach ($defense as $data)
        <tr>
            <td>{{$data->firstname}} {{$data->lastname}}</td>
            <td>{{ $data->supervisor->name}}</td>
            <td>{{ $data->jury->dateDefense}}</td>
            <td>
                @if($data->jury->validate)
                <center>
                <form action="{{route('mail', [ $data->id ])}}" method="GET" class="d-inline">
                        <button type="submit" class="btn btn-sm btn-warning"><i class="far fa-paper-plane mr-2"></i>
                            Envoyer Email
                        </button>
                    </form>
                <form action="{{ route('juryInvitations', [$data->id] ) }}" methode="GET" class="d-inline">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-download mr-2"></i>Invitations
                        </button>
                    </form>
                </center>
                @else
                <center>
                    <form action="{{route('admin.update', [ $data->jury->id ]) }}" method="post">
                        @CSRF
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i>Valider
                        </button>
                    </form>
                </center>
                    @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endauth
@endsection
