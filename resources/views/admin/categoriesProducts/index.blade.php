@extends('adminlte::page')

@section('title', 'Home Categories')

@section('content_header')

@stop

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header mt-1">
                    <h3 class="Title"> <i class="fas fa-folder-open"></i> Categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="btns">
            <a  ><i class="fas fa-plus-circle">  Agregar Categoría</i></a>
            </div>
                <div class="inside mt-2">
                {!! Form::open(['url' => '/admin/categoryProduct/create'])!!}
                <label for="name">Nombre:</label>
					<div class="input-group">
						<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						 </div>
					{!! Form::text('name',null,['class' => 'form-control'])!!}
				</div>
                <label for="module" class="mtop-16">Módulo/Sección:</label>
					<div class="input-group">
						<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						 </div>
                         {!! Form::select('module', getModulesArray(),0,['class'=>'custom-select'])!!}
				</div>
                <label for="icon" class="mtop16">Ícono:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<i class="far fa-keyboard"></i>
							</span>
						 </div>
					{!! Form::text('icon',null,['class' => 'form-control'])!!}
					</div>
				{!! Form::submit('GUARDAR',['class' => 'btn btn-success mt-2'])!!}
                {!! Form::close() !!}
                </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-9">
			<div class="panel shadow bg-white">
				<div class="card-header mt-1">
					<h2 class="title"><i class="fas fa-folder-open"></i>Categorías</h2>
				</div>
                <div class="inside">
					<nav class="nav nav-pills nav-justified">
						@foreach (getModulesArray() as $m => $k)
						<a class="nav-link" href="{{url('/admin/categoriesProducts/'.$m)}}"><i class="fas fa-list-ul "></i> {{ $k}}</a> 
						@endforeach
						{{--Obtener las categorias e implantar en la seccion--}}
					</nav>
					<table class="table mtop16">
						<thead>
							<tr>
								<td width="32px"></td>
								<td>Nombre</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach ($cats as $cat)
							<tr>
								<td>{!! htmlspecialchars_decode($cat->icono) !!}</td> 
								<td>{{ $cat->name }}</td>
								<td>
									<div class="opts">
										<a href="{{ url('/admin/categoryProduct/'.$cat->id.'/edit') }}"  data-toggle="tooltip" data-placement="top" title="Editar">
											<i class="far fa-edit"></i>
										</a>
										<a href="{{ url('/admin/categoryProduct/'.$cat->id.'/delete') }}"  data-toggle="tooltip" data-placement="top" title="Eliminar">
											<i class="fas fa-trash-alt"></i>
										</a>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Create category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
                <p>Proximamente, Formulario....</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#products').DataTable( {
        "order": [[ 4, "desc" ]]
    } );
} );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@stop
