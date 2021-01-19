@extends('Admin.Layout.dashboard')
@section('content')

<!-- start -->
<div class="row">
    <!-- Column -->
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title text-center">Game Mode List</h4>
                <hr> -->
                <div class="card bg-success">
                    <div class="card-body text-white">
                        <div class="d-flex flex-row">
                            <div class="align-self-center display-6"><i class="ti-wallet"></i></div>
                            <div class="p-2 align-self-center">
                                <h4 class="mb-0 text-white">Total Income</h4>
                                <span>Income</span>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-weight-medium mb-0 text-white">$2900</h2>
                            </div>
                        </div>
                        <!-- table -->

                        <!-- endtable -->

                    </div>
                </div>
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">SL</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 0px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>Practice</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="" data-name="" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete" style="cursor: pointer;" data-id="" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">SL</th>
                                            <th rowspan="1" colspan="1">Name</th>
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
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title text-center">Game Mode List</h4>
                <hr> -->
                <div class="card bg-orange">
                    <div class="card-body text-white">
                        <div class="d-flex flex-row">
                            <div class="align-self-center display-6"><i class="ti-wallet"></i></div>
                            <div class="p-2 align-self-center">
                                <h4 class="mb-0 text-white">Total Income</h4>
                                <span>Income</span>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-weight-medium mb-0 text-white">$2900</h2>
                            </div>
                        </div>
                        <!-- table -->

                        <!-- endtable -->

                    </div>
                </div>
                <div class="table-responsive m-t-40">
                    <div id="config-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="config-table" class="table display table-bordered table-striped no-wrap dataTable no-footer" role="grid" aria-describedby="config-table_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="config-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 81px;">First name</th>
                                            <th class="sorting" tabindex="0" aria-controls="config-table" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 80px;">Last name</th>
                                            <th class="sorting" tabindex="0" aria-controls="config-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Position</th>
                                            <th class="sorting" tabindex="0" aria-controls="config-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 87px;">Office</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Airi</td>
                                            <td>Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title text-center">Game Mode List</h4>
                <hr> -->
                <div class="card bg-info">
                    <div class="card-body text-white">
                        <div class="d-flex flex-row">
                            <div class="align-self-center display-6"><i class="ti-wallet"></i></div>
                            <div class="p-2 align-self-center">
                                <h4 class="mb-0 text-white">Total Income</h4>
                                <span>Income</span>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-weight-medium mb-0 text-white">$2900</h2>
                            </div>
                        </div>
                        <!-- table -->

                        <!-- endtable -->

                    </div>
                </div>
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">SL</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 0px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>Practice</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="" data-name="" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete" style="cursor: pointer;" data-id="" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">SL</th>
                                            <th rowspan="1" colspan="1">Name</th>
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
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title text-center">Game Mode List</h4>
                <hr> -->
                <div class="card bg-danger">
                    <div class="card-body text-white">
                        <div class="d-flex flex-row">
                            <div class="align-self-center display-6"><i class="ti-wallet"></i></div>
                            <div class="p-2 align-self-center">
                                <h4 class="mb-0 text-white">Total Income</h4>
                                <span>Income</span>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-weight-medium mb-0 text-white">$2900</h2>
                            </div>
                        </div>
                        <!-- table -->

                        <!-- endtable -->

                    </div>
                </div>
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">SL</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 0px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>Practice</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="" data-name="" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete" style="cursor: pointer;" data-id="" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">SL</th>
                                            <th rowspan="1" colspan="1">Name</th>
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
    <!-- Column -->


</div>
<!-- end -->
<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Game Mode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('')}}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" name="name" placeholder="Type category" require>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">Save</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('question/updatecategory')}}">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editName" name="name" placeholder="Type category">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">Update</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
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
            $('#editName').val($(this).attr('data-name'));
            $('#edit-category').modal('show');
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
                        url: "{{url('question/deletecategory')}}/" + id,
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