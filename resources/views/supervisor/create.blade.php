@extends('layouts.supervisor')
@section('content')
<table class="table mt-4">
    <thead class="thead thead-light">
        <th>Nom</th>
        <th>Filiére</th>
        <th>Projet</th>
        <th>Résumé</th>
        <th>informations</th>
        <th>Accepter/Refuser</th>
    </thead>
    <tbody>
        @foreach ($defense as $student)
        <tr>
            <td>{{$student->firstname}} {{$student->lastname}}</td>
            <td>{{$student->faculty}}</td>
            <td>{{$student->project}}</td>
            <td>{{$student->summary}}</td>
            <td><!-- Button trigger modal -->
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                 Plus d'information
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Plus d'information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <table class="table table-dark">
                            <tbody>

                              <tr>
                                <th>Date de naissance :</th>
                                <td>{{$student->birthday}}</td>
                              </tr>
                              <tr>
                                <th>Email :</th>
                                <td>{{$student->email}}</td>
                              </tr>
                              <tr>
                                <th>Téléphone :</th>
                                <td>{{$student->phone}}</td>
                              </tr>
                              <tr>
                                <th>specialté :</th>
                                <td>{{$student->specialty}}</td>
                              </tr>

                            </tbody>
                          </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div></td>
            <td>
                <form action="{{ route('accept', [  $student->id ]) }}" method="Post" class="d-inline">
                    @CSRF
                    @method('PUT')
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fas fa-times"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" class="d-inline"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Pourquoi ??</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('refused', [ $student->id ]) }}" method="Post" >
                                @CSRF
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="message">Message :</label>
                                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $defense->links() }}

@endsection
