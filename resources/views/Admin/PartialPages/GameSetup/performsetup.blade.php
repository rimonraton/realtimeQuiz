@extends('Admin.Layout.dashboard')
@section('content')

<!-- start -->
<div class="row">
    <!-- Column -->
    @foreach($perfom_message as $pm)
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card {{$pm->header_color}}">
                    <div class="card-body text-white">
                        <div class="d-flex flex-row">
                            <div class="align-self-center display-6">
                                <i class="{{$pm->icon}}"></i>
                            </div>
                            <div class="p-2 align-self-center">
                                <h4 class="mb-0 text-white">{{$pm->game_name}}</h4>
                                <!-- <span>Income</span> -->
                            </div>
                            <div class="ml-auto align-self-center">
                                <!-- <h2 class="font-weight-medium mb-0 text-white">$2900</h2> -->
                                <a data-id="{{$pm->id}}" data-name="{{$pm->game_name}}" style="cursor:pointer;" class="text-white add"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 10%;">SL</th>
                                            <th style="width: 10%;">Percent</th>
                                            <th style="width: 70%;">Message</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pm->perform_messages as $ppm)
                                        <tr>
                                            <td class="sorting_1">{{$loop->iteration}}</td>
                                            <td>{{$ppm->perform_status.'%'}}</td>
                                            <td>{{$ppm->perform_message}}</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="{{$ppm->id}}" data-game="{{$pm->game_name}}" data-status="{{$ppm->perform_status}}" data-msg="{{$ppm->perform_message}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete" style="cursor: pointer;" data-id="{{$ppm->id}}" title="Remove"><i class="fas fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">SL</th>
                                            <th rowspan="1" colspan="1">Percent</th>
                                            <th rowspan="1" colspan="1">Message</th>
                                            <th rowspan="1" colspan="1">Action</th>
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
    @endforeach
    <!-- Column -->


</div>
<!-- end -->
<div id="add-gamemode" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Perform Message (<span id="gametype"></span>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('game/perform-message/save')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" name="game_id" id="game_id">
                    <div class="form-group d-flex">
                        <div class="col-md-10 m-b-20">
                            <input type="number" min="0" class="form-control" name="perform_status" placeholder="Type number of percent" require>
                        </div>
                        <div class="col-md-2 m-b-20">
                            %
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" name="message" placeholder="Type Message" require>
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
<div id="edit-gamemode" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Perform Message ( <span id="gt"></span> )</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('game/perform-message/edit')}}">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group d-flex">
                        <div class="col-md-10 m-b-20">
                            <input type="number" min="0" id="perform" class="form-control" name="perform_status" placeholder="Type number of percent" require>
                        </div>
                        <div class="col-md-2 m-b-20">
                            %
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editMsg" name="message" placeholder="Type category">
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
        $('.edit').on('click', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#perform').val($(this).attr('data-status'));
            $('#editMsg').val($(this).attr('data-msg'));
            $('#gt').html($(this).attr('data-game') + " " + "Mode");
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
                        url: "{{url('game/perform-message/delete')}}/" + id,
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

        $(".add").on('click', function() {
            var game_id = $(this).attr('data-id');
            $('#game_id').val(game_id);
            $('#gametype').html($(this).attr('data-name') + " " + "Mode");
            $('#add-gamemode').modal('show');
        })
    })
</script>
@endsection