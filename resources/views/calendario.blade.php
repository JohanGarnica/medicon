@extends('admin.template')
@section('titulo','calendario')
@section('titulocontenido')
<h1>citas <small>calendario</small></h1>
@endsection

@section('contenido')
	<div id="calendar">
		
	</div>

	
@endsection
@section('scripts')
<!-- fullCalendar -->
<script src="{{ asset('adminlte/bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/fullcalendar/dist/locale/es.js') }}"></script>

<script>
  $(function () {
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoy',
        month: 'mes',
        week : 'semana',
        day  : 'dia'
      },
      events : {!!$agenda!!}

     


   
      
    })
  })
  
</script>
@endsection