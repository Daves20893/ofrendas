@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear una lección</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body" id="contenido">
                    {!! Form::open(['route' => 'admin.lessons.store']) !!}

                        <div class="form-group">
                            {!! Form::label('leccion', 'Nombre') !!}
                            {!! Form::text('leccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug de la categoria' , 'readonly']) !!}
                        
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

                        {!! Form::submit('Crear lección', ['class' => 'btn btn-success']) !!}


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