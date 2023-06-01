@extends('adminlte::page')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title', 'Dashboard')

@section('content_header')
    <h1>Ingresar un gasto</h1>
@stop

@section('content')
    @livewire('admin.expenses-create')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug2.js')}}"></script>
    <script src="{{asset('vendor/jQuery-suma/Suma.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('vendor/jQuery-suma/Decimales.js')}}"></script>
@endsection