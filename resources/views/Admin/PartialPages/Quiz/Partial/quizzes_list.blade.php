<div class="card">
    <div class="card-body">
        <div class="table-responsive" style="overflow-x: hidden">

            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 pt-3">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                <thead>
                                    <tr role="row" class="text-center">
                                        <th style="width: 10%;">SL</th>
                                        <th style="width: 25%;">Quiz Name in English</th>
                                        <th style="width: 25%;">Quiz Name in Bangla</th>
                                        <th style="width: 15%;">Number Of Questions</th>
                                        <th style="width: 15%;">Publish</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quiz as $qs)
                                    <tr class="text-center">
                                        <td class="sorting_1">{{$loop->iteration}}</td>
                                        <td>{{$qs->quiz_name}} </td>
                                        
                                        <td>@if($qs->bd_quiz_name){{$qs->bd_quiz_name}} @endif</td>
                                        <td> <span class="badge badge-info">{{count(explode(",", $qs->questions))}} questions</span></td>
                                        
                                        <td>
                                            <div class="bt-switch">
                                                <!-- <input type="hidden" name="status" class="hi" value="0"> -->
                                                <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="Yes" data-off-text="No" data-size="normal" {{$qs->status ==1?"checked":""}} />
                                            </div>
                                        </td>
                                        <td>
                                            <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->quiz_name}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a>
                                            <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Quiz Name in English</th>
                                        <th>Quiz Name in Bangla</th>
                                        <th>Number Of Questions</th>
                                        <th>Publish</th>
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
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
        var id = $(this).attr('data-id');
        if (state == true) {
            publishedOrNot(id, 1);
            // $(this).prop('checked', true);
        } else {
            publishedOrNot(id, 0);
            // $(this).removeProp('checked');

        }
    });

    function publishedOrNot(id, value) {
        $.ajax({
            url: "{{url('quizPublished')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
                'value': value
            },
            success: function(data) {
                Swal.fire({
                    text: data,
                    type: 'success',
                    timer: 1000,
                    showConfirmButton: false
                })
            }
        })
    }
    $('.dataTable').DataTable({
        responsive: true,
        "ordering": false,
    });
</script>