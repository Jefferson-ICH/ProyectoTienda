@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
    <h1>Estados</h1>
@stop

@section('content')

@if(Session::has('Mensaje') )
<div class="alert alert-success" role="alert">
    {{Session::get ('Mensaje')}}
</div>

@endif
      <a href="{{ url('/estados/create') }}" class="btn btn-success">Agregar Esados</a>

      <br/>
      <br/>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                 <th>Estado</th>
                  <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estados as $estado)
            <tr>
          
                <td>{{$loop->iteration}}</td>
                  
                  <td>{{$estado->Estado}}</td>
                      <td> 
                      <a class="btn btn-warning" href="{{ url('/estados/'.$estado->id.'/edit') }}">
                      Editar
                      </a>
                    
                    
                      <form method="post" action="{{ url('/estados/'.$estado->id)}}" style="display:inline" > 
                       {{ csrf_field() }}
                       {{ method_field('DELETE') }}
                      
                     
                       <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');"> Borrar </button>
                         </form>
                       </td>
                   
                  
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$estados->links()}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop