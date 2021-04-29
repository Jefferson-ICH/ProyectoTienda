@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')

@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="Title"> <i class="fas fa-boxes"></i> Lista de Productos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="btns ">
            <a href="{{url('/admin/producto/create')}}" class="btn btn-info mt-2" ><i class="fas fa-plus-circle">  Agregar Producto</i></a>
            </div>
                <table id="categories" class="table table-bordered table-striped mt-3">
                <thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td></td>
						<td>Categoría</td>
						<td>Precio</td>
						<td></td>
					</tr>
				</thead>
                <tbody>
				
				</tbody>
                   
                </table>
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
