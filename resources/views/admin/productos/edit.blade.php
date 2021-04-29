@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')

@stop

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-edit"></i>  Editar Producto</h2>
				</div>

					<div class="inside">
						{!! Form::open(['url' => 'admin/producto/'.$p->id.'/edit', 'files'=>true])!!}
						<div class="row">
							<div class="col-md-6">
								<label for="name">Nombre del Producto:</label>
								<div class="input-group">
									<div class="input-group-prepend">
			    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									 </div>
								{!! Form::text('name',$p->name,['class' => 'form-control'])!!} {{--llamar el nombre del  producto--}}
							</div>
							</div>

							<div class="col-md-3">
								<label for="category">Categoria:</label>
								<div class="input-group">
									<div class="input-group-prepend">
			    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i>
			    						</span>
									 </div>
									 {!! Form::select('category', $cats, $p->catproduct_id,['class'=>'custom-select'])!!}
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
									 {!! Form::number('price',$p->price, ['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
							</div>
							</div>
							<div class="col-md-3">
								<label for="price">¿En Descuento?</label>
								<div class="input-group">
									<div class="input-group-prepend">
			    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									 </div>
									 {!! Form::select('indiscount',['0'=>'No','1'=>'Si'],$p->in_discount,['class'=>'form-control'])!!}
							</div>
							</div>

							<div class="col-md-3">
								<label for="price">Descuento</label>
								<div class="input-group">
									<div class="input-group-prepend">
			    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									 </div>
									 {!! Form::number('discount', $p->discount, ['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
							</div>
							</div>

							<div class="col-md-3">
								<label for="price">Estado: </label>
								<div class="input-group">
									<div class="input-group-prepend">
			    						<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
									 </div>
									 {!! Form::select('status',['0'=>'Borrador','1'=>'Publico'],$p->status,['class'=>'custom-select'])!!}
							</div>
							</div>
						</div>
						<div class="row mtop16">
							<div class="col-md-12">
								<label for="content">Descripción</label>
								{!! Form::textarea('content',$p->content, ['class'=>'form-control','id'=>'editor'])!!}
							</div>
						</div>
						<div class="row mtop16">
							<div class="col-md-12">
								{!! Form::submit('GUARDAR',['class' => 'btn btn-success'])!!}
							</div>
						</div>
						{!! Form::close() !!}
					</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
				<h4 class="title"><i class="fas fa-image"></i> Imágen Destacada</h4>
				<div class="inside">
					<img src="{{url('/uploads/'.$p->file_path.'/'.$p->image)}}" class="img-fluid">
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
@stop