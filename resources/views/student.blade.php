@extends('layouts.student')
@section('content')
@forelse ($student as $data)
@if($data->jury)
<center>

    <div class="badge badge-success p-4 mt-2 mb-4"> <h2>Votre Demande a été accepter</h2></div>
</center>
<div class="container mt-5">
    <div class="row ml-5">
        <div class="col-md-5">

            <table class="table ">
                <tbody>
                    <tr>
                        <th>Nom Encadrant :</th>
                        <td>{{$data->supervisor->name}}</td>
                    </tr>
                    <tr>
                        <th>Email Encadrant :</th>
                        <td>{{$data->supervisor->email}}</td>
                    </tr>
                    <tr>
                        <th>Le président :</th>
                        <td>{{$data->jury->presidentName}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-5">

            <table class="table">

                <tbody>
                    <tr>
                        <th>L'examinateur :</th>
                        <td>{{$data->jury->examinerName}}</td>
                    </tr>
                    <tr>
                        <th>L'invité :</th>
                        <td>{{$data->jury->guestName}}</td>
                    </tr>
                    <tr>
                        <th>Date de soutenance :</th>
                        <td>{{$data->jury->dateDefense}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <p id="demo" class="time"></p>

</div>
@else
<div class="card centerM text-center">
    <div class="card-header">
        Bonjour {{ Auth::user()->name}}
    </div>
    <div class="card-body">
        <p class="text-dark">Votre demande en cours de traitement. veuillez contactez votre Encadrant
            Email : {{$data->supervisor->email}}
        </p>
        <a href="{{route('formulaire.create')}}" class="btn btn-primary">Vos informations</a>
    </div>
</div>
@endif

@empty
<div class="card centerM text-center">
    <div class="card-header">
        Bonjour {{ Auth::user()->name}}
    </div>
    <div class="card-body">
        <img src="{{asset('storage/logo.jpg')}}" alt="">
        <p class="text-dark">
            La Faculté des Sciences de Tétouan (FS - Tétouan) a été créée au sein de l'Université Sidi Mohammed Ben
            Abdellah par décret n°2-82-355 du 16 Rabia1403 (31janvier 1983). Depuis l'année universitaire 1989-90, la
            Faculté des Sciences de Tétouan relève de L'université Abdelmalek Essaadi (UAE).
        </p>
    </div>
</div>
@endforelse
<script>
    // Set the date we're counting down to
    var countDownDate = new Date(<?php echo json_encode($date); ?>).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "J " + hours + "H "
      + minutes + "m " + seconds + "s ";

      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>


@endsection
