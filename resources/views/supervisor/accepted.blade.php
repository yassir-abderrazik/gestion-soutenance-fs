@extends('layouts.supervisor')
@section('content')
<table class="table mt-4">
    <thead class="thead thead-light">
        <th>Nom</th>
        <th>Projet</th>
        <th>Résumé</th>
        <th>informations</th>
        <th>Compléter les informations</th>
    </thead>
    <tbody>
        @foreach ($defense as $student)
        <tr>
            <td>{{$student->firstname}} {{$student->lastname}}</td>
            <td>{{$student->project}}</td>
            <td>{{$student->summary}}</td>
            <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
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
                @if(!$student->jury)
                <button type="button" class="btn btn-success" data-toggle="modal"
                    data-target=".bd-example-modal-lg">Compléter</button>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="m-5">
                                <form action="{{ route('jury', [  $student->id ]) }}" method="Post" class="d-inline">
                                    @CSRF
                                    <div class="form-group">
                                        <label for="presidentName">Le président :</label>
                                        <input type="text" class="form-control" id="presidentName" name="presidentName"
                                            placeholder="Le président" value="{{ old('presidentName') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="presidentUniversity">Président établissement :</label>
                                        <input type="text" class="form-control" id="presidentUniversity"
                                            name="presidentUniversity" placeholder="Président établissement"
                                            value="{{ old('presidentUniversity') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="examinerName">L’examinateur :</label>
                                        <input type="text" class="form-control" id="examinerName" name="examinerName"
                                            placeholder="L’examinateur " value="{{ old('examinerName') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="examinerUniversity">Examinateur établissement :</label>
                                        <input type="text" class="form-control" id="examinerUniversity"
                                            name="examinerUniversity" placeholder="Examiner établissement"
                                            value="{{ old('examinerUniversity') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="guestName">L’invité :</label>
                                        <input type="text" class="form-control" id="guestName" name="guestName"
                                            placeholder="L’invité" value="{{ old('guestName') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="guestUniversity">Invité établissement :</label>
                                        <input type="text" class="form-control" id="guestUniversity"
                                            name="guestUniversity" placeholder="Invité établissement"
                                            value="{{ old('guestUniversity') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dateDefense">La date de soutenance:</label>
                                        <input type="datetime-local" class="form-control" id="dateDefense" name="dateDefense"
                                            placeholder="Date defense" value="{{ old('dateDefense') }}">
                                    </div>
                                    <center>

                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <form class="d-inline" action="{{ route('downloadDefense', [ $student->id])}}" method="Get" >
                    @CSRF
                    <button type="submit" class="btn btn-danger d-inline">Télécharger</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
