@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
<h1>
    categories
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Create
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories list</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                          <td>{{$category->id}}</td>
                          <td>{{$category->name}}</td>
                          <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modal-update-category-{{$category->id}}">Editar</button>
                            <form method="POST" action="{{ route('admin.categories.delete', $category->id)}}">
                              {{ csrf_field()}}
                              @method('DELETE')
                              <button class="btn btn-danger">Eliminar</button>
                            </form>
                            
                          </td>
                        </tr>

                        </-- Include update category---/>
                        @include('admin.category.modal_update_category')
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Options</th>
                      </tr>
                    </tfoot>
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
          <form action="{{ route('admin.categories.store')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-header">
                  <h4 class="modal-title">Create category</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="category">Category</label>
                  <input id="category" class="form-control" type="text" name="category">
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline-primary">Save</button>
              </div>
            </form>
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
    $('#categories').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop
