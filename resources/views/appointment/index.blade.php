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
            $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                businessHours: {
                    dow: [ 1, 2, 3, 4, 5 ],
                    start: '09:00',
                    end: '19:00',
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
