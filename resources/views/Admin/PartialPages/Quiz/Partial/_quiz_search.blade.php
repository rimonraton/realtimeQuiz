@php $lang = App::getLocale(); @endphp
{{--@if($role ==='Quiz Master')--}}
{{--    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table  class="table table-striped table-bordered">--}}
{{--                        <thead>--}}
{{--                        <tr role="row" class="text-center">--}}
{{--                            <th style="width: 10%;">{{__('form.sl')}}</th>--}}
{{--                            <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>--}}
{{--                            <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>--}}
{{--                            <th style="width: 15%;">{{__('form.noq')}}</th>--}}
{{--                            <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                            <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                            @if($role ==='Participant')--}}
{{--                                <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                            @else--}}
{{--                                <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                                <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                            @endif--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($quiz as $qs)--}}
{{--                            <tr class="text-center">--}}
{{--                                <td>{{$lang=='bd'?$bang->bn_number($loop->iteration):$loop->iteration}}</td>--}}
{{--                                <td>@if($qs->quiz_name){{$qs->quiz_name}}@endif </td>--}}

{{--                                <td>@if($qs->bd_quiz_name){{$qs->bd_quiz_name}} @endif</td>--}}
{{--                                <td> <span class="badge badge-info">{{$lang=='bd'?$bang->bn_number(count(explode(",", $qs->questions))):count(explode(",", $qs->questions))}} {{__('form.qus')}}</span></td>--}}
{{--                                <td>--}}
{{--                                    @if(Permission::can('quizPublished'))--}}
{{--                                        <div class="bt-switch">--}}
{{--                                            <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <div class="bt-switch">--}}
{{--                                            <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    @if(Permission::can('quizPublished'))--}}
{{--                                    <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                    @else--}}
{{--                                        <a class="disabled"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                    @endif--}}
{{--                                    @if(Permission::can('quizPublished'))--}}
{{--                                        <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>--}}
{{--                                    @else--}}
{{--                                        <a class="disabled"><i class="fas fa-trash"></i></a>--}}
{{--                                    @endif--}}

{{--                                </td>--}}
{{--                                @if($role==='Participant')--}}
{{--                                    <td>--}}
{{--                                        <span class="badge badge-info">{{$qs->status ==1?__('form.yes'):__('form.no')}}</span></td>--}}
{{--                                @else--}}
{{--                                    <td>--}}
{{--                                        @can('readOrwrite',$qs)--}}
{{--                                            <div class="bt-switch">--}}
{{--                                                <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                            <div class="bt-switch">--}}
{{--                                                <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />--}}
{{--                                            </div>--}}
{{--                                        @endcan--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @can('viewQuestion',\App\Quiz::class)--}}
{{--                                            <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->quiz_name}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a>--}}
{{--                                        @endcan--}}
{{--                                        @can('update',$qs)--}}
{{--                                            <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                        @endcan--}}
{{--                                        @can('readOrwrite',$qs)--}}
{{--                                            <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>--}}
{{--                                        @else--}}
{{--                                            <a class="disabled"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                            <a class="disabled"><i class="fas fa-trash"></i></a>--}}
{{--                                        @endcan--}}
{{--                                    </td>--}}
{{--                                @endif--}}


