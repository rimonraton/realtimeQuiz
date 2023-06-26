@extends('Admin.Layout.dashboard')

@php
    $lang = App::getLocale();
    $ban = new \App\Lang\Bengali();
 @endphp
@section('css')
    <link rel="stylesheet" href="{{asset('Admin/assets/libs/daterangepicker/daterangepicker.css')}}">
    <style>
    .iconPostion{
    position: absolute;
    right: 24px;
    top: 11px;
    cursor: pointer;
    }
    </style>
@endsection
@section('content')
    <div class="row" id="examapp">
        <div class="col-12">
            @if(session()->has('message'))
                <p class="alert alert-success">{{ session('message') }}</p>
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"> {{__('exam.list_of_exam')}} </h4>
                    <hr>
                    <a href="{{url('create-exam')}}" class="btn btn-info btn-rounded m-t-10 mb-2 float-right">{{__('exam.create_exam')}}</a>
                    <!-- Add Contact Popup Model -->
{{--                    <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h4 class="modal-title" id="myModalLabel">{{__('form.add_menu_header')}}</h4>--}}
{{--                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body">--}}
{{--                                    <form class="form-horizontal form-material" method="POST" action="{{url('saveMenu')}}" autocomplete="off">--}}
{{--                                        @csrf--}}
{{--                                        <div class="form-group">--}}
{{--                                        <!-- <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.menu')}}</label> -->--}}
{{--                                            <div class="col-sm-12" id="options">--}}
{{--                                                <select class="form-control" name="parent_id" id="">--}}
{{--                                                    <option value="0">{{__('form.select_menu')}}</option>--}}
{{--                                                    @foreach($parent_menus as $menu)--}}
{{--                                                        <option value="{{$menu->id}}">{{$lang=='gb'?$menu->name:$menu->bn_name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <div class="col-12 m-b-20">--}}
{{--                                                <input type="text" class="form-control" name="menu" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.menu_placholder_en')}}" require>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <div class="col-12 m-b-20">--}}
{{--                                                <input type="text" class="form-control" name="bn_menu" placeholder="{{__('form.menu_placholder_bn')}}" require>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <div class="col-12 m-b-20">--}}
{{--                                                <input type="text" class="form-control" name="route_name" placeholder="{{__('form.route_name')}}" require>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="submit" class="btn btn-info waves-effect">{{__('form.save')}}</button>--}}
{{--                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <!-- /.modal-content -->--}}
{{--                        </div>--}}
{{--                        <!-- /.modal-dialog -->--}}
{{--                    </div>--}}
                    <div class="table-responsive" style="overflow-x: hidden">

                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr role="row">
                                            <th style="width: 0px;">{{__('exam.sl')}}</th>
                                            <th style="width: 0px;">{{__('exam.exam_name_english')}}</th>
                                            <th style="width: 0px;">{{__('exam.exam_name_bangla')}}</th>
                                            <th style="width: 0px;">{{__('exam.E_T_NMark')}}</th>
                                            <th style="width: 0px;">{{__('exam.exam_type')}}</th>
                                            <th style="width: 0px;">{{__('exam.exam_time')}}</th>
                                            <th style="width: 5%;">{{__('exam.status')}}</th>
                                            <th style="width: 0px;">{{__('form.action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                              function convert_seconds($seconds_value)
                                             {
                                                  $bengali = new \App\Lang\Bengali();
                                                 $hasHours = '';
                                                 $hasMinutes = '';
                                                 $hasSeconds = '';
                                                $hours = $seconds_value > 3600 ? round($seconds_value/3600) : 0;
                                               $minutes = round($seconds_value/60);
                                               $seconds = round($seconds_value % 60);

                                                if( App::getLocale() == 'gb') {
                                                    // return hours + this.hourOrHours(hours) + ' ' + minutes + this.minuteOrMinutes(minutes) + ' ' + seconds + this.secondOrSeconds(seconds)
                                                    if($hours > 0) {
                                                       return $hasHours = $hours .' hours';
                                                    }
                                                    if ($minutes > 0) {
                                                        return $hasMinutes = $minutes . ' minutes';
                                                    }
                                                    if ($seconds > 0) {
                                                        return $hasSeconds = $seconds . 'seconds';
                                                    }
                                                    return $hasHours . ' ' . $hasMinutes .' '. $hasSeconds;
                                                } else {
                                                    if($hours > 0) {
                                                        $hasHours = $bengali->bn_number($hours) . ' ঘণ্টা';
                                                    }
                                                    if ($minutes > 0) {
                                                        $hasMinutes = $bengali->bn_number($minutes) . ' মিনিট';
                                                    }
                                                    if ($seconds > 0) {
                                                        $hasSeconds = $bengali->bn_number($seconds) . ' সেকেন্ড';
                                                    }
                                                   return $hasHours . ' ' . $hasMinutes . ' ' . $hasSeconds;
                                                }
                                              }
                                              function each_question_mark($value){
                                                $bengali = new \App\Lang\Bengali();
                                                if (App::getLocale() == 'gb'){
                                                    return $value;
                                                } else {
                                                   return $bengali->bn_number($value);
                                                }
                                              }
                                        @endphp
                                        @foreach($exam_data as $exam)
                                            <tr>
                                                <td>{{$lang=='gb' ? $loop->iteration : $bang->bn_number($loop->iteration)}}</td>
                                                <th>{{$exam->exam_en ? $exam->exam_en : '______' }}</th>
                                                <th>{{$exam->exam_bn ? $exam->exam_bn : '______'}}</th>
                                                <th class="text-center">
                                                    <span class="badge badge-info"> {{__('exam.each_question_number')}}:  {{ each_question_mark($exam->each_question_mark) }}</span>
                                                    <span class="badge badge-cyan"> {{__('exam.total_number')}}:  {{ each_question_mark(count(explode(",",$exam->questions)) * $exam->each_question_mark) }}</span>
                                                    <span class="badge badge-dark-danger"> {{__('exam.negative_number')}}:  {{ each_question_mark(($exam->each_question_mark * $exam->negative_mark)/100) }}</span>
                                                    <a class="mark_edit" href="" data-id="{{$exam->id}}" data-each_question_mark="{{$exam->each_question_mark}}" data-nagetive_mark="{{$exam->negative_mark}}" title="{{__('exam.numberEdit')}}">
                                                        <i class="fas fa-pencil-alt text-warning"></i>
                                                    </a>
                                                </th>
                                                <th class="text-center">
                                                    <span class="badge {{$exam->exam_time ? 'badge-info' : ($exam->question_time ? 'badge-primary' : 'badge-danger')}}">
                                                        {{$exam->exam_time ? __('exam.normal') : ($exam->question_time ? __('exam.set_of_q') : 'No mode')}}
                                                    </span>
                                                    <span class="badge badge-success">
                                                        {{ convert_seconds($exam->exam_time ? $exam->exam_time : ($exam->question_time ? $exam->question_time : 0)) }}
                                                    </span>

                                                    <a class="mode_edit" href="" data-id="{{$exam->id}}" data-qt="{{$exam->question_time}}" data-et="{{$exam->exam_time}}" data-timeUnit="{{$exam->time_unit}}" data-layout="{{$exam->option_view_time}}" title="{{__('exam.modeEdit')}}">
                                                        <i class="fas fa-pencil-alt text-warning"></i>
                                                    </a>
                                                    @if($exam->question_time)
                                                        <br>
                                                        @if($exam->option_view_time > 0)
                                                            <span>
                                                                <img src="{{asset('img/layout/onebyone.gif')}}" alt="" width="20px">
                                                            </span>
                                                        @else
                                                            <span>
                                                                <img src="{{asset('img/layout/together.gif')}}" alt="" width="20px">
                                                            </span>
                                                        @endif
                                                    @endif
                                                </th>
                                                <th>
                                                    {{ $lang == 'gb' ? \Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A') : $ban->bn_date_time(\Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A'))}}
                                                    <a class="schedule_edit" href="" data-id="{{$exam->id}}" data-schedule="{{$exam->schedule}}" data-scheduleValue="{{ $lang == 'gb' ? \Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A') : $ban->bn_date_time(\Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A'))}}" title="{{__('exam.modeEdit')}}">
                                                        <i class="fas fa-pencil-alt text-warning"></i>
                                                    </a>
                                                </th>
                                                <th>
                                                    <div class="bt-switch">
                                                        <input type="checkbox" class="chk" data-id="{{$exam->id}}" data-on-text="{{__('exam.published')}}" data-off-text="{{__('exam.not_published')}}" data-size="normal"  {{$exam->is_published ==1?"checked":""}} />
                                                    </div>
                                                </th>
                                                <th>
                                                    <a class="edit" href="" data-id="{{$exam->id}}" data-quizName="{{$exam->exam_en}}" data-bnQuizName="{{$exam->exam_bn}}" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="delete text-danger" style="cursor: pointer;" data-id="{{$exam->id}}" title="Remove">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    @if(count($exam->existUser))
                                                    <a data-name="{{$lang == 'gb'?($exam->exam_en?$exam->exam_en:$exam->exam_bn):($exam->exam_bn?$exam->exam_bn:$exam->exam_en)}}" data-reasons="{{$exam->existUser}}" class="btn btn-sm rounded-lg btn-outline-success align-self-center viewReason" id="viewRes_{{$exam->id}}" data-toggle="tooltip" data-placement="top" title="Request for unlock">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @endif
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">{{__('exam.sl')}}</th>
                                            <th rowspan="1" colspan="1">{{__('exam.exam_name_english')}}</th>
                                            <th rowspan="1" colspan="1">{{__('exam.exam_name_bangla')}}</th>
                                            <th rowspan="1">{{__('exam.E_T_NMark')}}</th>
                                            <th rowspan="1">{{__('exam.exam_type')}}</th>
                                            <th rowspan="1">{{__('exam.exam_time')}}</th>
                                            <th rowspan="1">{{__('exam.status')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
{{--                                {{$menus->links()}}--}}
                                <!-- <div class="text-center">
                                    <p>
                                        No Data Found..
                                    </p>
                                </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    {{$exam_data->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('Update')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('exam-name-update')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="uid" name="id">
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" id="editName" name="uquizName" placeholder="{{__('Enter quiz name in english')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" id="editbanglaName" name="ubnquizName" placeholder="{{__('Enter quiz name in bangla')}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="edit-mode" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('exam.update_exam_type')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('mode-update')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="muid" name="id">
                        <h4 class="text-center">{{__('exam.change_exam_type')}}</h4>
                        <div class="d-flex justify-content-center">
                                <label class="container">
                                    <input type="radio" name="mode" value="et" id="et" checked>
                                    {{__('exam.normal')}}
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">
                                    <input type="radio" name="mode" value="qt" id="qt">
                                    {{__('exam.set_of_q')}}
                                    <span class="checkmark"></span>
                                </label>
                        </div>
                        <hr>
                        <div class="d-none" id="optLayout">
                            <h5 class="text-center">{{__('exam.option_layout')}}</h5>
                            <div class="d-flex justify-content-center align-items-center-center px-4">
                                <label class="container">
                                    <input type="radio" name="op_layout" value="0" checked id="togetherLayout">
                                    {{__('exam.together')}}
                                    <span class="checkmark"></span>
                                    <img src="{{asset('img/layout/together.gif')}}" alt="" width="20px">
                                </label>
                                <label class="container">
                                    <input type="radio" name="op_layout" value="3" id="onebyoneLayout">
                                    {{__('exam.one_by_one')}}
                                    <span class="checkmark"></span>
                                    <img src="{{asset('img/layout/onebyone.gif')}}" alt="" width="20px">
                                </label>
                            </div>
                        </div>
                        <hr>
{{--                        <div class="form-group">--}}
{{--                            <div class="col-md-12 m-b-20">--}}
{{--                                <input type="text" class="form-control" id="editName" name="menu" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.menu_placholder_en')}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group row justify-content-center">
                            <div class="col-md-4 m-b-20">
                                <input type="number" class="form-control" id="inp_time" name="time" placeholder="{{__('Enter Time')}}">
                            </div>
                            <div class="col-md-4 m-b-20">
                                <select class="form-control" name="timeUnit" id="time_unit">
                                    <option value="s">{{__('exam.second')}}</option>
                                    <option value="m">{{__('exam.minute')}}</option>
                                    <option value="h">{{__('exam.hour')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="edit-mark" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('exam.edit_header')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('mark-update')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="markuid" name="id">
                        <input type="hidden" id="negativemarkvalue" name="negativemarkvalue">
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 text-right control-label col-form-label">{{__('exam.each_question_mark')}} :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" placeholder="{{__('exam.each_question_number_placeholder')}}" name="each_q_number" min="0" step="0.01" id="mark_each_q_number"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 text-right control-label col-form-label">{{__('exam.negative_mark')}} :</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="mark_select_negetive_mark">
                                    <option value="0">{{__('exam.noNegativeMark')}}</option>
                                    <option value="20">{{__('exam.20_p')}}</option>
                                    <option value="25">{{__('exam.25_p')}}</option>
                                    <option value="50">{{__('exam.50_p')}}</option>
                                    <option value="100">{{__('exam.100_p')}}</option>
                                    <option value="custom">{{__('exam.custom')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="mark_parent_custom_negative_number">
                            <label for="category" class="col-sm-4 text-right control-label col-form-label">{{__('exam.custom')}} :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" placeholder="{{__('exam.negative_mark_percent_placeholder')}}" id="mark_custom_negative_number"/>
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="col-md-12 m-b-20">--}}
                        {{--                                <input type="text" class="form-control" id="editName" name="menu" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.menu_placholder_en')}}">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="edit-schedule" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('exam.edit_header')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('schedule-update')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="scheduleuid" name="id">
{{--                        <input type="hidden" id="scheduledatetime" name="scheduledatetime">--}}
                        <div class="form-group row">
                            <div for="category" class="col-sm-4 text-right">{{__('exam.exam_time')}} :</div>
                            <div class="col-sm-8" id="showSchedule"></div>

                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('exam.exam_date_time')}} :</label>
                            <div class="col-sm-9">
                                <input name="schedule" type='text' class="form-control timeseconds" id="edittimeseconds" placeholder="{{__('exam.placeholder_exam_date_time')}}" required/>
                                <span class="ti-calendar iconPostion" id="iconDatepicker"></span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="userReasons">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleReason">Reasons</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <div class="section-title text-center ">
                                    <h3 class="top-c-sep">{{$lang == 'gb' ? 'Exam Name:' : 'পরীক্ষার নামঃ'}} <span id="examName"></span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row overflow-auto" style="height: 400px">
                            <div class="col-lg-10 mx-auto">
                                <div class="career-search mb-60">
                                    <div class="filter-result">
                                        <div id="loadReason"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('Admin/assets/libs/moment/moment.js')}}"></script>
    <script src="{{asset('Admin/assets/libs/daterangepicker/daterangepicker.js')}}"></script>
    <script>
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $(function() {
            $('.viewReason').on('click', function () {
                $('#examName').html($(this).attr('data-name'))
                const lang = "{{$lang}}"
                const unlock = lang == 'gb' ? 'Unlock' : 'আনলক করুন'
                const reasons = JSON.parse($(this).attr('data-reasons'))
                console.log('reasons', reasons)
                let reasonView = ''
                $.each(reasons, function( index, value ) {
                    console.log(index, value)
                    if(!!value.reason) {
                        reasonView += `<div class="job-box d-md-flex align-items-center justify-content-between mb-30 border rounded">
                                               <div class="job-left my-4 d-md-flex align-items-center flex-wrap p-2">
                                                   <div class="job-content">
                                                       <h5 class="text-center text-md-left">${value.user.name}(${value.user.email})</h5>
                                                       <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                                           <li class="mr-md-4 text-danger">
                                                               ${value.reason}
                                                           </li>
                                                       </ul>
                                                   </div>
                                               </div>
                                               <div class="job-right my-4 mx-2 flex-shrink-0">
                                                   <a href="#" class="btn d-block w-100 d-sm-inline-block btn-light unlock" data-exam="${value.exam_id}" data-user="${value.user_id}">${unlock}</a>
                                               </div>
                                         </div>`
                    }
                });

                $('#loadReason').html( reasonView )
                $('#userReasons').modal('show')
            })
            $(document).on('click','.unlock', function () {
                const lang = "{{$lang}}"
                const exam = $(this).attr('data-exam')
                let fd = {
                    'exam': exam,
                    'user': $(this).attr('data-user')
                }
                $.ajax({
                    url:"{{url('api/unlock-exam')}}",
                    type:"Post",
                    data: fd,
                    success: function (data) {
                        console.log('number_of_reason...', data['number_of_reason'])
                        // if (data['number_of_reason'] > 0){
                        //     $('#num_'+ exam).html(lang == 'gb' ? data['number_of_reason'] : q2bNumber(data['number_of_reason']))
                        //     $('#viewRes_' + exam).attr('data-reasons', JSON.stringify(data['reasons']))
                        // } else{
                        //     $('#btn_'+ exam).addClass('d-none')
                        // }
                        $('#userReasons').modal('hide')
                    }
                })
            })

            function q2bNumber(numb) {
                let numbString = numb.toString();
                let bn = ''
                let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯', '.':'.'};
                [...numbString].forEach(n => bn += eb[n])
                return bn
            }
            var today = new Date()
            // $('.timeseconds').daterangepicker({
            //     timePicker: true,
            //     singleDatePicker: true,
            //     timePickerIncrement: 5,
            //     timePicker24Hour: false,
            //     showDropdowns: true,
            //     autoUpdateInput: false,
            //     minDate:today,
            //     minYear: today.getFullYear(),
            //     drops: 'down',
            //     parentEl: "#edit-schedule .modal-body",
            //     locale: {
            //         format: 'YYYY-MM-DD h:mm A'
            //     },
            // });
            $('.timeseconds').on('apply.daterangepicker', function(ev, picker) {
                console.log('picker...',picker)
                $(this).val(picker.startDate.format('DD-MM-YYYY, h:mm A'));
            });

            $('.timeseconds').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $(document).on('click' , '#iconDatepicker' , function(){
                // alert('hello click')
                $('.timeseconds').data('daterangepicker').show()
                // $('.timeseconds').trigger('show.daterangepicker');
            });
            // setTimeout(()=> {
            //
            // }, 1000)
            $('.schedule_edit').on('click', function (e) {
                e.preventDefault()
                $('#edittimeseconds').val('')
                const id = $(this).attr('data-id')
                const schedule = $(this).attr('data-schedule')
                const scheduleValue = $(this).attr('data-scheduleValue')
                $('#showSchedule').html(scheduleValue)
                $('#scheduleuid').val(id)
                $('#edit-schedule').modal('show')
                setTimeout(()=>{
                    // $('#edittimeseconds').focus()
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
                        drops: 'down',
                        parentEl: "#edit-schedule .modal-body",
                        locale: {
                            format: 'YYYY-MM-DD h:mm A'
                        },
                    });
                    $('.timeseconds').data('daterangepicker').show()
                },1000)
            })
            $(".alert").delay(5000).slideUp(300);
            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                $('#uid').val($(this).attr('data-id'));
                $('#editName').val($(this).attr('data-quizName'));
                $('#editbanglaName').val($(this).attr('data-bnQuizName'));
                $('#edit-category').modal('show');
            })

            $(document).on('click', '.mode_edit', function(e) {
                e.preventDefault();
                let time = 0;
                let givenTime = $(this).attr('data-qt') > 0 ? $(this).attr('data-qt') : ($(this).attr('data-et') > 0 ? $(this).attr('data-et') : 0 )
                if ($(this).attr('data-timeUnit') == 's'){
                    time = givenTime
                } else if ($(this).attr('data-timeUnit') == 'm') {
                    time = Math.round( parseInt(givenTime)/60)
                } else if ($(this).attr('data-timeUnit') == 'h') {
                    time =  Math.round(parseInt(givenTime)/3600)
                }
                $('#muid').val($(this).attr('data-id'));

                if($(this).attr('data-qt') > 0){
                    $("#qt").prop("checked", true);
                    $('#inp_time').val(time);
                    $(this).attr('data-layout') > 0 ? $("#onebyoneLayout").prop("checked", true) : $("#togetherLayout").prop("checked", true)
                } else if ($(this).attr('data-et') > 0) {
                    $("#et").prop("checked", true);
                    $('#inp_time').val(time);
                } else {
                    $('#inp_time').val(time);
                }
                $('#time_unit').val($(this).attr('data-timeUnit'))
                if($('#qt').is(':checked')) {
                    $('#optLayout').removeClass('d-none')
                } else {
                    $('#optLayout').addClass('d-none')
                }
                $('#edit-mode').modal('show');
            })

            $(document).on('click', ".delete", function() {
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
                            url: "{{url('deleteMenu')}}/" + id,
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

            function publishedOrNot(id, value) {
                $.ajax({
                    url: "{{url('examPublished')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id,
                        'value': value
                    },
                    success: function(data) {
                        Swal.fire({
                            text: "{{__('exam.updated_msg')}}",
                            type: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        })
                    }
                })
            }

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
        })
        $('input[type=radio][name=mode]').change(function() {
            console.log($(this).val(), 'radio value..')
            if($(this).val() == 'qt') {
                $('#optLayout').removeClass('d-none')
            } else {
                $("#togetherLayout").prop("checked", true);
                $('#optLayout').addClass('d-none')
            }
        });
        $('.mark_edit').on('click', function (e) {
            e.preventDefault()
            const id = $(this).attr('data-id')
            const eachQuestionMark = $(this).attr('data-each_question_mark')
            const negativeMark = $(this).attr('data-nagetive_mark')

            var options = $('#mark_select_negetive_mark option');

            var values = $.map(options , function(option) {
                return option.value
            });
            const findValue = values.some(value => value == negativeMark)
            if(findValue) {
                $('#mark_select_negetive_mark').val(negativeMark)
                $('#mark_parent_custom_negative_number').addClass('d-none')
                // $('#mark_custom_negative_number').val('')
            } else{
                $('#mark_select_negetive_mark').val('custom')
                $('#mark_custom_negative_number').val(negativeMark)
                $('#mark_parent_custom_negative_number').removeClass('d-none')
            }

            $('#markuid').val(id)
            $('#negativemarkvalue').val(negativeMark)
            $('#mark_each_q_number').val(eachQuestionMark)
            $('#edit-mark').modal('show')
        })
        $('#mark_select_negetive_mark').on('change', function () {
            if($(this).val() == 'custom'){
                $('#mark_parent_custom_negative_number').removeClass('d-none')
            } else {
                $('#negativemarkvalue').val($(this).val())
                $('#mark_parent_custom_negative_number').addClass('d-none')
                $('#mark_custom_negative_number').val('')
            }
        })
        $('#mark_custom_negative_number').on('keyup', function () {
            $('#negativemarkvalue').val($(this).val())
        })
    </script>
@endsection
