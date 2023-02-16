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
    </style>
@endsection
@section('content')
    <div class="selectedQuestionCount text-center">
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
                                    <input type="number" class="form-control" placeholder="{{__('exam.each_question_number_placeholder')}}" name="each_q_number" id="each_q_number"/>
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
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('exam.exam_date_time')}} :</label>
                                <div class="col-sm-4">
                                    <input name="schedule" type='text' class="form-control timeseconds" id="timeseconds" placeholder="{{__('exam.placeholder_exam_date_time')}}"/>
                                    <span class="ti-calendar iconPostion" id="iconDatepicker"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}}<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                                <div class="col-sm-6">
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
                                        <input type="number" class="form-control"  placeholder="{{__('form.no_of_questions')}}" name="NOQ" id="noq">
                                    </div>
                                @endcan
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
@endsection
@section('js')
    <script src="{{asset('Admin/assets/libs/moment/moment.js')}}"></script>
    <script src="{{asset('Admin/assets/libs/daterangepicker/daterangepicker.js')}}"></script>

    <script>
        $(function() {
            var today = new Date()
            $('.timeseconds').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                timePickerIncrement: 5,
                timePicker24Hour: false,
                showDropdowns: true,
                autoUpdateInput: false,
                minDate:today,
                minYear: today.getFullYear(),
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
            var lang ='{{$lang}}';
            var chkquestions = [];
            var arrayindex = [0]
            var QC;
            $(document).on('click','.chk',function (){
                var id = $(this).val();
                console.log($(this).parent(), 'this element')
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
                if (lang=='bd'){
                    QC = q2bNumber(chkquestions.length)
                }
                $('#count').html(QC);
                $('#selectedQ').val(chkquestions);
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
            $('body').on('click', '.pagination a', function(e) {
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
                const noq = $('#noq').val()
                const questionsValide = selectedQ != '' ? true : (noq != '' ? true : false)
                const dateTime = $('#timeseconds').val()

                // console.log('condition', cid, bn_or_en, exam_time, en_exam != '', bn_exam != '')
                // return

                // var paise = 0;
                // $('input[name="ans[]"]').each(function() {
                //     console.log($(this).val());
                //     if ($(this).val() == 1) {
                //         paise = 1;
                //     }
                // });
                if (cid != '' && bn_or_en && exam_time != '' && questionsValide) {
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
                        message = lang == 'gb' ? 'Please select the Topic.' : 'বিষয় নির্বাচন করুন'
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

            $('input[type=radio][name=mode]').change(function() {
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
