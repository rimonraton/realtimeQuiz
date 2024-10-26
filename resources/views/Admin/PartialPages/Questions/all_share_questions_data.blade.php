@php $lang = App::getLocale(); @endphp
<div class="card">
    <div class="card-body">
        <div class="text-center verifyButton d-none" id="verifybtnDiv">
            <button class="p-1 border border-success rounded-lg bg-success text-white" id="verify">{{ $lang == 'gb' ? 'Verify' : 'যাচাই করুন' }}</button>
        </div>
                @if(count($questions) > 0)
                <div class="" style="overflow-x: hidden">
                    <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%;">
                                                    @if(Permission::can('verifyShareQuestionUpdate'))
                                                    <input type="checkbox" id="alloptionverify" name="allverify" class="material-inputs alloptionverify" >
                                                    <label for="alloptionverify"></label>
                                                    @else
                                                        <input type="checkbox" id="alloptionverify"  class="material-inputs"  disabled>
                                                        <label for="alloptionverify"></label>
                                                    @endif
                                                </th>
                                                <th style="width: 10%;">{{__('form.shareBy')}}</th>
                                                <th style="width: 6%;">{{__('form.file')}}</th>
                                                <th style="width: 30%;">{{__('form.question_en').'/'.__('form.question_bn')}}</th>
                                                <th style="width: 30%;">{{__('form.en_options') .'/'.__('form.bn_options')}}</th>
{{--                                                <th style="width: 10%;">{{__('form.bn_options')}}</th>--}}
                                                <th style="width: 20%;">{{__('form.file')}}</th>
                                                <th style="width: 3%;" class="text-center">{{__('form.action') .'/'.__('form.status')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $qs)
                                            <tr>
                                                <td>
{{--                                                    {{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}--}}
                                                    @if(Permission::can('verifyShareQuestionUpdate'))
                                                    <input type="checkbox" id="optionveri{{$qs->questions->id}}" class="material-inputs verifyelement" name="verified" data-shareId="{{$qs->id}}" value="{{$qs->questions->id}}">
                                                    <label for="optionveri{{$qs->questions->id}}"></label>
                                                    @else
                                                        <input type="checkbox" id="alloptionverify"  class="material-inputs"  disabled>
                                                        <label for="alloptionverify"></label>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$qs->shareFromUserData->name}}
                                                </td>
                                                <td class="text-center" id="fileavi_{{$qs->questions->id}}">
                                                    @if($qs->questions->fileType == 'image' || $qs->questions->fileType == 'video' || $qs->questions->fileType == 'audio')
                                                        @if($qs->questions->fileType == 'image')
                                                            <img src="{{asset($qs->questions->question_file_link)}}" alt="" width="150" height="100">
                                                        @elseif($qs->fileType == 'video')
                                                            <video width="150" height="100" controls>
                                                                <source src="{{asset($qs->questions->question_file_link)}}" type="video/mp4">
                                                                <source src="{{asset($qs->questions->question_file_link)}}" type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <audio controls style="width: 150px">
                                                                <source src="{{asset($qs->questions->question_file_link)}}" type="audio/ogg">
                                                                <source src="{{asset($qs->questions->question_file_link)}}" type="audio/mpeg">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        @endif
                                                    @else
                                                    <span>__</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($qs->questions->question_text)
                                                    <p id="eq_{{$qs->id}}" class="p-1 border border-success rounded-lg">{{$qs->questions->question_text}}</p>
                                                    @endif
                                                    @if($qs->questions->question_text && $qs->questions->bd_question_text)
                                                            <hr>
                                                    @endif
                                                    @if($qs->questions->bd_question_text)
                                                    <p id="bq_{{$qs->questions->id}}" class="p-1 border border-primary rounded-lg">{{$qs->questions->bd_question_text ? $qs->questions->bd_question_text : ''}}</p>
                                                    @endif
                                                </td>
                                                <td class="text-center" >
                                                    <span id="eo_{{$qs->questions->id}}">
                                                    @foreach($qs->questions->options as $qo)
                                                        @if($qo->option)
                                                            <span class="btn btn-sm m-1 rounded-lg" style="border: #5378e8 1px solid;">
                                                                @if($qo->correct)
                                                                <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>
                                                                @endif
                                                               {{$qo->option}}
                                                            </span>
                                                        @else
                                                            -
                                                        @endif
                                                    @endforeach
                                                        </span>
                                                        <hr>
                                                    <span id="bo_{{$qs->questions->id}}">
                                                        @foreach($qs->questions->options as $qo)
                                                            @if($qo->bd_option)
                                                                <span class="btn btn-sm m-1 rounded-lg" style="border: #5378e8 1px solid;" >
                                                                @if($qo->correct)
                                                                        <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>
                                                                    @endif
                                                                    {{$qo->bd_option}}
                                                            </span>

                                                            @else
                                                                -
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </td>
                                                <td id="optImg_{{$qs->questions->id}}">
                                                    @foreach($qs->questions->options as $qo)
                                                    @if($qo->flag == 'img')
                                                        <span class="btn btn-sm m-1 rounded-lg" style="border: #5378e8 1px solid;">
                                                            @if($qo->correct)
                                                            <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>
                                                            @endif
                                                           <img src="{{asset($qo->img_link)}}" alt="" width="30px">
                                                        </span>
                                                    @else
                                                    -
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
{{--                                                    <a class="view text-success" style="cursor: pointer; color:black;" data-id="{{$qs->id}}" title="view">--}}
{{--                                                        <i class="fas fa-eye"></i>--}}
{{--                                                    </a>--}}
                                                    @if(Permission::can('shareQuestion.edit'))
                                                    <a class="edit text-info" style="cursor: pointer; color:black;" data-id="{{$qs->questions->id}}" title="edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    @else
                                                        <span class="disabled"><i class="fas fa-pencil-alt"></i></span>
                                                    @endif
{{--                                                    @can('QuestionreadOrwrite',$qs)--}}
{{--                                                        <a class="edit" style="cursor: pointer; color:black;" data-id="{{$qs->id}}" title="edit"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                                        <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>--}}
{{--                                                    @else--}}
{{--                                                        <a class="disabled"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                                        <a class="disabled"><i class="fas fa-trash"></i></a>--}}
{{--                                                    @endcan--}}
                                                        <hr>
                                                    <span id="difficulty_{{$qs->questions->id}}">
                                                         @if($qs->questions->difficulty)
                                                            <span class="badge badge-pill {{$qs->questions->difficulty->id == 1 ? 'badge-secondary' :($qs->questions->difficulty->id == 2 ? 'badge-cyan' : 'badge-danger')}}">
                                                                {{$lang == 'gb' ? $qs->questions->difficulty->name : $qs->questions->difficulty->bn_name }}
                                                            </span>
                                                        @endif
                                                    </span>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    @if(Permission::can('verifyShareQuestionUpdate'))
                                                    <input type="checkbox" id="alloptionverify" name="allverify" class="material-inputs alloptionverify" >
                                                    <label for="alloptionverify"></label>
                                                    @else
                                                        <input type="checkbox" id="alloptionverify"  class="material-inputs"  disabled>
                                                        <label for="alloptionverify"></label>
                                                    @endif
                                                </th>
                                                <th>{{__('form.shareBy')}}</th>
                                                <th>{{__('form.file')}}</th>
                                                <th>{{__('form.question_en').'/'.__('form.question_bn')}}</th>
                                                <th>{{__('form.en_options').'/'.__('form.bn_options')}}</th>
{{--                                                <th>{{__('form.bn_options')}}</th>--}}
                                                <th>{{__('form.file')}}</th>
                                                <th>{{__('form.action') .'/'.__('form.status')}}</th>
                                            </tr>

                                        </tfoot>
                                    </table>


                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        {{$questions->links()}}
                                    </div>
{{--                                    <div class="col-md-4" >--}}
{{--                                        <div class="text-center loading" style="display: block;">--}}
{{--                                            <button class="btn btn-primary" type="button" disabled="">--}}
{{--                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>--}}
{{--                                                {{__('form.loading')}}--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
    </div> <!-- end card-body-->
        @else
            <div class="row justify-content-center">
                   No data found.
            </div>
        @endif
</div> <!-- end card-->
</div> <!-- end card-->
<script>
    var table;
    $('.dataTable').DataTable({
        responsive: true,
        "ordering": false,
    });
</script>
