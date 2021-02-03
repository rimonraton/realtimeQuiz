<div class="card w-100">
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
                <div class="col-md-12 pb-2">
                    <input type="checkbox" value="" id="child{{$q->id}}" class="material-inputs checkAll">
                    <label for="child{{$q->id}}">Check All</label>
                </div>
                <div class="table-responsive" style="overflow-x: hidden">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 pt-3">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 10%;">SL</th>
                                                <th style="width: 10%;">Action</th>
                                                <th style="width: 40%;">Questions in English</th>
                                                <th style="width: 40%;">Questions in Bangla</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($q->questions as $qq)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="text-center">
                                                    <!-- <div class="col-md-12"> -->
                                                    <input type="checkbox" name="questions[]" value="{{$qq->id}}" id="chc{{$qq->id}}" class="material-inputs child{{$q->id}}">
                                                    <label for="chc{{$qq->id}}"></label>
                                                    <!-- </div> -->
                                                </td>
                                                <td>
                                                    {{$qq->question_text}}
                                                </td>
                                                <td>
                                                    {{$qq->bd_question_text}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Action</th>
                                                <th>Questions in English</th>
                                                <th>Questions in Bangla</th>
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
</div>
<script>
    $('.dataTable').DataTable({
        responsive: true,
        "ordering": false
    });
    $(".checkAll").on('click', function() {
        var child = $(this).attr('id');
        $("." + child).not(this).prop('checked', this.checked);
    });
</script>