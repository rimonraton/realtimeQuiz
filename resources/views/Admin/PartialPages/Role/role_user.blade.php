@extends('Admin.Layout.dashboard')
@php
    $lang = App::getLocale();
@endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.role_user')}}</h4>
                <hr>
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-topic">{{__('form.assign_role')}}</button>
                <!-- Add Contact Popup Model -->
                <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.assign_role')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('createRoleUser')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.role')}}</label>
                                        <div class="col-sm-9" id="options">
                                            <select class="form-control  arcategory" name="role_id" id="">
                                                <option value="">{{__('form.select_role')}}</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$lang=='gb'?$role->role_name:$role->bn_role_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.user')}}</label>
                                        <div class="col-sm-9" id="options">
                                            <select class="form-control  arcategory" name="user_id" id="">
                                                <option value="">{{__('form.select_user')}}</option>
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name.' ( '.$user->email.' )'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect">{{__('form.save')}}</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
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
                                <table class="table table-striped table-bordered" >
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 10%;">{{__('form.sl')}}</th>
                                            <th style="width: 20%;">{{__('form.user_name')}}</th>
                                            <th style="width: 30%;">{{__('form.email')}}</th>
                                            <th style="width: 20%;">{{__('form.role')}}</th>
                                            <th style="width: 20%;">{{__('form.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_role as $ur)
                                        @if($ur->roleuser && $ur->roleuser->role->id != 1)
                                        <tr>
                                            <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
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
                                            <th>{{__('form.sl')}}</th>
                                            <th>{{__('form.user_name')}}</th>
                                            <th>{{__('form.email')}}</th>
                                            <th>{{__('form.role')}}</th>
                                            <th>{{__('form.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                    {{$user_role->links()}}
                                @else
                                <div class="text-center">
                                    <p>
                                        {{__('form.no_data_found')}}
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
                <h4 class="modal-title" id="myModalLabel">{{__('form.update_user_role')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('roleuserUpdate')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.role')}}</label>
                        <div class="col-sm-9" id="options">
                            <select class="form-control  arcategory" name="uprole_id" id="uprole">
                                <option value="">{{__('form.role_select')}}</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.user')}}</label>
                        <div class="col-sm-9" id="options">
                            <select class="form-control  arcategory" name="upuser_id" id="upuser">
                                <option value="">{{__('form.user_select')}}</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
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
