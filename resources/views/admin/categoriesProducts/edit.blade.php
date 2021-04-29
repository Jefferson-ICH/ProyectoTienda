@extends('adminlte::page')

@section('title', 'Editar CategoriaProducto')

@section('content_header')
<nav aria-label="breadcrumb" class="container-fluid">
<ol class="breadcrumb">
<li class="nav-item breadcrumb">
	<a href="{{url('/admin/categoriesProducts')}}"><i class="fas fa-folder-open"></i>Editar Categorias</a>
	
</li>
</ol>
</nav>
@stop

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-6">
			<div class="panel shadow bg-white">
				<div class="card-header">
					<h2 class="title"><i class="fas fa-folder-open"></i> Editar Categoría</h2>
				</div>
				<div class="inside card-body">
					{!!Form::open(['url'=>'admin/categoryProduct/'.$cat->id.'/edit'])!!} 
					<label for="name">Nombre:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<i class="far fa-keyboard"></i>
							</span>
						 </div>
					{!! Form::text('name',$cat->name,['class' => 'form-control'])!!}
				</div>
				<label for="module" class="mtop16">Módulo:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<i class="far fa-keyboard"></i>
							</span>
						 </div>
					{!! Form::select('module', getModulesArray(),$cat->module,['class'=>'custom-select'])!!}
					</div>
				<label for="icon" class="mtop16">Ícono:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<i class="far fa-keyboard"></i>
							</span>
						 </div>
					{!! Form::text('icon',$cat->icono,['class' => 'form-control'])!!}
					</div>
				{!! Form::submit('GUARDAR',['class' => 'btn btn-success mtop16 mt-2'])!!}
				{!! Form::close() !!}
				</div>
			</div>
		</div>	
	</div>
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
