@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
    <h1>Editar Estados</h1>
@stop

@section('content')
        <form action="{{ url('/estados/'.$estado->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
     {{method_field('PATCH')}}
     
 @include('estados.form',['Modo'=>'editar'])

    
     </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop