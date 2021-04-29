@extends('adminlte::page')

@section('title', ' Productos')

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
                <table  class="table table-bordered table-striped mt-3">
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
					@foreach ($products as $p)
						<tr  @if ($p->status == "0") class="table table-warning " @endif>
							<td width="50pxs">{{$p->id}}</td>
							<td>{{$p->name}}</td>
							<td><a href="{{url('/uploads/'.$p->file_path.'/t_'.$p->image)}}" width="63px" data-fancybox="gallery">
								<img src="{{url('/uploads/'.$p->file_path.'/t_'.$p->image)}}" width="63px"></td>
								</a>
							<td>{{$p->cat->name}}</td>
							<td>{{$p->price}}</td>
							<td>
								<div class="opts">
									<a href="{{ url('/admin/producto/'.$p->id.'/edit') }}"  data-toggle="tooltip" data-placement="top" title="Editar">
										<i class="far fa-edit"></i>
									</a>
									<a href="{{ url('/admin/producto/'.$p->id.'/delete') }}"  data-toggle="tooltip" data-placement="top" title="Eliminar">
										<i class="fas fa-trash-alt"></i>
									</a>
								</div>
							</td>
						</tr>						
					@endforeach
					<tr>
						<td colspan="6">{!!$products->render()!!}</td>
					</tr>
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
