@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
<h1>
User Type
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-usertype">
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
                    <h3 class="card-title">usertypes list</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="usertypes" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($userstype as $usertype)
                      <tr>
                        <td>{{$usertype->id}}</td>
                        <td>{{$usertype->name}}</td>
                        <td>
                          <button class="btn btn-warning" data-toggle="modal" data-target="#modal-update-usertype-{{$usertype->id}}">Editar</button>
                          <form method="POST" action="{{ route('admin.usertype.delete', $usertype->id)}}">
                            {{ csrf_field()}}
                            @method('DELETE')
                            <button class="btn btn-danger">Eliminar</button>
                          </form>
                        </td>
                      </tr>

                      </-- Include update usertype---/>
                      @include('admin.usertype.modal_update_usertype')
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
<div class="modal fade" id="modal-create-usertype">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
        <form action="{{ route('admin.usertype.store')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-header">
                  <h4 class="modal-title">Create user type</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="usertype">User type</label>
                  <input id="usertype" class="form-control" type="text" name="usertype">
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
    $('#usertypes').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop
