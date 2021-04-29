@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
<nav aria-label="breadcrumb" class="container-fluid">
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="{{url('/admin/productos')}}"><i class="fas fa-boxes"></i>Productos</a>
	
</li>
<li class="breadcrumb-item">
	<a href="{{url('/admin/producto/create')}}"><i class="fas fa-plus-circle"></i>Agregar Productos</a>
	
</li>
</ol>
</nav>

@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="Title"> <i class="fas fa-plus"></i> Agregar Producto</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            {!! Form::open(['url' => '/admin/producto/create', 'files'=>true])!!}
            <div class="row">
            <div class="col-md-6">
					<label for="name">Nombre del Producto:</label>
					<div class="input-group">
						<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						 </div>
					{!! Form::text('name',null,['class' => 'form-control'])!!}
				</div>
				</div>

				<div class="col-md-3">
					<label for="category">Categoria:</label>
					<div class="input-group">
						<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
    						</span>
						 </div>
						 {!! Form::select('category', $cats,0,['class'=>'custom-select'])!!}
					</div>
				</div>
				<div class="col-md-3">
					<label for="name">Imágen Destacada:</label>
					<div class="custom-file">
					{!! Form::file('img',['class' => 'custom-file-input', 'id' =>'custom-file', 'accept'=>'image/*'])!!} {{--//filtrar solo imagenes accept--}}
					<label class="custom-file-label" for="custom-file"> Seleccionar imágen</label>
					</div>
				</div>
                
            
            </div>
            
			<div class="row mtop16">
				<div class="col-md-3">
					<label for="price">Precio</label>
					<div class="input-group">
						<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						 </div>
						 {!! Form::number('price',null, ['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
				</div>
				</div>
				<div class="col-md-3">
					<label for="price">¿En Descuento?</label>
					<div class="input-group">
						<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						 </div>
						 {!! Form::select('indiscount',['0'=>'No','1'=>'Si'],0,['class'=>'form-control'])!!}
				</div>
				</div>

				<div class="col-md-3">
					<label for="price">Descuento :</label>
					<div class="input-group">
						<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
						 </div>
						 {!! Form::number('discount', 0.00, ['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
				</div>
				</div>

			</div>
			<div class="row mtop16">
				<div class="col-md-12">
					<label for="content">Descripción</label>
					{!! Form::textarea('content',null, ['class'=>'form-control','id'=>'editor'])!!}
				</div>
			</div>
			<div class="row mtop16">
				<div class="col-md-12">
					{!! Form::submit('GUARDAR',['class' => 'btn btn-success'])!!}
				</div>
			</div>
            
            {!! Form::close() !!}
              
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
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
@stop
