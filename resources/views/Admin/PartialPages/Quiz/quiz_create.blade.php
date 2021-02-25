@extends('Admin.Layout.dashboard')
@section('css')
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
</style>
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('msg.createquiz')}}</h4>
                <hr>
                <form class="form-horizontal r-separator" action="{{url('quiz/save')}}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="cid" id="selectedCid" required>
                    <div class="form-group row justify-content-center">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="qb" value="qb" name="quizCreateType" class="custom-control-input" checked="">
                                    <label class="custom-control-label" for="qb">{{__('form.from_qb')}}</label>
                                </div>
                            </label>
                            <label class="btn btn-primary">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cq" value="cq" name="quizCreateType" class="custom-control-input">
                                    <label class="custom-control-label" for="cq">{{__('form.custom_q')}}</label>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="quizName" class="col-sm-3 text-right control-label col-form-label">{{__('form.quiz_name_en')}} : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="quizName" placeholder="{{__('form.quiz_placholder')}}" name="quizName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quizName" class="col-sm-3 text-right control-label col-form-label">{{__('form.quiz_name_bn')}} :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="{{__('form.quiz_placholder')}}" name="bdquizName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.game_mode')}}<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                            <div class="col-sm-5">
                                <select class="form-control custom-select" name="game_type" required>
                                    <option>{{__('form.game_mode_select')}}</option>
                                    @foreach($gameType as $game)
                                    <option value="{{$game->id}}">{{$lang=='gb'?$game->gb_game_name:$game->bd_game_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <label for="category" class="col-sm-2 text-right control-label col-form-label">Game Type<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label> -->
                            <div class="col-sm-4">
                                <select class="form-control custom-select" name="difficulty" required>
                                    <option>{{__('form.game_type')}}</option>
                                    <option value="1">{{__('form.easy')}}</option>
                                    <option value="2">{{__('form.intermediate')}}</option>
                                    <option value="3">{{__('form.difficult')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}}<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                            <div class="col-sm-9">
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
                        </div>


                        <div id="viewData" class="justify-content-center" style="display: none">
                        </div>
                        <div id="CustomQ" style="display: none;">
                            <div class="form-group row">
                                <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.question_en')}} :</label>
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
                        <button type="submit" class="btn btn-info waves-effect waves-light smt">{{__('msg.createquiz')}}</button>
                        <a class="btn btn-success waves-effect waves-light text-white" href="{{url('quiz/view/list')}}">{{__('form.goto_quiz_list')}}</a>
                        @else
                        <a class="btn btn-secondary waves-effect waves-light disabled">{{__('msg.createquiz')}}</a>
                        <a class="btn btn-secondary waves-effect waves-light text-white disabled">{{__('form.goto_quiz_list')}}</a>
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
@endsection
@section('js')
<script>
    $(function() {

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
                }
            })
        });

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
            var cid = $('#selectedCid').val();
            // var paise = 0;
            // $('input[name="ans[]"]').each(function() {
            //     console.log($(this).val());
            //     if ($(this).val() == 1) {
            //         paise = 1;
            //     }
            // });
            if (cid != '') {
                $('#smtform').submit();
            } else {
                e.preventDefault();
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Please select the Topic.',
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
                <h3 class="text-center pb-2">{{__('form.new_ques')}} <i class="ti-close removeQ" style="color:red;cursor:pointer;"></i></h3>
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
@endsection
