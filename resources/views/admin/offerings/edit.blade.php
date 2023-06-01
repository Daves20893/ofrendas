@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar información del gasto</h1>
@stop

@section('content')
    @livewire('admin.offering-edit', ['offering' => $offering], key($offering->id))
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script> --}}
@endsection 