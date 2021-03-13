@php $lang = App::getLocale(); @endphp
<div class="card">
    <div class="card-body">
        <div class="table-responsive" style="overflow-x: hidden">

            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table  class="table table-striped table-bordered">
                                <thead>
                                    <tr role="row" class="text-center">
                                        <th style="width: 10%;">{{__('form.sl')}}</th>
                                        <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>
                                        <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>
                                        <th style="width: 15%;">{{__('form.noq')}}</th>
                                        @if($role ==='Participant')
                                            <th style="width: 15%;">{{__('form.publish')}}</th>
                                        @else
                                            <th style="width: 15%;">{{__('form.publish')}}</th>
                                            <th style="width: 10%;">{{__('form.action')}}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quiz as $qs)
                                    <tr class="text-center">
                                        <td>{{$lang=='bd'?$bang->bn_number($loop->iteration):$loop->iteration}}</td>
                                        <td>{{$qs->quiz_name}} </td>

                                        <td>@if($qs->bd_quiz_name){{$qs->bd_quiz_name}} @endif</td>
                                        <td> <span class="badge badge-info">{{$lang=='bd'?$bang->bn_number(count(explode(",", $qs->questions))):count(explode(",", $qs->questions))}} {{__('form.qus')}}</span></td>
                                        @if($role==='Participant')
                                            <td>
                                            <span class="badge badge-info">{{$qs->status ==1?__('form.yes'):__('form.no')}}</span></td>
                                        @else
                                            <td>
                                                @can('readOrwrite',$qs)
                                                    <div class="bt-switch">
                                                        <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />
                                                    </div>
                                                @else
                                                    <div class="bt-switch">
                                                        <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />
                                                    </div>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('viewQuestion',\App\Quiz::class)
                                                    <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->quiz_name}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a>
{{--                                                @endcan--}}
{{--                                                @can('update',$qs)--}}
                                                    <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                                @endcan
                                                @can('readOrwrite',$qs)
                                                    <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                                @else
                                                    <a class="disabled"><i class="fas fa-pencil-alt"></i></a>
                                                    <a class="disabled"><i class="fas fa-trash"></i></a>
                                                @endcan
                                            </td>
                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                         <tr>
                                            <th>{{__('form.sl')}}</th>
                                            <th>{{__('form.quiz_name_en')}}</th>
                                            <th>{{__('form.quiz_name_bn')}}</th>
                                            <th>{{__('form.noq')}}</th>
                                        @if($role==='Participant')
                                            <th>{{__('form.publish')}}</th>
                                        @else
                                            <th>{{__('form.publish')}}</th>
                                            <th>{{__('form.action')}}</th>
                                        @endif
                                        </tr>
                                </tfoot>
                            </table>
                            {{$quiz->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div> <!-- end card-body-->
{{--</div> <!-- end card-->--}}
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
