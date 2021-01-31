@extends('Admin.Layout.dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Role User</h4>
                <hr>
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-topic">Assign Role</button>
                <!-- Add Contact Popup Model -->
                <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Assign Role</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('createRoleUser')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">Role</label>
                                        <div class="col-sm-9" id="options">
                                            <select class="form-control custom-select arcategory" name="role_id" id="">
                                                <option value="">Select Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">User</label>
                                        <div class="col-sm-9" id="options">
                                            <select class="form-control custom-select arcategory" name="user_id" id="">
                                                <option value="">Select User</option>
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect">Save</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                @if($user_role->count() > 0)
                                <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 10%;">SL</th>
                                            <th style="width: 20%;">User Name</th>
                                            <th style="width: 30%;">User Email</th>
                                            <th style="width: 20%;">Role Name</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_role as $ur)
                                        @if($ur->roleuser)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$ur->name}}</td>
                                            <td>{{$ur->email}}</td>
                                            <td>{{$ur->roleuser->role->role_name}}</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="{{$ur->roleuser->id}}" data-role="{{$ur->roleuser->role->id}}" data-user="{{$ur->id}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete text-danger" style="cursor: pointer;" data-id="{{$ur->roleuser->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>Role Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                @else
                                <div class="text-center">
                                    <p>
                                        No Data Found..
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="edit-roleuser" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Topic</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('roleuserUpdate')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 text-right control-label col-form-label">Role</label>
                        <div class="col-sm-9" id="options">
                            <select class="form-control custom-select arcategory" name="uprole_id" id="uprole">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 text-right control-label col-form-label">User</label>
                        <div class="col-sm-9" id="options">
                            <select class="form-control custom-select arcategory" name="upuser_id" id="upuser">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Update</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('js')
<script>
    $(function() {
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#uprole').val($(this).attr('data-role'));
            $('#upuser').val($(this).attr('data-user'));
            $('#edit-roleuser').modal('show');
        })

        $(document).on('click', ".delete", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    var $this = $(this);
                    var id = $this.attr('data-id');
                    $.ajax({
                        url: "{{url('deleteroleUser')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            // $(this).parent().parent().remove();
                            // alert($this.parent().parent());
                            $this.closest("tr").remove();
                            Swal.fire({
                                text: data,
                                type: 'success',
                                timer: 1000,
                                showConfirmButton: false
                            })
                        }
                    })

                }
            })
        });
    })
</script>
@endsection