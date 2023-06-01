@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Hermanos</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    {{-- <div class="row"> --}}
        {{-- <div class="col-sm-6"> --}}
            <div class="card">      
                <div class="card-body mb-n2">
                    <div class="card-header text-right">
                        <a class="btn btn-success mb-2" href="{{route('admin.brothers.create')}}">Ingresar un nuevo hermano</a>
                    </div>
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cédula</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($brothers as $brother)
                                <tr>
                                    <td>{{$brother->id}}</td>
                                    <td>{{$brother->name}}</td>
                                    <td>{{$brother->identificador}}</td>
                                    <td width="150px">
                                        <form action="{{route('admin.brothers.destroy', $brother)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a class= "btn btn-primary btn-sm" href="{{route('admin.brothers.edit', $brother)}}">Editar</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
@stop