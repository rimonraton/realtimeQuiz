@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Admin/assets/libs/daterangepicker/daterangepicker.css')}}">
    <style>
        .custom-select {
            display: inline-block;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem 1.75rem .375rem .75rem;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #54667a;
            vertical-align: middle;
            background: #fff url("{{asset('images/custom-select.png')}}") no-repeat right .75rem center/8px 5px;
            border: 1px solid #e9ecef;
            border-radius: 4px;
            appearance: none;
        }

        .custom-control {
            padding-left: 0 !important;
        }

        .myadmin-dd .dd-list .dd-item .dd-handle-new {
            background: #fff;
            border: 1px solid rgba(120, 130, 140, .13);
            padding: 8px 16px;
            height: auto;
            font-family: Montserrat, sans-serif;
            font-weight: 400;
            border-radius: 0;
        }

        .dd-handle-new {
            display: block;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px;
            cursor: pointer;
            /* color: #000; */
            text-decoration: none;
            font-weight: 700;
            border: 1px solid #e5e5e5;
            background: #fafafa;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .activeli {
            background-color: #e9ecef !important;
        }
        .selectedQuestionCount {
            background: rgba(0,0,0,0.2);
            position: fixed;
            width: 280px;
            height: 32px;
            bottom: 15px;
            right: 15px;
            z-index: 999;
            border: 1px solid darkgray;
            border-radius: 15px;
            padding: 5px 10px;
            color: black;
        }
        .bg-beige{
            background: beige;
        }
        .iconPostion{
            position: absolute;
            right: 24px;
            top: 11px;
            cursor: pointer;
        }
        .help-tippo{
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

        .help-tippo:before{
            content:'i';
            font-family: sans-serif;
            font-weight: normal;
            color:#444;
        }

        .help-tippo:hover p{
            display:block;
            transform-origin: 100% 0%;
            -webkit-animation: fadeIn 0.3s ease;
            animation: fadeIn 0.3s ease;
        }

        /* The tooltip */
        .help-tippo p {
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

        .help-tippo p a {
            color: #067df7;
            text-decoration: none;
        }

        .help-tippo p a:hover {
            text-decoration: underline;
        }

        /* The pointer of the tooltip */
        .help-tippo p:before {
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
        .help-tippo p:after {
            width: 10px;
            height: 40px;
            content:'';
            position: absolute;
            top: -40px;
            left: 0;
        }
    </style>
@endsection
@section('content')
    <div class="selectedQuestionCount text-center d-none" id="selectedQuestionCountDiv">
        {{__('form.selected_question')}} <span style="color: blue" id="count"></span>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">{{__('exam.create_exam')}}</h4>
                    <hr>
                    <form class="form-horizontal r-separator" action="{{url('save-examination')}}" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="cid" id="selectedCid" required>
                        <input type="hidden" value="0" name="negetive_mark" id="negetive_mark">
                        <input type="hidden" value="qb" name="quizCreateType" class="custom-control-input">
                        <input type="hidden" value="" name="advanceValue" id="advanceV">
{{--                        <div class="form-group row justify-content-center">--}}
{{--                            <div class="btn-group" data-toggle="buttons">--}}

{{--                                @can('readOwrite',\App\Quiz::class)--}}
{{--                                    <label class="btn btn-primary active">--}}
{{--                                        <div class="custom-control custom-radio">--}}
{{--                                            <input type="radio" id="qb" value="qb" name="quizCreateType" class="custom-control-input" checked="">--}}
{{--                                            <label class="custom-control-label" for="qb">{{__('form.from_qb')}}</label>--}}
{{--                                        </div>--}}
{{--                                    </label>--}}
{{--                                    <label class="btn btn-primary">--}}
{{--                                        <div class="custom-control custom-radio">--}}
{{--                                            <input type="radio" id="cq" value="cq" name="quizCreateType" class="custom-control-input">--}}
{{--                                            <label class="custom-control-label" for="cq">{{__('form.custom_q')}}</label>--}}
{{--                                        </div>--}}
{{--                                    </label>--}}
{{--                                @else--}}
{{--                                    <input type="hidden" value="qb" name="quizCreateType" class="custom-control-input">--}}
{{--                                @endcan--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="quizName" class="col-sm-3 text-right control-label col-form-label">{{__('exam.exam_name_english')}} : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="quizName" placeholder="{{__('exam.exam_en_placholder')}}" name="quizName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quizName" class="col-sm-3 text-right control-label col-form-label">{{__('exam.exam_name_bangla')}} :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bdquizName" placeholder="{{__('exam.exam_bn_placholder')}}" name="bdquizName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('exam.exam_type')}}<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                                <div class="col-sm-4">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <label class="container form-control">
                                            <input type="radio" name="mode" value="et" id="et" checked>
                                            {{__('exam.normal')}}
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container form-control ml-3">
                                            <input type="radio" name="mode" value="qt" id="qt">
                                            {{__('exam.set_of_q')}}
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <!-- <label for="category" class="col-sm-2 text-right control-label col-form-label">Game Type<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label> -->
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" placeholder="{{__('exam.exam_time_placeholder')}}" name="time" id="exam_time">
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control" name="timeUnit" id="time_unit">
                                        <option value="s">{{__('exam.second')}}</option>
                                        <option value="m">{{__('exam.minute')}}</option>
                                        <option value="h">{{__('exam.hour')}}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row d-none" id="optLay">
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('exam.option_layout')}}
                                    <span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-center align-items-center-center px-4">
                                        <label class="container form-control">
                                            <input type="radio" name="op_layout" value="0" checked id="togetherLayout">
                                            {{__('exam.together')}}
                                            <span class="checkmark"></span>
                                            <img src="{{asset('img/layout/together.gif')}}" alt="" width="20px">
                                        </label>
                                        <label class="container form-control">
                                            <input type="radio" name="op_layout" value="3" id="onebyoneLayout">
                                            {{__('exam.one_by_one')}}
                                            <span class="checkmark"></span>
                                            <img src="{{asset('img/layout/onebyone.gif')}}" alt="" width="20px">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('exam.number_negative')}} :</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" placeholder="{{__('exam.each_question_number_placeholder')}}" name="each_q_number" min="0" step="0.01" id="each_q_number"/>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" id="select_negetive_mark" disabled="disabled">
                                        <option value="0">{{__('exam.noNegativeMark')}}</option>
                                        <option value="20">{{__('exam.20_p')}}</option>
                                        <option value="25">{{__('exam.25_p')}}</option>
                                        <option value="50">{{__('exam.50_p')}}</option>
                                        <option value="100">{{__('exam.100_p')}}</option>
                                        <option value="custom">{{__('exam.custom')}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 d-none" id="parent_custom_negative_number">
                                    <input type="number" class="form-control" placeholder="{{__('exam.negative_mark_percent_placeholder')}}" id="custom_negative_number"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('exam.exam_date_time')}} <span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                                <div class="col-sm-4">
                                    <input name="schedule" type='text' class="form-control timeseconds" id="timeseconds" placeholder="{{__('exam.placeholder_exam_date_time')}}"/>
                                    <span class="ti-calendar iconPostion" id="iconDatepicker"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}}
{{--                                    <span class="text-danger" style="font-size: 1.5rem;">*</span> --}}
                                    :</label>
                                <div class="col-sm-5">
                                    <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                                        <ol class="dd-list">
                                            <li class="dd-item" id="parentdd">
                                                <div class="dd-handle-new">
                                                    <strong class="selectedTopic">{{__('form.select_topic')}}</strong>
                                                </div>
                                                <ol class="dd-list">
                                                    @foreach($question_topic as $c)
                                                        <li class="dd-item">
                                                            <div class="dd-handle-new topicls" data-cid="{{$c->id}}"> {{$lang=='gb'?$c->name:$c->bn_name}} </div>
                                                            @if(count($c->childs))
                                                                @include('Admin.PartialPages.Questions._subtopic', ['category'=>$c->childs])
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                @can('QM',\App\Question::class)
                                    <div class="col-sm-3 mt-1">
                                        <input type="number" class="form-control"  placeholder="{{__('form.no_of_questions')}}" name="NOQ" id="noq" disabled="true">
                                        <div class="d-flex pointer p-2">
                                            <div class="help-tippo">
                                                <p style="z-index: 999999; position: relative;">
                                                    {{$lang == 'gb' ? 'That number of questions will be selected from your selected subject' : 'আপনার নির্বাচন করা বিষয় থেকে উক্ত সংখ্যক প্রশ্ন নির্বাচিত হবে'}}
                                                </p>
                                            </div>
                                            <div id="clear_noq" class="d-none">
                                                <span class="p-1 border border-danger rounded-lg text-danger" style="cursor: pointer">Clear</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 mt-1 pt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-25" style="cursor: pointer" id="advance_question" data-toggle="tooltip" data-placement="top" title="{{__('exam.advance_tooltip')}}">
                                            <path fill="#AB7C94" d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/>
                                        </svg>
                                    </div>
                                @endcan
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="row col-sm-6 justify-content-center" id="selectedAdvanceData">
                                </div>
                            </div>

                            <input type="hidden" name="selected" id="selectedQ">
                            <input type="hidden" name="selectedindex" id="selectedindex" value="0">
                            <div id="viewData" class="justify-content-center" style="display: none">

                            </div>
                            <div id="CustomQ" style="display: none;">
                                <div class="form-group row">
                                    <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.question_en')}} : </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control questiontxt" id="question" placeholder="{{__('form.question_placeholder')}}" name="question[]"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.question_bn')}} :</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" placeholder="{{__('form.question_placeholder')}}" name="bdquestion[]"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="option1" class="col-sm-3 text-right control-label col-form-label">{{__('form.option')}} :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control inpoption" id="option" name="option0[]" placeholder="{{__('form.option_en_placholder')}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control inpoption" name="bdoption0[]" placeholder="{{__('form.option_bn_placholder')}}">
                                    </div>
                                    <div class="col-sm-1 bt-switch">
                                        <input type="hidden" name="answer0[]" class="hi" value="0">
                                        <input type="checkbox" class="chk" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="option1" class="col-sm-3 text-right control-label col-form-label"> {{__('form.option')}} :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control inpoption" id="option" name="option0[]" placeholder="{{__('form.option_en_placholder')}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control inpoption" name="bdoption0[]" placeholder="{{__('form.option_bn_placholder')}}">
                                    </div>
                                    <div class="col-sm-1 bt-switch">
                                        <input type="hidden" name="answer0[]" class="hi" value="0">
                                        <input type="checkbox" class="chk" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                                    </div>
                                </div>
                                <div id="createNew-show">

                                </div>

                                <div class="d-flex justify-content-center form-group">
                                    <!-- <div class="pr-3">
                                        <select class="form-control custom-select" id="NoOP-show">
                                            <option value="1">Select No. of Options Added</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div> -->
                                    <div class="pr-3">
                                        <label for="option1" class="control-label col-form-label">
                                            <a class="waves-effect waves-light createNew" data-option="option0[]" data-bdoption="bdoption0[]" data-answer="answer0[]" id="createNew" data-id="NoOP" href="">{{__('form.new_option')}}</a>
                                        </label>
                                    </div>
                                    <div>
                                        <label for="option1" class=" text-right control-label col-form-label">
                                            <input type="checkbox" class="filled-in chk-col-indigo material-inputs explenation" id="explenation">
                                            <label style="font-size: .9rem;" for="explenation">{{__('form.ans_explenation')}}</label>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row exl" style="display: none;" id="explenation-show">
                                    <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.explenation')}} :</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" placeholder="{{__('form.explenaton_placeholder')}}" name="explenation[]"></textarea>
                                    </div>
                                </div>
                                <div id="newQ">
                                </div>
                                <div class="form-group pt-4">
                                    <label for="option1" class="col-sm-12 text-center control-label col-form-label">
                                        <a class="waves-effect waves-light" id="createNewQ" href="">{{__('form.add_new_question')}}</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            @can('create',App\Quiz::class)
                                <button type="submit" class="btn btn-info waves-effect waves-light smt">{{__('exam.create_exam')}}</button>
                                <a class="btn btn-success waves-effect waves-light text-white" href="{{url('list-of-exam')}}">{{__('exam.goto_exam_list')}}</a>
                            @else
                                <a class="btn btn-secondary waves-effect waves-light disabled">{{__('exam.create_exam')}}</a>
                                <a class="btn btn-secondary waves-effect waves-light text-white disabled">{{__('exam.goto_exam_list')}}</a>
                            @endcan
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <div id="add-team" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('form.add_team_header')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{--                    <form class="form-horizontal form-material"  autocomplete="off">--}}
                    <div class="form-group row">
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" autocomplete="off" name="name" id="team_eng" placeholder="{{__('form.add_team_placholder')}}" >
                        </div>
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" autocomplete="off" name="bn_name" id="team_bng" placeholder="{{__('form.add_bn_team_placholder')}}" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect" id="smt_btn">{{__('form.save')}}</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                    </div>

                    {{--                    </form>--}}
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="add-advance-question" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('exam.advace_question_header')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="topic_view">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect" id="smt_advance_btn">{{__('exam.add')}}</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                    </div>

                    {{--                    </form>--}}
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('js')
    <script src="{{asset('Admin/assets/libs/moment/moment.js')}}"></script>
    <script src="{{asset('Admin/assets/libs/daterangepicker/daterangepicker.js')}}"></script>

    <script>
        $(function() {
            var lang ='{{$lang}}';
            var checkedTopics = [];
            var today = new Date()
            $('.timeseconds').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                timePickerIncrement: 1,
                timePicker24Hour: false,
                showDropdowns: true,
                autoUpdateInput: false,
                minDate:today,
                minYear: today.getFullYear(),
                maxYear: today.getFullYear() + 1,
                drops: 'auto',
                locale: {
                    format: 'YYYY-MM-DD h:mm A'
                }
            });
            $('.timeseconds').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY, h:mm A'));
            });

            $('.timeseconds').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $('#advance_question').on('click', function (e) {
                e.preventDefault()
                $('#add-advance-question').modal('show')
                $.ajax({
                    url:'{{url('all-topics-has-question')}}',
                    type: "GET",
                    beforeSend: function() {
                        console.log('Before Send');
                        $('#topic_view').html(`<div class="text-center">
                                              <div class="spinner-border text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                              </div>
                                            </div>`);
                    },
                    success: function(data) {
                        $('#topic_view').html(data);
                        console.log('first time..')
                        // $('#add-advance-question').modal('show')
                    },
                    complete: function() {
                        // console.log('Completed');
                        $.each(checkedTopics,function (key,value){
                            $('.chkparent').each(function(k, v) {
                                // console.log('value...', v.nextElementSibling.nextElementSibling)
                                if(value.id == v.value){
                                    $(this).prop('checked', true);
                                    // $('#noqOfQ_' + value.id).removeClass('d-none')
                                    // $('#noqOfQ_' + value.id).val(value.value)
                                }
                            });
                            $('.difficulty').each(function(k, v) {
                                console.log('value...', v.nextElementSibling.nextElementSibling)
                                if(value.propId == v.id){
                                    v.parentElement.parentElement.className = 'parent'
                                    v.nextElementSibling.nextElementSibling.className = 'advanceNoQ'
                                    $(this).prop('checked', true);
                                    v.nextElementSibling.nextElementSibling.value = value.value
                                    // $('#noqOfQ_' + value.id).removeClass('d-none')
                                    // $('#noqOfQ_' + value.id).val(value.value)
                                }
                            });
                        })
                    }
                })
            })
            var chkadvancequestions = [];
            $(document).on('click', '.aqchk', function () {
                const id = $(this).val()
                if ($(this).is(':checked')) {
                    let obj = {}
                    obj['id'] = $(this).val()
                    obj['name'] = $(this).attr('data-name')
                    obj['bn_name'] = $(this).attr('data-bnname')
                    obj['value'] = 0
                    chkadvancequestions.push(obj)
                    $('#noqOfQ_' + $(this).val()).removeClass('d-none')
                    $('#noqOfQ_' + $(this).val()).focus()
                } else {
                    console.log(chkadvancequestions, 'before objarray..')
                    $('#noqOfQ_' + $(this).val()).val('')
                    $('#noqOfQ_' + $(this).val()).addClass('d-none')
                    chkadvancequestions = chkadvancequestions.filter(function(elem){
                        return elem.id != id;
                    });
                    console.log(chkadvancequestions, 'after objarray..')
                }
            })
            $(document).on('keyup','.advanceNoq', function () {
                if ($(this).val() != ''){
                    changeDesc($(this).attr('data-id'), $(this).val())
                } else{
                    changeDesc($(this).attr('data-id'), 0)
                }
            })
            function changeDesc( id, value ) {
                for (var i in chkadvancequestions) {
                    if (chkadvancequestions[i].id == id) {
                        chkadvancequestions[i].value = value;
                        break; //Stop this loop, we found it!
                    }
                }
            }
            function changeValue( id, value ) {
                for (var i in checkedTopics) {
                    if (checkedTopics[i].propId == id) {
                        checkedTopics[i].value = value;
                        break; //Stop this loop, we found it!
                    }
                }
            }
            $(document).on('click', '.chkparent', function () {
                const id = $(this).attr('data-tid')
                if ($(this).is(':checked')){
                    $(this).siblings().siblings().removeClass('d-none')
                } else {
                    // console.log($(this).siblings().siblings('.parent input:checkbox'))
                    // $(this).siblings().siblings('.parent input:checkbox').prop('checked', false)
                    checkedTopics = checkedTopics.filter(function(elem){
                        return elem.id != id
                    });
                    // console.log('checkedQuestions... parent', checkedQuestions)
                    $(this).siblings().siblings('.parent').addClass('d-none')
                    $('#easy' + id).prop('checked', false).siblings().siblings('.advanceNoQ').val('').addClass('d-none')
                    $('#intermediate' + id).prop('checked', false).siblings().siblings('.advanceNoQ').val('').addClass('d-none')
                    $('#difficult' + id).prop('checked', false).siblings().siblings('.advanceNoQ').val('').addClass('d-none')
                }

            })
            $(document).on('click', '.difficulty', function () {
                const id = $(this).val()
                const difficulty = $(this).attr('data-difficulty')
                const difficultyValue = $(this).attr('data-difficultyValue')
                const propId = $(this).attr('id')
                if ($(this).is(':checked')){
                    let obj = {}
                    obj['id'] = $(this).val()
                    obj['name'] = $(this).attr('data-name')
                    obj['bn_name'] = $(this).attr('data-bnname')
                    obj['value'] = 0
                    obj['difficulty'] = difficulty
                    obj['difficulty_value'] = difficultyValue
                    obj['propId'] = propId
                    checkedTopics.push(obj)
                    $(this).siblings().siblings('.advanceNoQ').removeClass('d-none').focus()
                    // console.log('checkedQuestions...', checkedQuestions)
                }
                if (!$(this).is(':checked')){
                    console.log('id diff', id, difficulty)
                    checkedTopics = checkedTopics.filter(function(elem){
                        return elem.propId != propId
                    });
                    // console.log('unchecked checkedQuestions...', checkedQuestions)
                    $(this).siblings().siblings('.advanceNoQ').addClass('d-none')
                }
            })
            $(document).on('keyup','.advanceNoQ', function () {
                // alert($(this).val(), $(this).attr('max'))
                if ( parseInt($(this).val()) > $(this).attr('max')){
                    toastr.success(lang == 'gb' ? `There are ${$(this).attr('max')} questions in this category on the subject so you cannot enter more than ${$(this).attr('max')} questions`: `উক্ত বিষয়ে এই কেটেগরিতে ${q2bNumber($(this).attr('max'))} টি প্রশ্ন রয়েছে তাই সর্বোচ্চ  ${q2bNumber($(this).attr('max'))} টির বেশি প্রবেশ করতে পারবেন না`, {
                        "closeButton": true
                    });
                    $(this).val($(this).attr('max'))
                    // return
                }
                    if ($(this).val() != ''){
                        changeValue($(this).attr('data-id'), $(this).val())
                    } else{
                        changeValue($(this).attr('data-id'), 0)
                    }

                // console.log('value change', checkedQuestions)
            })
            $('#smt_advance_btn').on('click', function () {
                // chkquestions  = []
                checkedTopics = checkedTopics.filter(function(elem){
                    return elem.value != 0
                });
                    $('#advanceV').val(JSON.stringify(checkedTopics))
                $('#add-advance-question').modal('hide')

                if ( !$('#selectedQuestionCountDiv').hasClass('d-none')){
                    $('#selectedQuestionCountDiv').addClass('d-none')
                }
                var view = '';

                $.each(checkedTopics , function(index, val) {
                    let diff = '';
                    if (val.difficulty_value == 1) {
                        diff += `<span class='badge badge-secondary'>${val.difficulty}</span>`
                    }
                    else if(val.difficulty_value == 2) {
                        diff += `<span class='badge badge-info'>${val.difficulty}</span>`
                    }
                    else {
                        diff += `<span class='badge badge-danger'>${val.difficulty}</span>`
                    }
                    view += `<div class="p-2 m-1 border border-secondary rounded-lg">${val.name} - ${diff} - ${val.value}</div>`
                });
                view += `<div class="p-2 m-1 border border-danger text-danger rounded-lg" style="cursor: pointer" id="clear_advance_data">Clear</div>`
                $('#selectedAdvanceData').html(view)
                $('#viewData').removeClass('d-flex')
                $( "#noq" ).val( '');
                $('#clear_noq').addClass('d-none')
                $( "#noq" ).prop( "disabled", true );
            })

            // $('#smt_advance_btn').on('click', function () {
            //     // chkquestions  = []
            //     $('#advanceV').val(JSON.stringify(chkadvancequestions))
            //     $('#add-advance-question').modal('hide')
            //
            //     if ( !$('#selectedQuestionCountDiv').hasClass('d-none')){
            //         $('#selectedQuestionCountDiv').addClass('d-none')
            //     }
            //     var view = '';
            //     $.each(chkadvancequestions , function(index, val) {
            //         view += `<div class="p-2 m-1 border border-secondary rounded-lg">${val.name} - ${val.value}</div>`
            //     });
            //     view += `<div class="p-2 m-1 border border-danger text-danger rounded-lg" style="cursor: pointer" id="clear_advance_data">Clear</div>`
            //     $('#selectedAdvanceData').html(view)
            //     $('#viewData').removeClass('d-flex')
            //     $( "#noq" ).val( '');
            //     $('#clear_noq').addClass('d-none')
            //     $( "#noq" ).prop( "disabled", true );
            // })
            $(document).on('click', '#clear_advance_data', function () {
                checkedTopics = []
                $('#advanceV').val('')
                $( "#noq" ).prop( "disabled", false );
                $('#viewData').addClass('d-flex')
                $('#selectedAdvanceData').empty()
            })
            $(document).on('click' , '#iconDatepicker' , function(){
                // alert('hello click')
                $('.timeseconds').data('daterangepicker').show()
                // $('.timeseconds').trigger('show.daterangepicker');
            });
            $(document).on('click','.dlt',function (e){
                // e.preventDefault();
                Swal.fire({
                    title: '{{__('form.are_you_sure')}}',
                    text: "{{__('form.no_revert')}}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText:"{{__('form.cancel')}}",
                    confirmButtonText: '{{__('form.yes_delete_it')}}!'
                }).then((result) => {
                    if (result.value) {
                        var $this = $(this);
                        var id = $this.attr('data-id');
                        $.ajax({
                            url: "{{url('delete-team')}}/" + id,
                            type: "GET",
                            success: function(data) {
                                // $(this).parent().parent().remove();
                                // alert($this.parent().parent());
                                $('#team_' + id).remove();
                                Swal.fire({
                                    text: '{{__('form.delete_success')}}',
                                    type: 'success',
                                    timer: 1000,
                                    showConfirmButton: false
                                })
                            }
                        })

                    }
                })
            });

            var chkquestions = [];
            var arrayindex = [0]
            var QC;
            $(document).on('click','.chk',function (){
                var id = $(this).val();
                $('#noq').val('')
                // alert($('input:checkbox.chk:checked').length)
                if($('input:checkbox.chk:checked').length > 0) {
                    $( "#noq" ).prop( "disabled", true );
                } else{
                    $( "#noq" ).prop( "disabled", false );
                }
                // console.log($(this).parent(), 'this element')
                if ($(this).is(':checked')) {
                    chkquestions.push(id);
                    $(this).parent().addClass('bg-beige')
                } else {
                    chkquestions = chkquestions.filter(function(elem){
                        return elem != id;
                    });
                    $(this).parent().removeClass('bg-beige')
                }
                QC = chkquestions.length;
                if(QC > 0){
                    $('#selectedQuestionCountDiv').removeClass('d-none')
                } else {
                    $('#selectedQuestionCountDiv').addClass('d-none')
                }
                if (lang=='bd'){
                    QC = q2bNumber(chkquestions.length)
                }
                $('#count').html(QC);
                $('#selectedQ').val(chkquestions);
            })
            $('#noq').on('keyup', function () {
                // console.log('keyup value', !$(this).val())
                if (!$(this).val()){
                    //value null
                    $('#viewData').addClass('d-flex')
                    $('#clear_noq').addClass('d-none')
                } else {
                    //value not null
                    $('#viewData').removeClass('d-flex')
                    $('#clear_noq').removeClass('d-none')
                }
            })
            $('#clear_noq').on('click', function () {
                $('#noq').val('')
                $(this).addClass('d-none')
                $('#viewData').addClass('d-flex')
            })
            function addarrvalue(value){
                arrayindex.push(value);
                $('#selectedindex').val(arrayindex);
                // console.log(arrayindex);
            }
            function removearrvalue(value){
                arrayindex = arrayindex.filter(function(elem){
                    return elem != value;
                });
                $('#selectedindex').val(arrayindex);
                // console.log(arrayindex);
            }

            $(document).on('click',".checkAll", function() {
                if ($(this).is(':checked')){
                    $('.chk').each(function(k, v) {
                        if (v.value != 'on'){
                            chkquestions.push(v.value);
                        }
                    });
                }
                else{
                    chkquestions = [];
                }

                $('#count').html(chkquestions.length);
                $('#selectedQ').val(chkquestions);
                var child = $(this).attr('id');
                $("." + child).not(this).prop('checked', this.checked);
            });
            $('body').on('click', '#question_view_pagination .pagination a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url:url,
                    type: "GET",
                    beforeSend: function() {
                        console.log('Before Send');
                    },
                    success: function(data) {
                        $('#viewData').html(data);
                    },
                    complete: function() {
                        console.log('Completed');
                        $.each(chkquestions,function (key,value){
                            $('.chk').each(function(k, v) {
                                if(value == v.value){
                                    $(this).prop('checked', true);
                                }
                            });
                        })


                    }
                })
            });

            $(document).on('click', '#topic_pagination .pagination a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                // console.log(url, 'url....')
                $.ajax({
                    url:url,
                    type: "GET",
                    beforeSend: function() {
                        console.log('Before Send');
                        $('#topic_view').html(`<div class="text-center">
                          <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                        </div>
                        `);
                    },
                    success: function(data) {
                        $('#topic_view').html(data);
                    },
                    complete: function() {
                        // console.log('Completed');
                        // $.each(chkadvancequestions,function (key,value){
                        //     $('.aqchk').each(function(k, v) {
                        //         if(value.id == v.value){
                        //             $(this).prop('checked', true);
                        //             $('#noqOfQ_' + value.id).removeClass('d-none')
                        //             $('#noqOfQ_' + value.id).val(value.value)
                        //         }
                        //     });
                        // })
                        $.each(checkedTopics,function (key,value){
                            $('.chkparent').each(function(k, v) {
                                // console.log('value...', v.nextElementSibling.nextElementSibling)
                                if(value.id == v.value){
                                    $(this).prop('checked', true);
                                    // $('#noqOfQ_' + value.id).removeClass('d-none')
                                    // $('#noqOfQ_' + value.id).val(value.value)
                                }
                            });
                            $('.difficulty').each(function(k, v) {
                                console.log('value...', v.nextElementSibling.nextElementSibling)
                                if(value.propId == v.id){
                                    v.parentElement.parentElement.className = 'parent'
                                    v.nextElementSibling.nextElementSibling.className = 'advanceNoQ'
                                    $(this).prop('checked', true);
                                    v.nextElementSibling.nextElementSibling.value = value.value
                                    // $('#noqOfQ_' + value.id).removeClass('d-none')
                                    // $('#noqOfQ_' + value.id).val(value.value)
                                }
                            });
                        })

                    }
                })
            });

            function q2bNumber(numb) {
                let numbString = numb.toString();
                let bn = ''
                let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
                [...numbString].forEach(n => bn += eb[n])
                return bn
            }
            $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
            // var regx = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%\s]+$/;
            // $('.questiontxt').keyup(function() {
            //     if (regx.test(this.value)) {
            //         console.log('correct');
            //     } else {
            //         if (this.value == '') {
            //             Swal.fire({
            //                 type: 'error',
            //                 title: 'Oops...',
            //                 text: 'This is Required Field.',
            //             })
            //         } else {
            //             Swal.fire({
            //                 type: 'error',
            //                 title: 'Oops...',
            //                 text: 'Please Type in English.',
            //             })
            //         }

            //     }
            // });
            $('.smt').on('click', function(e) {
                // e.preventDefault();
                var cid = $('#selectedCid').val()
                const en_exam = $('#quizName').val()
                const bn_exam = $('#bdquizName').val()
                const bn_or_en = en_exam != '' ? true : (bn_exam != '' ? true : false)
                const exam_time = $('#exam_time').val()
                const selectedQ = $('#selectedQ').val()
                const advanceValue = $('#advanceV').val()
                const noq = $('#noq').val()
                const questionsValide = advanceValue != '' ? true : (selectedQ != '' ? true : (noq != '' ? true : false))
                const dateTime = $('#timeseconds').val()
                const topicOrAdvance = cid != '' ? true : ( advanceValue != '' ? true : false)

                // console.log('condition', cid, bn_or_en, exam_time, en_exam != '', bn_exam != '')
                // return

                // var paise = 0;
                // $('input[name="ans[]"]').each(function() {
                //     console.log($(this).val());
                //     if ($(this).val() == 1) {
                //         paise = 1;
                //     }
                // });
                console.log('topicOrAdvance', topicOrAdvance, advanceValue)
                if (topicOrAdvance && bn_or_en && exam_time != '' && questionsValide) {
                    $('#smtform').submit();
                } else {
                    let lang = '{{$lang}}'
                    let message = ''
                    if (!bn_or_en) {
                        message = lang == 'gb' ? 'English or Bangla exam name is required.' : 'ইংরেজি বা বাংলা পরীক্ষার নাম দিন'
                    }
                   else if (exam_time == '') {
                        message = lang == 'gb' ? 'Exam duration is required.' : 'পরীক্ষার সময়কাল দিন'
                    }
                    else if (dateTime == '') {
                        message = lang == 'gb' ? 'Please give the date and time when the exam will be held' : 'অনুগ্রহ করে পরীক্ষা অনুষ্ঠিত হওয়ার তারিখ ও সময় দিন '
                    }
                    else if(cid == ''){
                        message = lang == 'gb' ? 'Please select the Topic  or Select the topic and number of questions from Advanced' : 'বিষয় নির্বাচন করুন বা অ্যাডভান্সড থেকে বিষয়  এবং প্রশ্নের সংখ্যা নির্বাচন করুন'
                    }
                    else if (!questionsValide) {
                        message = lang == 'gb' ? 'Please check questions or type the number of question' : 'অনুগ্রহ করে প্রশ্ন চেক করুন বা প্রশ্নের সংখ্যা টাইপ করুন'
                    }
                    else {
                        message = lang == 'gb' ? 'Something went wrong!' : 'কিছু ভুল হয়েছে'
                    }
                    e.preventDefault();
                    Swal.fire({
                        type: 'error',
                        title: lang == 'gb' ? 'Oops...' : 'উফ...',
                        text: message,
                    })
                }
                // if (paise == 1) {
                //     if (cid != '') {
                //         $('#smtform').submit();
                //     } else {
                //         e.preventDefault();
                //         Swal.fire({
                //             type: 'error',
                //             title: 'Oops...',
                //             text: 'Please select the Topic.',
                //         })
                //     }
                // } else {
                //     e.preventDefault();
                //     Swal.fire({
                //         type: 'error',
                //         title: 'Oops...',
                //         text: 'Please select the answer.',
                //     })
                // }
            })
            $('#qb').on('change', function() {
                $('#FromQB').show();
                $('#CustomQ').hide();
                $('.artopic').attr('id', 'topic');
                $('.arcategory').attr('id', 'category');
            })
            $('#cq').on('change', function() {
                $('#FromQB').hide();
                $('#viewData').removeClass('d-flex');
                // $('#viewData').hide();
                $('#CustomQ').show();
                $('.artopic').removeAttr('id');
                $('.arcategory').removeAttr('id');
            })
            $(document).on('click', '.createNew', function(e) {
                e.preventDefault();
                // var mid = $(this).attr('data-id');
                // var NOP = $('#' + mid + '-show').val();
                var option = $(this).attr('data-option');
                var bdoption = $(this).attr('data-bdoption');
                var answer = $(this).attr('data-answer');
                // alert(name);
                var id = $(this).attr('id');
                var data = '';
                // for (i = 0; i < NOP; i++) {
                data += `<div class="form-group row">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label"><i class="ti-close remove" style="color:red;cursor:pointer;"></i> {{__('form.option')}} :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" name="${option}" placeholder="{{__('form.option_en_placholder')}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" name="${bdoption}" placeholder="{{__('form.option_bn_placholder')}}">
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="${answer}" class="hi" value="0">
                                <input type="checkbox" class="chk" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                            </div>
                        </div>`;
                // }

                $('#' + id + '-show').append(data);
                $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
            });

            $(document).on('click', '.remove', function() {
                $(this).closest('.row').remove();
            });
            $(document).on('click', '.removeQ', function() {
                $(this).closest('.NQ').remove();
                var index = $(this).data('index');
                removearrvalue(index);
                // console.log(index);
            });

            $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
                if (state == true) {
                    $(this).closest("div.bt-switch").find(".hi").val('1');
                } else {
                    // $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
                    $(this).closest("div.bt-switch").find(".hi").val('0');
                }
            });
            $(document).on('click', ".explenation", function() {
                var id = $(this).attr('id');
                if (this.checked) {
                    $('#' + id + '-show').show();
                } else {
                    $('#' + id + '-show').hide();
                }
            });
            var eid = 0;
            $('#createNewQ').on('click', function(e) {
                e.preventDefault();
                eid++;
                var data = '';
                data += `<div class="NQ">
                <hr>
                <h3 class="text-center pb-2">{{__('form.new_ques')}} <i class="ti-close removeQ" style="color:red;cursor:pointer;" data-index="${eid}"></i></h3>
                <div class="form-group row">
                    <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.question_en')}} :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control questiontxt" id="question" placeholder="{{__('form.question_placeholder')}}" name="question[]"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.question_bn')}} :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control"  placeholder="{{__('form.question_placeholder')}}" name="bdquestion[]"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="option1" class="col-sm-3 text-right control-label col-form-label">{{__('form.option')}} :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control inpoption" id="option" name="option${eid}[]" placeholder="{{__('form.option_en_placholder')}}" >
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control inpoption"  name="bdoption${eid}[]" placeholder="{{__('form.option_bn_placholder')}}" >
                    </div>
                    <div class="col-sm-1 bt-switch">
                        <input type="hidden" name="answer${eid}[]" class="hi" value="0">
                        <input type="checkbox" class="chk" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="option1" class="col-sm-3 text-right control-label col-form-label"> {{__('form.option')}} :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control inpoption" id="option" name="option${eid}[]" placeholder="{{__('form.option_en_placholder')}}" >
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control inpoption" id="option" name="bdoption${eid}[]" placeholder="{{__('form.option_bn_placholder')}}" >
                    </div>
                    <div class="col-sm-1 bt-switch">
                        <input type="hidden" name="answer${eid}[]" class="hi" value="0">
                        <input type="checkbox" class="chk" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                    </div>
                </div>
                <div id="createNew${eid}-show">

                </div>

                <div class="d-flex justify-content-center form-group">
                    <div class="pr-3">
                        <label for="option1" class="text-right control-label col-form-label">
                            <a class="waves-effect waves-light createNew" data-option="option${eid}[]" data-bdoption="bdoption${eid}[]" data-answer="answer${eid}[]" id="createNew${eid}" data-id="NoOP${eid}" href="">{{__('form.new_option')}}</a>
                        </label>
                    </div>
                    <div>
                        <label for="option1" class="text-right control-label col-form-label">
                            <input type="checkbox" class="filled-in chk-col-indigo material-inputs explenation" id="explenation${eid}">
                            <label style="font-size: .9rem;" for="explenation${eid}">{{__('form.ans_explenation')}}</label>
                        </label>

                    </div>
                </div>
                <div class="form-group row" style="display: none;" id="explenation${eid}-show">
                    <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.explenation')}} :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" placeholder="{{__('form.explenaton_placeholder')}}" name="explenation[]"></textarea>
                    </div>
                </div>
            </div>`;
                addarrvalue(eid);
                $('#newQ').append(data);
                $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();

            })

            $('.artopic').on('change', function() {
                var id = $(this).val();
                $.ajax({
                    url: "{{url('question/subtopic')}}/" + id,
                    type: "GET",
                    success: function(data) {
                        if (data != '') {
                            $('.subtopicDiv').show();
                            $("#showsubtopic").empty().append(data);
                        } else {
                            $('.subtopicDiv').hide();
                            $("#showsubtopic").html(`<option value="">Select Sub Topic</option>`);
                        }
                    }
                })

            })
            $(document).on('click', '.topicls', function() {

                // $(this).hasClass('activeli') ? $(this).removeClass('activeli') : [$('.topicls').removeClass('activeli'), $(this).addClass('activeli'), $('#selectedCid').val($(this).attr('data-cid')), $('#selectedTopic').html($(this).text())];
                $( "#noq" ).prop( "disabled", false );
                if ($(this).hasClass('activeli')) {
                    $(this).removeClass('activeli');
                    $('#selectedCid').val('');
                    $('.selectedTopic').html('Select Topic');
                } else {
                    $('#parentdd').addClass('dd-collapsed').children('[data-action="collapse"]').hide();
                    $('#parentdd').children('[data-action="expand"]').show();
                    $('.topicls').removeClass('activeli');
                    $(this).addClass('activeli');
                    $('#selectedCid').val($(this).attr('data-cid'));
                    $('.selectedTopic').html($(this).text());
                    var tid = $(this).attr('data-cid');
                    questions(tid);
                }

            })
            $(document).on('click','#addteam',function (){
                $('#add-team').modal('show');
            });

            $(document).on('click','#smt_btn',function (){
                $.ajax({
                    url:"{{url('save_team')}}",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'team_name':$('#team_eng').val(),
                        'team_name_bang':$('#team_bng').val(),

                    },
                    success:function(data){
                        $('#add-team').modal('hide');
                        var lan = "{{$lang}}";
                        var name = '';
                        console.log(lan);
                        if(lan == 'gb'){
                            if(data.name == null){
                                name = data.bn_name;
                            }
                            else{
                                name = data.name;
                            }

                        }
                        else{
                            if(data.bn_name == null){
                                name = data.name;
                            }
                            else{
                                name = data.bn_name;
                            }
                        }
                        $('#team_load').append(`<div class="checkbox checkbox-info m-1 badge badge-light-info col-md-3 col-sm-12" id="team_${data.id}">
                                                <input type="checkbox" name="teams[]" value="${data.id}" id="chce_${data.id}" class="material-inputs chk child">
                                                <label for="chce_${data.id}">${name}</label>
                                                <a type="button" class="text-danger text-right dlt" data-id="${data.id}" style="position:absolute;right: 5px;font-size: 20px;">×</a>
                                            </div>`)
                        console.log(data);
                    }
                })
            })

            $('#each_q_number').on('keyup', function () {
                // console.log('input value...', $(this).val())
                if ($(this).val()) {
                    $('#select_negetive_mark').removeAttr('disabled');
                } else {
                    $('#select_negetive_mark').attr('disabled', 'disabled');
                    // $('#parent_custom_negative_number').addClass('d-none')
                    console.log('hasclass...', $('#parent_custom_negative_number').hasClass('d-none'))
                    $('#select_negetive_mark').val(0)
                    if (!$('#parent_custom_negative_number').hasClass('d-none')){
                        $('#parent_custom_negative_number').addClass('d-none')
                        $('#custom_negative_number').val('')
                        $('#negetive_mark').val('')
                    }
                }
            })
            $('#custom_negative_number').on('keyup', function () {
                console.log('value', $(this).val())
                $('#negetive_mark').val($(this).val())
            })
            $('#select_negetive_mark').on('change', function () {
                if($(this).val() == 'custom'){
                    $('#parent_custom_negative_number').removeClass('d-none')
                } else {
                    $('#negetive_mark').val($(this).val())
                    $('#parent_custom_negative_number').addClass('d-none')
                    $('#custom_negative_number').val('')
                }

            })

            $('input[type=radio][name=practice]').change(function() {
                console.log($(this).val(), 'radio value..')
                if($(this).val() == 'qt') {
                    $('#optLay').removeClass('d-none')
                } else {
                    $("#togetherLayout").prop("checked", true);
                    $('#optLay').addClass('d-none')
                }
            });

            function questions(id) {
                $.ajax({
                    url: "{{url('quiz/list')}}/" + id,
                    type: "GET",
                    beforeSend: function() {
                        console.log('Before Send');
                    },
                    success: function(data) {
                        if ($("#cq").is(":checked")) {
                            $('#FromQB').hide();
                            $('#viewData').removeClass('d-flex');
                        } else {
                            $('#viewData').addClass('d-flex');
                            $('#viewData').html(data);
                        }

                        // console.log(data);
                    },
                    complete: function() {
                        console.log('Completed');
                    }
                })
            }
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            $('#nestable-menu').on('click', function(e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#nestable-menu').nestable();

            // $(document).on('click', ".checkAll", function() {
            //     alert('Hello');
            //     $(this).closest('div.lobilists').find("input[type=checkbox]").prop("checked", true);
            //     // $('input:checkbox').not(this).prop('checked', this.checked);
            //     // $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
            // });



        })
    </script>
    <script src="{{asset('Admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('Admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('Admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>
@endsection
