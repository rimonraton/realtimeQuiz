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
                                <h4 class="mb-0 text-white">{{$pm->gb_game_name}}</h4>
                                <!-- <span>Income</span> -->
                            </div>
                            <div class="ml-auto align-self-center">
                                <!-- <h2 class="font-weight-medium mb-0 text-white">$2900</h2> -->
                                <a data-id="{{$pm->id}}" data-name="{{$pm->gb_game_name}}" style="cursor:pointer;" class="text-white add"><i class="fas fa-plus"></i> Add New</a>
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
                                            <th style="width: 40%;">English Name</th>
                                            <th style="width: 40%;">Bangla Name</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pm->features as $f)
                                        <tr>
                                            <td class="sorting_1">{{$loop->iteration}}</td>
                                            <td>{{$f->gb_feature_name}}</td>
                                            <td>{{$f->bd_feature_name}}</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="{{$f->id}}" data-game="{{$pm->gb_game_name}}" data-gb="{{$f->gb_feature_name}}" data-bd="{{$f->bd_feature_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete" style="cursor: pointer;" data-id="{{$f->id}}" title="Remove"><i class="fas fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">SL</th>
                                            <th rowspan="1" colspan="1">English Name</th>
                                            <th rowspan="1" colspan="1">Bangla Name</th>
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
<div id="add-feacher" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Perform Message (<span id="gametype"></span>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('features/save')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" name="game_id" id="game_id">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" pattern="^[a-zA-Z0-9 ]+$" name="gb_feature_name" placeholder="Type feature in English" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" name="bd_feature_name" placeholder="Type feature in Bangla" require>
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
<div id="edit-feature" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Perform Message ( <span id="gt"></span> )</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('features/update')}}">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editgb" pattern="^[a-zA-Z0-9 ]+$" name="gb_feature_name" placeholder="Type Feature in English">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editbd" name="bd_feature_name" placeholder="Type Feature in Bangla">
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
            $('#editgb').val($(this).attr('data-gb'));
            $('#editbd').val($(this).attr('data-bd'));
            $('#gt').html($(this).attr('data-game') + " " + "Mode");
            $('#edit-feature').modal('show');
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
                        url: "{{url('features/delete')}}/" + id,
                        type: "GET",
                        success: function(data) {
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
            $('#add-feacher').modal('show');
        })
    })
</script>
@endsection