@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.team_list')}}</h4>
                <hr>
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-contact">{{__('form.add_team')}}</button>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.add_team_header')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('createTeam')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6 m-b-20">
                                            <input type="text" class="form-control" name="name" placeholder="{{__('form.add_team_placholder')}}" >
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <input type="text" class="form-control" name="bn_name" placeholder="{{__('form.add_bn_team_placholder')}}" >
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        @foreach($admin_users as $au)--}}
{{--                                            @if($au->roleuser->role_id > 3)--}}
{{--                                                <div class="checkbox checkbox-info m-1 badge badge-light-danger col-md-5 col-sm-12">--}}
{{--                                                    <input type="checkbox" name="members[]" value="{{$au->id}}" id="chca_{{$au->id}}" class="material-inputs chk child{{$au->id}}">--}}
{{--                                                    <label for="chca_{{$au->id}}">{{$au->name}}</label>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
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
                                @if($teams->count() > 0)
                                <table  class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 20%">{{__('form.sl')}}</th>
                                            <th style="width: 15%;">{{__('form.team_en')}}</th>
                                            <th style="width: 15%;">{{__('form.team_bn')}}</th>
                                            <th style="width: 30%;">{{__('form.team_member')}}</th>
                                            <th style="width: 20%;">{{__('form.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teams as $team)

{{--                                            {{$team->members}}--}}
                                        <tr role="row" class="odd">
                                            <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                            <td>
                                                {{$team->name}}

                                            </td>

                                            <td>{{$team->bn_name}}</td>
                                            <td>
                                                @if($team->members)
                                                    @foreach(\App\User::whereIn('id',explode(',',$team->members->user_ids))->get() as $users)
                                                        <span class="badge badge-dark-primary">{{$users->name}}</span>
                                                    @endforeach
                                                @else
                                                    No Members
                                                @endif
                                            </td>
                                            <td style="text-align: center; ">

{{--                                                <a class="add text-dark" href="" data-id="{{$team->id}}" title="Add"><i class="fas fa-plus"></i></a>--}}
                                                <a class="edit" href="" data-pid="{{$team->id}}" data-id="{{$team->id}}" data-name="{{$team->name}}" data-bnname="{{$team->bn_name}}" data-ids="{{$team->members?$team->members->user_ids:''}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete text-danger" style="cursor: pointer;" data-id="{{$team->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.team_en')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.team_bn')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.team_member')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                    {{$teams->links()}}
                                @else
                                <div class="text-center">
                                    <p>{{__('form.no_data_found')}}</p>
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
                <h4 class="modal-title" id="myModalLabel">{{__('form.team_update')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('updateTeam')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <input type="hidden" id="id_id" name="id_id">

                    <div class="form-group row">
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" id="editName" name="name">
                        </div>
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" id="editbnName" name="bnName">
                        </div>
                    </div>
                    <div class="row">
                        @foreach($admin_users as $au)
                            @if($au->roleuser->role_id > 3)
                                <div class="checkbox checkbox-info m-1 badge badge-light-danger col-md-5 col-sm-12">
                                    <input type="checkbox" name="members[]" value="{{$au->id}}" id="chce_{{$au->id}}" class="material-inputs chk child">
                                    <label for="chce_{{$au->id}}">{{$au->name}}</label>
                                </div>
                            @endif
                        @endforeach
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
<div id="add-member" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >{{__('form.team_member')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('team-members')}}" autocomplete="off">
                    @csrf
{{--                    <input type="hidden" id="uid" name="id">--}}
                    <div class="form-group row">
                        <div class="col-md-12 m-b-20">
                            <select class="form-control  arcategory" name="team" id="team_id">
                                <option value="">{{__('Select Team')}}</option>
                                @foreach($teams as $team)
                                    <option value="{{$team->id}}">{{$lang=='gb'?$team->name:$team->bn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
{{--                    <div class="form-group row">--}}
{{--                        <div class="d-flex">--}}
{{--                                @foreach($admin_users as $au)--}}
{{--                                        <div class="checkbox checkbox-info col-2">--}}
{{--                                            <input type="checkbox" name="members[]" value="{{$au->id}}" id="chc{{$au->id}}" class="material-inputs chk child{{$au->id}}">--}}
{{--                                            <label for="chc{{$au->id}}">{{$au->name}}</label>--}}
{{--                                        </div>--}}
{{--                                @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-content">--}}
{{--                            <div class="tab-pane">--}}
                                <div class="row">
                                    @foreach($admin_users as $au)
                                        @if($au->roleuser)
                                            @if($au->roleuser->role_id > 3)
                                            <div class="checkbox checkbox-info m-1 badge badge-light-danger col-md-5 col-sm-12">
                                                <input type="checkbox" name="members[]" value="{{$au->id}}" id="chc{{$au->id}}" class="material-inputs chk child{{$au->id}}">
                                                <label for="chc{{$au->id}}">{{$au->name}}</label>
                                            </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
{{--                            </div>--}}
{{--                    </div>--}}
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
@endsection

@section('js')
<script>
    $(function() {
        $('.edit').on('click', function(e) {
            e.preventDefault();
            var data = $(this).attr('data-ids').split(',');
            $.each(data,function (key,value){
                console.log(value);
                $('.child').each(function(k, v) {
                    if(value == v.value){
                        $(this).prop('checked', true);
                    }
                });
            })
            $('#uid').val($(this).attr('data-id'));
            $('#id_id').val($(this).attr('data-pid'))
            $('#editName').val($(this).attr('data-name'));
            $('#editbnName').val($(this).attr('data-bnname'));
            $('#edit-category').modal('show');
        })

        $(".delete").click(function() {
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
                        url: "{{url('deleteTeam')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            // $(this).parent().parent().remove();
                            // alert($this.parent().parent());
                            $this.closest("tr").remove();
                            Swal.fire({
                                text: '{{__('form.delete_success')}}',
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

    function deleteCategory(id) {
        $.ajax({
            url: "{{url('question/updatecategory')}}/" + id,
            type: "GET",
            success: function() {
                $(this).parent().parent().remove();
            }
        })
    }

    $('.add').on('click',function (e){
        e.preventDefault();
        $team_id = $(this).data('id');
        $('#team_id').val($team_id);
        $('#add-member').modal('show');
    });
</script>
@endsection
