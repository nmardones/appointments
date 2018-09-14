@extends('layout.app')

@section('content')
    <p>
        <a href="{{route('appointment.create')}}" class="btn btn-success">Add new</a>

    </p>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <div id='calendar'></div>

@stop

@push('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                defaultView: 'agendaWeek',
                businessHours: {
                    dow: [ 1, 2, 3, 4, 5 ], // Monday - Thursday
                    start: '09:00', // a start time (10am in this example)
                    end: '19:00', // an end time (6pm in this example)
                },
                events : [
                    @foreach($apponitment as $hour)
                    {
                        title : '{{ $hour->contact }}',
                        start : '{{ $hour->date . ' ' . $hour->start_time }}',
                        end : '{{ $hour->date . ' ' . $hour->finish_time }}',
                        url : '{{ route('appointment.edit', $hour->id) }}'
                    },
                    @endforeach

                ]
            })
        });
    </script>
@endpush
