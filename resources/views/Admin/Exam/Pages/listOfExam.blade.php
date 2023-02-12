@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">{{__('exam.list_of_exam')}}</h4>
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
                                                <th>{{$exam->exam_en}}</th>
                                                <th>{{$exam->exam_bn}}</th>
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

                                                    {{ convert_seconds($exam->exam_time ? $exam->exam_time : ($exam->question_time ? $exam->question_time : 0)) }}
                                                </th>
                                                <th>
                                                    <div class="bt-switch">
                                                        <input type="checkbox" class="chk" data-id="{{$exam->id}}" data-on-text="{{__('exam.published')}}" data-off-text="{{__('exam.not_published')}}" data-size="normal" {{$exam->is_published ==1?"checked":""}} />
                                                    </div>
                                                </th>
                                                <th>
                                                    <a class="edit" href="" data-id="{{$exam->id}}" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="delete text-danger" style="cursor: pointer;" data-id="{{$exam->id}}" title="Remove">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
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
                    <h4 class="modal-title" id="myModalLabel">{{__('form.menu_update')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('menuUpdate')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="uid" name="id">
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" id="editName" name="menu" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.menu_placholder_en')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" id="editbanglaName" name="bn_menu" placeholder="{{__('form.menu_placholder_bn')}}">
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
                    <h4 class="modal-title" id="myModalLabel">{{__('Update')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('mark-update')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="markuid" name="id">
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 text-right control-label col-form-label">{{__('Each question Number')}} :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" placeholder="{{__('exam.each_question_number_placeholder')}}" name="each_q_number" id="mark_each_q_number"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 text-right control-label col-form-label">{{__('Negative Mark')}} :</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="mark_select_negetive_mark">
                                    <option value="0">{{__('exam.select_negative_mark_placeholder')}}</option>
                                    <option value="20">20%</option>
                                    <option value="25">25%</option>
                                    <option value="50">50%</option>
                                    <option value="100">100%</option>
                                    <option value="custom">Custom</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 text-right control-label col-form-label">{{__('Custom Negative Mark')}} :</label>
                            <div class="col-sm-8" id="mark_parent_custom_negative_number">
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
@endsection

@section('js')
    <script>
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $(function() {
            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                $('#uid').val($(this).attr('data-id'));
                $('#editName').val($(this).attr('data-name'));
                $('#editbanglaName').val($(this).attr('data-bnname'));
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
            } else{
                $('#mark_select_negetive_mark').val('custom')
                $('#mark_custom_negative_number').val(negativeMark)
            }

            $('#markuid').val(id)
            $('#mark_each_q_number').val(eachQuestionMark)
            $('#edit-mark').modal('show')
        })
    </script>
@endsection
