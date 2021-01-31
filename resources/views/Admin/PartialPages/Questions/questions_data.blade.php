@section('css')
<style>
    .custom-border {
        border: #5378e8 1px solid !important;
    }
</style>
@endsection
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs mb-3">
            @foreach($questions as $q)
            @if($q->questions->count() > 0)
            <li class="nav-item">
                <a href="#home{{$q->id}}" data-toggle="tab" aria-expanded="true" class="nav-link {{$loop->first?'active':''}}">
                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">{{$q->name}}</span>
                </a>
            </li>
            @endif
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($questions as $q)
            @if($q->questions->count() > 0)
            <div class="tab-pane {{$loop->first?'active':''}}" id="home{{$q->id}}">
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 pt-3">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dataTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">SL</th>
                                                <th style="width: 40%;">Question</th>
                                                <th style="width: 40%;">Options</th>
                                                <th style="width: 10%;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($q->questions as $qs)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$qs->question_text}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        @foreach($qs->options as $qo)
                                                        <button class="btn mr-1" style="border: #5378e8 1px solid;"><i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i> {{$qo->option}}</button>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a class="edit" style="cursor: pointer; color:black;" data-id="{{$qs->id}}" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                                    <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Question</th>
                                                <th>Options</th>
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
            @endif
            @endforeach

        </div>
    </div> <!-- end card-body-->
</div> <!-- end card-->
<script>
    var table;
    $('.dataTable').DataTable({
        responsive: true,
        "ordering": false
    });
    // table = $('.dataTable')
    //     .on('draw.dt', function() {}).DataTable();
</script>