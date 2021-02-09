@extends('Admin.Layout.dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.game_mode_list')}}</h4>
                <hr>
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-contact">{{__('form.add_game_mode')}}</button>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.new_game_mood')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('game/gamemode/save')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" name="gb_game_name" placeholder="{{__('form.game_mode_en_placeholder')}}" require>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" name="bd_game_name" placeholder="{{__('form.game_mode_bn_placeholder')}}" require>
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
                                <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 0px;">{{__('form.sl')}}</th>
                                            <th style="width: 0px;">{{__('form.game_mode_en')}}</th>
                                            <th style="width: 0px;">{{__('form.game_mode_bn')}}</th>
                                            <th style="width: 0px;">{{__('form.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($game as $g)
                                        <tr>
                                            <td class="sorting_1">{{$loop->iteration}}</td>
                                            <td>{{$g->gb_game_name}}</td>
                                            <td>{{$g->bd_game_name}}</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="{{$g->id}}" data-gb="{{$g->gb_game_name}}" data-bd="{{$g->bd_game_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete" style="cursor: pointer;" data-id="{{$g->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.game_mode_en')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.game_mode_bn')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- <div class="text-center">
                                    <p>
                                        No Data Found..
                                    </p>
                                </div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="edit-gamemode" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.update_game_mode')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('game/gamemode/update')}}">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editgb" name="gb_game_name" placeholder="Type Game Mode in English">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editbd" name="bd_game_name" placeholder="Type Game Mode in Bangla">
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
        $('.edit').on('click', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#editgb').val($(this).attr('data-gb'));
            $('#editbd').val($(this).attr('data-bd'));
            $('#edit-gamemode').modal('show');
        })

        $(".delete").click(function() {
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
                        url: "{{url('game/gamemode/delete')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            // $(this).parent().parent().remove();
                            // alert($this.parent().parent());
                            $this.closest("tr").remove();
                            toastr.success(data, {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                timeOut: 1000
                            });
                            // Swal.fire({
                            //     text: data,
                            //     type: 'success',
                            //     timer: 1000,
                            //     showConfirmButton: false
                            // })
                        }
                    })

                }
            })
        });
    })
</script>
@endsection