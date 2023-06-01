@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo hermano</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body" id="contenido">
                    {!! Form::open(['route' => 'admin.brothers.store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del hermano']) !!}

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            {!! Form::label('identificador', 'Cédula') !!}
                            {!! Form::text('identificador', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cédula del hermano', 'onchange' => 'SumarAutomatico(this.value);']) !!}
                        
                            @error('identificador')
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
                            {!! Form::hidden('creado_por', auth()->id()) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::hidden('actualizado_por', auth()->id()) !!}
                        </div>

                        {!! Form::submit('Crear hermano', ['class' => 'btn btn-success']) !!}


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
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>
    {{-- <script>
        function calcular(){
            try{
                var a = parseFloat(document.getElementById("name").value) || 0,
                    b = parseFloat(document.getElementById("identificador").value) || 0;

                document.getElementById("slug").value= a+b;
            }catch (e){}
        }
    </script> --}}

@endsection