@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar información de la lección</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($lesson, ['route' => ['admin.lessons.update',$lesson], 'method' => 'put']) !!}

                        <div class="form-group">
                            {!! Form::label('leccion', 'Nombre') !!}
                            {!! Form::text('leccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la lección']) !!}

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la lección' , 'readonly']) !!}
                        
                            @error('slug')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        
                        </div>

                        <div class="form-group">
                            {!! Form::hidden('actualizado_por', auth()->id()) !!}
                        </div>

                        {!! Form::submit('Actualizar información', ['class' => 'btn btn-success']) !!}


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
        $("#leccion").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>
@endsection