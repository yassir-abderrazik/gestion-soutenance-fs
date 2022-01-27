@extends('layouts.admin')
@section('content')
<div class="container m-4 h-100">

    <div id='calendar'></div>
</div>
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
