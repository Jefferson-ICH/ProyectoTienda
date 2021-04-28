<!-- modal update user type-->
<div class="modal fade" id="modal-update-usertype-{{$usertype->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
          <form action="{{ route('admin.usertype.update',$usertype->id)}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-header">
                  <h4 class="modal-title">Update User type</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="usertype">User Type</label>
                  <input id="usertype" class="form-control" type="text" value="{{$usertype->name}}" name="usertype">
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
<!-- /.modal update user type-->