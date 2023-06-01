@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar información de la categoria</h1>
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
                    {!! Form::model($category, ['route' => ['admin.categories.update',$category], 'method' => 'put']) !!}

                        <div class="form-group">
                            {!! Form::label('categoria', 'Nombre') !!}
                            {!! Form::text('categoria', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del hermano']) !!}

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del hermano' , 'readonly']) !!}
                        
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
        $("#categoria").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>
@endsection