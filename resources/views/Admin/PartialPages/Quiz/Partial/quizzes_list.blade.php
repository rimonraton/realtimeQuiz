<div class="card">
    <div class="card-body">
        <div class="table-responsive" style="overflow-x: hidden">

            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 pt-3">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                <thead>
                                    <tr role="row">
                                        <th style="width: 10%;">SL</th>
                                        <th style="width: 80%;">Quiz Name</th>
                                        <th style="width: 10%;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quiz as $qs)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$loop->iteration}}</td>
                                        <td>{{$qs->quiz_name}}</td>
                                        <td class="text-center">
                                            <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->quiz_name}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a>
                                            <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                            <!-- <a class="edit" href="" title="Edit"><i class="fas fa-pencil-alt"></i></a> -->
                                            <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Quiz Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div> <!-- end card-body-->
</div> <!-- end card-->
<script>
    $('.dataTable').DataTable({
        responsive: true,
        "ordering": false
    });
</script>