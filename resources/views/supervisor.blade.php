@extends('layouts.supervisor')
@section('content')

@if(!$check)
<form action="{{ route('information') }}" method="Post">
    @CSRF
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name" />
    </div>
    <div class="form-group">
        <label for="university">Établissement :</label>
        <input type="text" class="form-control" id="university" name="university" />
    </div>
    <div class="form-group">
        <label for="department">Département :</label>
        <input type="text" class="form-control" id="department" name="department" />
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="mail" class="form-control" id="email" name="email" />
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@else
<div class="row ">
    <div class="col-md-4">
        <div class="card text-white background-card3 mb-3" style="max-width: 18rem;">
            <div class="card-header text-center font-weight-bold ">Demande pas encore traiter</div>
            <div class="card-body">
                <h5 class="card-title">Nombre : {{ $notTreated}} </h5>
            </div>
            <div class="card-footer bg-transparent border-light">
                <center>

                    <a href="{{ route('Soutenance.create')}}" class="text-white">Cliquez pour voir</a>
                </center>
            </div>

        </div>

    </div>
    <div class="col-md-4">
        <div class="card text-white background-card mb-3" style="max-width: 18rem;">
            <div class="card-header text-center font-weight-bold">Demande Accepté</div>
            <div class="card-body">
                <h5 class="card-title">Nombre : {{ $accepted}} </h5>
            </div>
            <div class="card-footer bg-transparent border-light">
                <center>
                    <a href="{{ route('acceptedDefense')}}" class="text-white">Cliquez pour voir</a>

                </center>
            </div>
        </div>
    </div>
    <div class="col-md-4">

        <div class="card text-white background-card2 mb-3" style="max-width: 18rem;">
            <div class="card-header text-center font-weight-bold">Demande refusée</div>
            <div class="card-body">
                <h5 class="card-title">Nombre : {{ $refused}} </h5>

            </div>
            <div class="card-footer bg-transparent border-light">
                <center>

                    <a href="{{route('refusedDefense')}}" class="text-white">Cliquez pour voir</a>
                </center>
            </div>

        </div>
    </div>
</div>
<div class="card ">
    <div class="card-header text-center font-weight-bold">
        Date des soutenances
    </div>
    <div class="card-body">

        <div id='calendar'></div>
    </div>
    </div>
</div>
@endif
<script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events
             events: <?php echo json_encode($Events); ?>
      });
    });
</script>
@endsection
