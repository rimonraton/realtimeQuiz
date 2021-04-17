@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.role_list')}}</h4>
                <hr>
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-topic">{{__('form.add_role')}}</button>
                <!-- Add Contact Popup Model -->
                <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.add_role_header')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('createRole')}}" autocomplete="off">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-6 m-b-20">
                                            <input type="text" class="form-control" name="role_name" placeholder="{{__('form.add_role_placeholder')}}" require>
                                        </div>
                                        <div class="col-6 m-b-20">
                                            <input type="text" class="form-control" name="bn_role_name" placeholder="{{__('form.add_bn_role_placeholder')}}" require>
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
                                @if($roles->count() > 0)
                                <table class="table table-striped table-bordered" >
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 10%;">{{__('form.sl')}}</th>
                                            <th style="width: 35%;">{{__('form.role_name')}}</th>
                                            <th style="width: 35%;">{{__('form.role_name_bn')}}</th>
                                            <th style="width: 20%;">{{__('form.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                            <td>{{$role->role_name}}</td>
                                            <td>{{$role->bn_role_name}}</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="{{$role->id}}" data-name="{{$role->role_name}}" data-bn_name="{{$role->bn_role_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete text-danger" style="cursor: pointer;" data-id="{{$role->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('form.sl')}}</th>
                                            <th>{{__('form.role_name')}}</th>
                                            <th>{{__('form.role_name_bn')}}</th>
                                            <th>{{__('form.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                    {{$roles->links()}}
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

<div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.update_header')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('roleUpdate')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group row">
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" name="role_name" id="editName">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" name="bn_role_name" id="bneditName">
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
            $('#editName').val($(this).attr('data-name'));
            $('#bneditName').val($(this).attr('data-bn_name'))
            $('#edit-category').modal('show');
        })

        $(document).on('click', ".delete", function() {
            Swal.fire({
                title: '{{__('form.are_you_sure')}}',
                text: "{{__('form.no_revert')}}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:"{{__('form.cancel')}}",
                confirmButtonText: '{{__('form.yes_delete_it')}}!'
            }).then((result) => {
                if (result.value) {
                    var $this = $(this);
                    var id = $this.attr('data-id');
                    $.ajax({
                        url: "{{url('roleDelete')}}/" + id,
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
