@extends('layouts.student')
@section('content')
@guest
<h1>you are not authorized</h1>
@endguest
@auth
@if(!$student)
<form action="{{ route('formulaire.store')}}" method="POST">
    @CSRF
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="firstname" class="col-md-8 control-label">Prénom :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                                placeholder=" First Name" class="form-control border border-primary" required>
                        </div>
                        @foreach($errors->get('firstname') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-8 control-label">Nom :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"
                                placeholder="Last Name" class="form-control" required>
                        </div>
                        @foreach($errors->get('lastname') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="CIN" class="col-md-8 control-label">CIN :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="CIN" id="CIN" value="{{ old('CIN') }}"
                                placeholder="Carte d'identité nationale" class="form-control" required>
                        </div>
                        @foreach($errors->get('CIN') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="CNE" class="col-md-8 control-label">CNE :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="CNE" id="CNE" value="{{ old('CNE') }}"
                                placeholder="Code nationale étudiant" class="form-control" required>
                        </div>
                        @foreach($errors->get('CNE') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthday" class="col-md-8 control-label">Dtae de naissance :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}"
                                placeholder="birthday" class="form-control" required>
                        </div>
                        @foreach($errors->get('birthday') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-md-8 control-label">Ville :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="city"
                                class="form-control" required>
                        </div>
                        @foreach($errors->get('city') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-8 control-label">Email :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="mail" name="email" id="email" value="{{ old('email') }}" placeholder="email"
                                class="form-control" required>
                        </div>
                        @foreach($errors->get('email') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="form-group">
                    <label for="phone" class="col-md-8 control-label">Téléphone :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="phone"
                                class="form-control" required>
                        </div>
                        @foreach($errors->get('phone') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-md-8 control-label">Adresse :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="address" id="address" value="{{ old('address') }}"
                                placeholder="address" class="form-control" required>
                        </div>
                        @foreach($errors->get('address') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="faculty" class="col-md-8 control-label">Filiére :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="faculty" id="faculty" value="{{ old('faculty') }}"
                                placeholder="faculty" class="form-control" required>
                        </div>
                        @foreach($errors->get('faculty') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="specialty" class="col-md-8 control-label">Specialté :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="specialty" id="specialty" value="{{ old('specialty') }}"
                                placeholder="specialty" class="form-control" required>
                        </div>
                        @foreach($errors->get('specialty') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="supervisor" class="col-md-8 control-label">Encadrant :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <select name="supervisor" id="supervisor" class="form-control" required>
                                @foreach($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach($errors->get('supervisor') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="project" class="col-md-8 control-label">Projet :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="project" id="project" value="{{ old('project') }}"
                                placeholder="project" class="form-control" required>
                        </div>
                        @foreach($errors->get('project') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="summary" class="col-md-8 control-label">Résumé :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="summary" id="summary" value="{{ old('summary') }}"
                                placeholder="summary" class="form-control" required>
                        </div>
                        @foreach($errors->get('summary') as $error)
                        <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Créer</button>
                <button type="reset" class="btn btn-secondary">Réinitialiser</button>
            </div>
        </div>
    </div><br>
</form>
@else
<div class="card text-center">
    <div class="card-header font-weight-bold">
        Vous avez déja créer un formulaire
    </div>
    <div class="card-body text-left">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Prénon : {{ $student->firstname }}</td>
                    <td>Nom : {{ $student->lastname }}</td>
                </tr>
                <tr>
                    <td>CIN : {{ $student->CIN }}</td>
                    <td>CNE : {{ $student->CNE }}</td>
                </tr>
                <tr>
                    <td>Date de naissance : {{ $student->birthday }}</td>
                    <td>ville : {{ $student->city }}</td>
                </tr>
                <tr>
                    <td>Email : {{ $student->email }}</td>
                    <td>téléphone : {{ $student->phone }}</td>
                </tr>
                <tr>
                    <td>Adresse : {{ $student->address }}</td>
                    <td>filiére: {{ $student->faculty }}</td>
                </tr>
                <tr>
                    <td>specialité : {{ $student->specialty }}</td>
                    <td>Projet : {{ $student->project }}</td>
                </tr>
                <tr>
                    <td>Résumé : {{ $student->summary }}</td>
                    <td>Encadrant: {{ $student->supervisor->name }}</td>
                </tr>

            </tbody>
        </table>
        <div class="text-center">

            {{ $student->updated_at->diffForHumans()}}
        </div>
    </div>
    <div class="card-footer text-muted">
        <!-- Large modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Modifier
        </button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" class="d-inline">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="ml-5 text-left">

                        <form action="{{ route('formulaire.update', ['formulaire' => $student->id]) }}" method="Post" >
                            @CSRF
                            @method('PUT')

                            <div class="container">
                                <legend>
                                    <center>
                                        <h1 class="text-primary"><strong>Mise A Jour</strong></h1>
                                    </center>
                                </legend><br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="firstname" class="col-md-8 control-label">Prénom :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="firstname" id="firstname"
                                                        value="{{ old('firstname', $student->firstname) }}"
                                                        placeholder=" First Name"
                                                        class="form-control border border-primary" required>
                                                </div>
                                                @foreach($errors->get('firstname') as $error)
                                                <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname" class="col-md-8 control-label">Nom :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="lastname" id="lastname"
                                                        value="{{ old('lastname', $student->lastname) }}"
                                                        placeholder="Last Name" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('firstname') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="CIN" class="col-md-8 control-label">CIN :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="CIN" id="CIN"
                                                        value="{{ old('CIN', $student->CIN) }}"
                                                        placeholder="Carte d'identité nationale" class="form-control"
                                                        required>
                                                </div>
                                                @foreach($errors->get('CIN') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="CNE" class="col-md-8 control-label">CNE :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="CNE" id="CNE"
                                                        value="{{ old('CNE', $student->CNE) }}"
                                                        placeholder="Code nationale étudiant" class="form-control"
                                                        required>
                                                </div>
                                                @foreach($errors->get('CNE') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthday" class="col-md-8 control-label">Date de naissance :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="date" name="birthday" id="birthday"
                                                        value="{{ old('birthday', $student->birthday) }}"
                                                        placeholder="birthday" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('birthday') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-md-8 control-label">Ville :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="city" id="city"
                                                        value="{{ old('city', $student->city) }}" placeholder="city"
                                                        class="form-control" required>
                                                </div>
                                                @foreach($errors->get('city') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-md-8 control-label">Email :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="mail" name="email" id="email"
                                                        value="{{ old('email', $student->email) }}" placeholder="email"
                                                        class="form-control" required>
                                                </div>
                                                @foreach($errors->get('email') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="phone" class="col-md-8 control-label">Téléphone :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="phone" id="phone"
                                                        value="{{ old('phone', $student->phone) }}" placeholder="phone"
                                                        class="form-control" required>
                                                </div>
                                                @foreach($errors->get('phone') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-md-8 control-label">Adresse :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="address" id="address"
                                                        value="{{ old('address', $student->address) }}"
                                                        placeholder="address" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('address') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="faculty" class="col-md-8 control-label">Filiére :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="faculty" id="faculty"
                                                        value="{{ old('faculty', $student->faculty) }}"
                                                        placeholder="faculty" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('faculty') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="specialty" class="col-md-8 control-label">Specialté :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="specialty" id="specialty"
                                                        value="{{ old('specialty', $student->specialty) }}"
                                                        placeholder="specialty" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('specialty') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="supervisor" class="col-md-8 control-label">Encadrant :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <select name="supervisor" id="supervisor" class="form-control"
                                                        required>
                                                        @foreach($supervisors as $supervisor)
                                                        <option value="{{ $supervisor->id }}">{{ $supervisor->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="project" class="col-md-8 control-label">Projet :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="project" id="project"
                                                        value="{{ old('project', $student->project) }}"
                                                        placeholder="project" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('project') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="summary" class="col-md-8 control-label">Resumé :</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="summary" id="summary"
                                                        value="{{ old('summary', $student->summary) }}"
                                                        placeholder="summary" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('summary') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br><br>
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-danger btn-lg mb-3">Mise A Jour</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form class="d-inline ml-3" action="{{ route('formulaire.destroy', ['formulaire' => $student->id])}}" method="Post" >
            @CSRF
            @method('DELETE')
            <button type="submit" class="btn btn-danger d-inline">Supprimer</button>
        </form>
        <form class="d-inline ml-3" action="{{ route('download')}}" method="Get" >
            @CSRF
            <button type="submit" class="btn btn-success d-inline">Télécharger</button>
        </form>
    </div>
</div>
@endif
@endauth
@endsection
