@extends('layout.app')

@section('content')
    <h3 class="page-title">Edit Appointment</h3>

    {!! Form::model($appointment, ['method' => 'PUT', 'route' => ['appointment.update', $appointment->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contact_id', 'Contact*', ['class' => 'control-label']) !!}
                    <input type="text" class="form-control" name="contact" id="contact_id" value="{{$appointment->contact}}" required>
                    <p class="help-block"></p>
                    @if($errors->has('contact_id'))
                        <p class="help-block">
                            {{ $errors->first('contact_id') }}
                        </p>
                    @endif
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'Date*', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('finish_time', 'Finish time', ['class' => 'control-label']) !!}
                    {!! Form::text('finish_time', old('finish_time'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finish_time'))
                        <p class="help-block">
                            {{ $errors->first('finish_time') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('edit'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@push('script')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: 'yy-mm-dd'
        });
    </script>
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.timepicker').datetimepicker({
            autoclose: true,
            timeFormat: "HH:mm:ss",
            timeOnly: true
        });
    </script>

@endpush