{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>{{__('form.sl')}}</th>--}}
{{--                            <th>{{__('form.quiz_name_en')}}</th>--}}
{{--                            <th>{{__('form.quiz_name_bn')}}</th>--}}
{{--                            <th>{{__('form.noq')}}</th>--}}
{{--                            <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                            <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                            @if($role==='Participant')--}}
{{--                                <th>{{__('form.publish')}}</th>--}}
{{--                            @else--}}
{{--                                <th>{{__('form.publish')}}</th>--}}
{{--                                <th>{{__('form.action')}}</th>--}}
{{--                            @endif--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}
{{--                    </table>--}}
{{--                    {{$quiz->links()}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--@else--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <div class="" style="overflow-x: hidden">--}}
{{--                <div class="dataTables_wrapper container-fluid dt-bootstrap4">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-12 pt-3">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table id="zero_config" class="table table-striped table-bordered ">--}}
{{--                                    <thead>--}}
{{--                                    <tr role="row" class="text-center">--}}
{{--                                        <th style="width: 5%;">{{__('form.sl')}}</th>--}}
{{--                                        <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>--}}
{{--                                        <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>--}}
{{--                                        <th style="width: 10%;">{{__('form.noq')}}</th>--}}
{{--                                        <th style="width: 10%;">--}}
{{--                                            {{__('form.option_delay')}}--}}
{{--                                            <br>--}}
{{--                                            <div class="help-tip">--}}
{{--                                                <p style="z-index: 999999; position: relative;">--}}
{{--                                                    {{__('form.info_message')}}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </th>--}}
{{--                                        @if($role ==='Participant')--}}
{{--                                            <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                                        @else--}}
{{--                                            <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                                            <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                                        @endif--}}
{{--                                        <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                                        <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($quiz as $qs)--}}
{{--                                        <tr class="text-center">--}}
{{--                                            <td>{{$lang=='bd'?$bang->bn_number($loop->iteration):$loop->iteration}}</td>--}}
{{--                                            <td>@if($qs->quiz_name){{$qs->quiz_name}}@endif </td>--}}

{{--                                            <td>@if($qs->bd_quiz_name){{$qs->bd_quiz_name}} @endif</td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-info">--}}
{{--                                                    {{$lang=='bd'?$bang->bn_number(count(explode(",", $qs->questions))):count(explode(",", $qs->questions))}} {{__('form.qus')}}--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <p contentEditable="true" class="badge badge-danger editor" id="qtime_{{$qs->id}}" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="{{__('form.tooltip_msg')}}">--}}
{{--                                                    {{$qs->quiz_time}}--}}
{{--                                                </p>--}}
{{--                                                <div class="bt-switch">--}}
{{--                                                    <input type="checkbox" class="quizTime" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->quiz_time > 0 ? "checked" : ""}} />--}}
{{--                                                </div>--}}
{{--                                                <span class="btn_update badge d-none" data-id="{{$qs->id}}" style="cursor: pointer">Update</span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @if(Permission::can('quizPublished'))--}}
{{--                                                    <div class="bt-switch">--}}
{{--                                                        <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />--}}
{{--                                                    </div>--}}
{{--                                                @else--}}
{{--                                                    <div class="bt-switch">--}}
{{--                                                        <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @if(Permission::can('quizPublished'))--}}
{{--                                                    <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                                @else--}}
{{--                                                    <a class="disabled"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                                @endif--}}
{{--                                                @if(Permission::can('quizPublished'))--}}
{{--                                                    <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>--}}
{{--                                                @else--}}
{{--                                                    <a class="disabled"><i class="fas fa-trash"></i></a>--}}
{{--                                                @endif--}}

{{--                                            </td>--}}
{{--                                            @if($role==='Participant')--}}
{{--                                                <td>--}}
{{--                                                    <span class="badge badge-info">{{$qs->status ==1?__('form.yes'):__('form.no')}}</span></td>--}}
{{--                                            @else--}}
{{--                                                <td>--}}
{{--                                                    @can('readOrwrite',$qs)--}}
{{--                                                        <div class="bt-switch">--}}
{{--                                                            <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />--}}
{{--                                                        </div>--}}
{{--                                                    @else--}}
{{--                                                        <div class="bt-switch">--}}
{{--                                                            <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />--}}
{{--                                                        </div>--}}
{{--                                                    @endcan--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    @can('viewQuestion',\App\Quiz::class)--}}
{{--                                                        <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->quiz_name}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a>--}}
{{--                                                        --}}{{----}}{{--                                                @endcan--}}
{{--                                                        --}}{{----}}{{--                                                @can('update',$qs)--}}
{{--                                                        <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                                    @endcan--}}
{{--                                                    @can('readOrwrite',$qs)--}}
{{--                                                        <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>--}}
{{--                                                    @else--}}
{{--                                                        <a class="disabled"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                                        <a class="disabled"><i class="fas fa-trash"></i></a>--}}
{{--                                                    @endcan--}}
{{--                                                </td>--}}
{{--                                            @endif--}}

{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                    <tfoot>--}}
{{--                                    <tr role="row" class="text-center">--}}
{{--                                        <th style="width: 5%;">{{__('form.sl')}}</th>--}}
{{--                                        <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>--}}
{{--                                        <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>--}}
{{--                                        <th style="width: 10%;">{{__('form.noq')}}</th>--}}
{{--                                        <th style="width: 10%;">{{__('form.option_delay')}}</th>--}}
{{--                                        @if($role ==='Participant')--}}
{{--                                            <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                                        @else--}}
{{--                                            <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                                            <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                                        @endif--}}
{{--                                        <th style="width: 15%;">{{__('form.publish')}}</th>--}}
{{--                                        <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                                    </tr>--}}

{{--                                    </tfoot>--}}
{{--                                </table>--}}


{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-8">--}}
{{--                                    {{$quiz->links()}}--}}
{{--                                </div>--}}
{{--                                --}}{{--                                            <div class="col-md-4" >--}}
{{--                                --}}{{--                                                <div class="text-center loading" style="display: block;">--}}
{{--                                --}}{{--                                                    <button class="btn btn-primary" type="button" disabled="">--}}
{{--                                --}}{{--                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>--}}
{{--                                --}}{{--                                                        {{__('form.loading')}}--}}
{{--                                --}}{{--                                                    </button>--}}
{{--                                --}}{{--                                                </div>--}}
{{--                                --}}{{--                                            </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div> <!-- end card-body-->--}}
{{--    </div> <!-- end card-->--}}
{{--@endif--}}
<div class="card">
    <div class="card-body">
        <div class="" style="overflow-x: hidden">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 pt-3">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered ">
                                <thead>
                                <tr role="row" class="text-center">
                                    <th style="width: 5%;">{{__('form.sl')}}</th>
                                    <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>
                                    <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>
                                    <th style="width: 10%;">{{__('form.noq')}}</th>
                                    <th style="width: 10%;">
                                        {{__('form.option_delay')}}
                                        <br>
                                        <div class="help-tip">
                                            <p style="z-index: 999999; position: relative;">
                                                {{__('form.info_message')}}
                                            </p>
                                        </div>
                                    </th>
                                    <th style="width: 15%;">{{__('form.publish')}}</th>
                                    <th style="width: 10%;">{{__('form.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quiz as $qs)
                                    <tr class="text-center">
                                        <td>{{$lang=='bd'?$bang->bn_number($loop->iteration):$loop->iteration}}</td>
                                        <td>@if($qs->quiz_name){{$qs->quiz_name}}@endif </td>

                                        <td>@if($qs->bd_quiz_name){{$qs->bd_quiz_name}} @endif</td>
                                        <td>
                                                <span class="badge badge-info">
                                                    {{$lang=='bd'?$bang->bn_number(count(explode(",", $qs->questions))):count(explode(",", $qs->questions))}} {{__('form.qus')}}
                                                </span>
                                        </td>
                                        <td>
                                            @if(Permission::can('quizTimeUpdate'))
                                            <div class="bt-switch">
                                                <input type="checkbox" class="quizTime" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->quiz_time > 0 ? "checked" : ""}} />
                                            </div>
                                            @else
                                                <div class="bt-switch">
                                                    <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />
                                                </div>
                                            @endif

                                        </td>
                                        <td>
                                            @if(Permission::can('quizPublished'))
                                                <div class="bt-switch">
                                                    <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />
                                                </div>
                                            @else
                                                <div class="bt-switch">
                                                    <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if(Permission::can('quiz.edit'))
                                                <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                            @else
                                                <a class="disabled"><i class="fas fa-pencil-alt"></i></a>
                                            @endif
                                            @if(Permission::can('quiz.delete'))
                                                <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                            @else
                                                <a class="disabled"><i class="fas fa-trash"></i></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr role="row" class="text-center">
                                    <th style="width: 5%;">{{__('form.sl')}}</th>
                                    <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>
                                    <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>
                                    <th style="width: 10%;">{{__('form.noq')}}</th>
                                    <th style="width: 10%;">{{__('form.option_delay')}}</th>
                                    <th style="width: 15%;">{{__('form.publish')}}</th>
                                    <th style="width: 10%;">{{__('form.action')}}</th>
                                </tr>

                                </tfoot>
                            </table>


                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                {{$quiz->links()}}
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
</script>
<style>
    .help-tip{
        /*position: absolute;*/
        /*top: 50%;*/
        /*left: 50%;*/
        /*transform: translate(-50%, -50%);*/
        margin: auto;
        text-align: center;
        border: 1px solid #444;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        /*line-height: 42px;*/
        cursor: default;
    }

    .help-tip:before{
        content:'i';
        font-family: sans-serif;
        font-weight: normal;
        color:#444;
    }

    .help-tip:hover p{
        display:block;
        transform-origin: 100% 0%;
        -webkit-animation: fadeIn 0.3s ease;
        animation: fadeIn 0.3s ease;
    }

    /* The tooltip */
    .help-tip p {
        display: none;
        font-family: sans-serif;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        text-align: center;
        background-color: #FFFFFF;
        padding: 12px 16px;
        width: 178px;
        height: auto;
        /*position: absolute;*/
        /*left: 50%;*/
        transform: translate(-50%, 5%);
        border-radius: 3px;
        /* 	border: 1px solid #E0E0E0; */
        box-shadow: 0 0px 20px 0 rgba(0,0,0,0.1);
        color: #37393D;
        font-size: 12px;
        line-height: 18px;
        z-index: 99;
    }

    .help-tip p a {
        color: #067df7;
        text-decoration: none;
    }

    .help-tip p a:hover {
        text-decoration: underline;
    }

    /* The pointer of the tooltip */
    .help-tip p:before {
        position: absolute;
        content: '';
        width: 0;
        height: 0;
        border: 10px solid transparent;
        border-bottom-color:#FFFFFF;
        top: -9px;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Prevents the tooltip from being hidden */
    .help-tip p:after {
        width: 10px;
        height: 40px;
        content:'';
        position: absolute;
        top: -40px;
        left: 0;
    }

    /* CSS animation */
    @-webkit-keyframes fadeIn {
        0% { opacity:0; }
        100% { opacity:100%; }
    }

    @keyframes fadeIn {
        0% { opacity:0; }
        100% { opacity:100%; }
    }
</style>
