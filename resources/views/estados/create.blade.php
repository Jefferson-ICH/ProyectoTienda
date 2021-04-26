@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
    <h1>Agregar Estados</h1>
      

@stop

@section('content')
    <form action="{{ url('/estados')}}" method="post" enctype="multipart/form-data" class="form-horizontal" > 
    {{csrf_field()}}

 @include('estados.form',['Modo'=>'crear'])
 
    
        
     </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop