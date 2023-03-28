@extends('Admin.Layout.dashboard')
<link rel="stylesheet" href="{{asset('Admin/assets/libs/jquery-steps/steps.css')}}">
<link rel="stylesheet" href="{{asset('Admin/assets/libs/jquery-steps/steps.css')}}">
<link rel="stylesheet" href="{{asset('Admin/assets/libs/daterangepicker/daterangepicker.css')}}">

@section('css')
    <style>
        .myadmin-dd .dd-list .dd-item .dd-handle-new {
            background: #fff;
            border: 1px solid rgba(120, 130, 140, .13);
            padding: 8px 16px;
            height: auto;
            font-family: Montserrat, sans-serif;
            font-weight: 400;
            border-radius: 0;
        }
        .dd {
            width: 100% !important;
            height: auto;
            max-height: 50vh;
            overflow: auto;
        }


        .dd-handle-new {
            min-height: 40px;
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
        [type="checkbox"] + label::before, [type="checkbox"]:not(.filled-in) + label::after {
            top: 10px !important;
            left: 10px !important;
        }
        [type="checkbox"] + label {
            padding-left: 40px !important;
        }
        [type="checkbox"] + label {
            position: absolute !important;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            padding: 10px;
        }
        .selected{
            background: whitesmoke;
        }
        .wizard-content .wizard > .actions > ul > li > a:hover {
            border: 1px solid blue !important;
            color: blue !important;
        }

        .iframe-size{
            width: 90vw;
            height: 90vh;
            left: 3vw;
        }
        .hide_share{
            position: absolute;
            left: 3%;
            top: -25px;
            height: 40px;
            width: 300px;
            overflow: hidden;
            transition: .3s linear;
            opacity: 0;
            visibility: hidden;
        }
        .show_share {
            position: absolute;
            left: -17px;
            height: 40px;
            width: 300px;
            overflow: hidden;
            transition: .5s linear;
            opacity: 1;
            bottom: -25px;
        }
        .pointer{
            cursor: pointer;
            text-decoration: none !important;
        }
        .stars {
            position: absolute;
            font-size: 10px;
        }
        .checked {
            color: gold;
        }

        /*For menu toggler mismatch fix*/
        .sidebartoggler{  position: absolute; margin-top: -10px;  }
        .profile-pic{ margin-top: 20px; }

        @media only screen and (max-width: 600px) {
            .card-body.wizard-content{
                padding: 0;
            }
            .dd-list .dd-list {
                padding-left: 10px !important;
            }
            [type="checkbox"] + label {
                font-size: .8rem;
            }
        }
    </style>
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title text-center">{{__('msg.challenge')}}
                        <button class="float-lg-right btn btn-primary" id="create_challenge">
                            {{__('form.create_challenge')}}
                        </button>
                    </h4>
                    <hr>
                    <form id="tf" action="{{url('createChallenge')}}" method="post" class="validation-wizard wizard-circle d-none">
                        @csrf
                        <!-- Step 1 -->
                            <h6>{{__('form.select_question_group')}}</h6>
                        <section class="px-0 px-md-2">
                            <div class="card my-0">
                                <div class="card-body my-0">
                                    <div class="form-group row pb-3">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}} :</label>
                                        <div class="col-sm-6 px-0 px-md-2">
                                            <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                                                <ol class="dd-list">
                                                    <li class="dd-item" id="parentdd">
                                                        <div class="dd-handle-new">
                                                            <strong class="selectedTopic">{{ $id ? $catName :__('form.select_topic') }}</strong>
                                                        </div>
                                                        <input type="hidden" name="category" id="categoryId">
                                                        <ol class="dd-list">
                                                            @foreach($topic as $c)
                                                                <li class="dd-item">
                                                                    <div class="dd-handle-new" data-cid="{{$c->id}}">
                                                                        @if( ! count($c->childs))
                                                                            <input type="checkbox" value="{{$c->id}}"
                                                                                   name="topic" id="topic{{$c->id}}"
                                                                                   data-name="{{$lang=='gb'?$c->name:$c->bn_name}}"
                                                                                   data-qCount="{{$c->questions_count}}"
                                                                                   class="material-inputs programming">
                                                                        @endif
                                                                        <label class="" for="topic{{$c->id}}">
                                                                            {{$lang=='gb'?$c->name:$c->bn_name }}
                                                                            @if( ! count($c->childs))
                                                                                <span class="badge badge-pill badge-info float-right">
                                                                                    {{$lang=='gb'? $c->questions_count : $bang->bn_number($c->questions_count)}}
                                                                                </span>
                                                                            @endif
                                                                        </label>

                                                                    </div>
                                                                    @if(count($c->childs))
{{--                                                                        {{dd($c->childs)}}--}}
                                                                        @include('Admin.Games._subtopic', ['category'=>$c->childs])
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    </li>
                                                </ol>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                            <h6>{{__('form.question_type_number')}}</h6>
                        <section class="px-0 px-md-2">
                            <div class="card">
                                <div class="card-body px-0 px-md-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{__('games.question_type')}} (<small>{{__('games.optional')}}</small>)</h4>
                                                    @foreach($questionType as $qt)
                                                    <div class="form-check my-2"><br>
                                                        <input name="question_type[]" id="checkbox{{$qt->id}}" value="{{$qt->id}}" class="form-check-input material-inputs" type="checkbox" >
                                                        <label class="form-check-label" for="checkbox{{$qt->id}}">{{ $lang == 'bd' ? $qt->bn_name : $qt->name}}</label>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title"> {{__('form.noq')}}</h4>
                                                    <div class="form-group">
                                                        <input name="qq" type="number" class="form-control" value="10">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 3 -->
                            <h6>{{__('form.name_schedule')}}</h6>
                        <section class="px-0 px-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{__('games.challenge_name')}} (<small>{{__('games.optional')}}</small>)</h4>
                                                    <div class="form-group">
                                                        <input name="name" type="text" class="form-control"
                                                               id="placeholder" placeholder="{{__('games.challenge_name_placholder')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title"> {{__('games.schedule')}} (<small>{{__('games.optional')}}</small>)</h4>
                                                    <div class='input-group mb-3'>
                                                        <input name="schedule" type='text' class="form-control timeseconds"/>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <span class="ti-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title"> {{__('games.public_private')}} (<small>{{__('games.optional')}}</small>)</h4>
                                                    <div class="form-check">
                                                        <input class="form-check-input material-inputs" type="checkbox" name="is_published" id="published" value="1">
                                                        <label class="form-check-label" for="published">{{__('games.public')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4 " id="quizlist">
        @php $pics = array("ag", "al", "as", "ga", "gk","gs", "sa", "sg", "sp", "ags", "asg", "gsa"); @endphp
        @foreach($challenges as $ch)
                <div class="col-md-3 col-sm-12 text-center mb-4 d-flex align-items-stretch">
                    <div class="card bg-inverse ">
                        <img class="card-img-top img-fluid" src="{{asset('img/quiz/'.$pics[rand(0, 11)].'.jpg')}}" alt="Card image cap">
                        <div class="card-body text-white d-flex flex-column justify-content-between">
                            <div id="shareBtn{{ $ch->id }}" class="show_share shareBtnDiv"></div>
                            <div class="d-flex justify-content-between">
                                <div class="pointer small btn btn-xs btn-outline-primary text-white align-self-center" data-id="{{ $ch->id }}">
                                     {{ __('form.layout_title') }}
                                </div>
                                <div id="together-{{$ch->id}}-0" class="optlayout pointer small btn btn-xs btn-outline-info align-self-center {{$ch->option_view_time == 0 ?'bg-info text-white':''}}" data-id="{{ $ch->id }}" data-value="0">
{{--                                    <i class="fas fa-share-alt"></i> --}}
                                    <img src="{{asset('img/layout/together.gif')}}" alt="" width="15px">
                                    {{ __('form.option_together_title') }}
                                </div>
                                <div id="together-{{$ch->id}}-3" class="optlayout btn btn btn-xs btn-outline-info align-self-center {{$ch->option_view_time > 0 ?'bg-info text-white':''}}" data-id="{{ $ch->id }}" data-value="3">
                                    <img src="{{asset('img/layout/onebyone.gif')}}" alt="" width="15px">
                                    {{__('form.option_one_by_one_title')}}
                                </div>
                            </div>
                            <div style="margin-top: 5px;">
                                <h4 class="card-title text-white">{{ $ch->name }}</h4>
                                <p class="card-text">
                                    @php
                                        $qc = count(explode(',', $ch->question_id));
                                        $beq = app()->getLocale() == 'bd'? ($bang->bn_number($qc) . ' টি') : ($qc .' questions ');
                                        $total =0;
                                        $qcat = '';
                                    @endphp

                                    @foreach($ch->category as $clc)
                                        @php
                                            $cqc = $clc->questions_count;
                                            $total += $cqc;
                                            if(app()->getLocale() == 'bd'){
                                                $qcat .= $clc->bn_name . '-'. $bang->bn_number($cqc);
                                                $qcat .= $loop->last ? ' মোট '. $bang->bn_number($total) : ', ';
                                            }else{
                                                $qcat .= $clc->name . '-'. $cqc;
                                                $qcat .= $loop->last ? ' total '. $total : ', ';
                                            }

                                        @endphp
                                    @endforeach

                                    {{ trans('games.challeng_message', [ 'questions' => $beq, 'categories' => $qcat ])}}

                                </p>
                                {{--                            <p class="text-danger">{{__('games.challenge_difficulty')}}</p>--}}
                            </div>
                            <div class="d-flex justify-content-between">
                                <a class="shareBtn pointer small btn btn-xs btn-outline-info align-self-center" data-id="{{ $ch->id }}">
                                    <i class="fas fa-share-alt"></i> {{ __('msg.share') }}
                                    <div class="loading{{ $ch->id }}"></div>
                                </a>
                                <a href="{{ url('SingleQuestionDisplay/'. $ch->id . '/' . Auth::id()) }}"
                                   class="btn btn btn-xs btn-outline-info align-self-center" >
                                    {{__('msg.instant')}}
                                </a>
                                <a href="{{ url('Challenge/'. $ch->id . '/' . Auth::id()) }}"
                                   class="btn btn btn-xs btn-outline-info align-self-center" >
                                    {{__('msg.start')}}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
        @endforeach

        <div class="d-flex justify-content-center my-3 table-responsive">
            {{ $challenges->links() }}
        </div>
    </div>

    <div id="edit-questions" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('question/update')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="uqid" name="qid">
                        <div id="quistion_view">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">Update</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
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
    <script src="{{asset('Admin/assets/libs/jquery-steps/build/jquery.steps.js')}}"></script>
    <script src="{{asset('Admin/assets/libs/jquery-validation/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('Admin/assets/libs/moment/moment.js')}}"></script>
    <script src="{{asset('Admin/assets/libs/daterangepicker/daterangepicker.js')}}"></script>
    <script>
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        var form = $(".validation-wizard").show();


        $(".validation-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "{{__('games.submit')}}",
                next: "{{__('games.next')}}",
                previous: "{{__('games.previous')}}",
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                console.log([event, currentIndex, newIndex]);
                return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
            },
            onFinishing: function(event, currentIndex) {
                return form.validate().settings.ignore = ":disabled", form.valid()
            },
            onFinished: function(event, currentIndex) {
                $('#tf').submit();
            }
        }),
            $(".validation-wizard").validate({
            ignore: "input[type=hidden]",
            errorClass: "text-danger",
            successClass: "text-success",
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass)
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass)
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element)
            },
            rules: {
                email: {
                    email: !0
                }
            }
        })

        $('.timeseconds').daterangepicker({
            timePicker: true,
            singleDatePicker: true,
            timePickerIncrement: 10,
            timePicker24Hour: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD h:mm:ss'
            }
        });
        $(window).click(function() {
            $('.show_share').empty();
        });
        $('.shareBtn').on('click', function(e){
            e.stopPropagation();
            let id = $(this).attr('data-id');
            $('.loading'+id).addClass('spinner-grow spinner-grow-sm');

            let hasShow = $('#shareBtn'+id).hasClass('show_share');
            let url = "{{ url('/Challenge') }}/" + id + "/{{ Auth::id() }}/share";
            let iframe ='<iframe id="shareFrame'+id+'" src="'+url+'" frameborder="0" class="iframe-size"></iframe>';

            $('.show_share').empty();
            $('#shareBtn'+id).append(iframe);

            $('#shareFrame'+id).on('load', function(){
                $('.loading'+id).removeClass('spinner-grow spinner-grow-sm');
            });

        });
        $('#create_challenge').on('click',function (){
            var create_challenge = "{{__('form.create_challenge')}}";
            var close = "{{__('form.cancel')}}";
            if($('#tf').hasClass('d-none')){
                // console.log(close);
                $('#tf').removeClass('d-none');
                $(this).text(close)
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-danger');
            }
            else {
                // console.log(create_challenge);
                $('#tf').addClass('d-none');
                $(this).text(create_challenge);
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-primary');
            }
        })

    </script>

    <script>
        $(function() {
            $('input[name="topic"]').on('click',function (e){
                let qCount =0, topics_id='';
                e.stopPropagation();
                $("label").removeClass('bg-secondary text-white');

                var topics = $("input[name='topic']:checked").map(function() {
                    $(this).next().addClass('bg-secondary text-white');
                    qCount+= parseInt($(this).attr('data-qCount'));
                    topics_id += $(this).val() + ',';

                    return $(this).attr('data-name');
                }).get().join(', ');

                console.log(qCount);
                $('#categoryId').val(topics_id.slice(0, -1));

                $('.selectedTopic').html(topics)
                $('.selectedTopic')
                    .append(`
                        <span class="badge badge-pill badge-danger float-right">
                        ${e2bNumber(qCount, '{{ app()->getLocale() }}')}</span>
                    `);

                $('.smt').attr('data-tid',topics_id);
            })

            $('.smt').on('click',function (e){
                e.preventDefault();
                topicwithcategory($(this).attr('data-tid'));
            })




            var getId = "{{$id}}"
            if (getId != "") {
                topicwithcategory(getId);
            }
            $('.topic').on('change', function() {
                var id = $(this).val();
                if (id == 0) {
                    $('#viewData').html(`<div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="alert alert-success text-center" role="alert" id="msg">
                                            <p class="pt-3">Please select from the topic above and see the questions according to the topic.</p>
                                        </div>
                                    </div>
                                </div>`);
                } else {
                    topicwithcategory(id);

                }

            })
            $('.Qcategory').on('change', function() {
                var id = $(".topic option:selected").val();
                var cid = $(this).val();
                topicwithcategory(id, cid);

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
                    topicwithcategory($(this).attr('data-cid'));
                }

            })
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
        })

        function e2bNumber(numb, l) {
            if (l === 'gb')
                return numb;
            let numbString = numb.toString();
            let bn = '';
            let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
            [...numbString].forEach(n => bn += eb[n]);
            return bn
        }

        function topicwithcategory(id) {

            $.ajax({
                url: "{{url('question/getlist')}}/" + id,
                type: "GET",
                beforeSend: function() {
                    $('#loading').show();
                    $('#msg').hide();
                    $('#viewData').hide();
                    console.log('BEFORE');
                },
                success: function(data) {
                    console.log(data);
                    if (data != '') {
                        $('#viewData').html(data);
                        toastr.success('Successfully Loaded', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            timeOut: 1000
                        });
                    } else {

                        $('#viewData').html(
                            `<div class="text-center">
                            <p>Questions not available.</p>
                            </div>`
                        );

                    }
                    console.log(data);
                },
                complete: function() {
                    $('#loading').hide();
                    $('#viewData').show();
                    console.log('COMPLETE');

                }
            })
        }
        $(document).on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            $('#uqid').val(id);
            $.ajax({
                url: "{{url('question/edit')}}/" + id,
                type: 'GET',
                success: function(data) {
                    $('#quistion_view').html(data);
                    $('#edit-questions').modal('show');
                }
            })
        })
        $(document).on('click', ".delete", function(e) {
            // e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    var $this = $(this);
                    var id = $this.attr('data-id');
                    $.ajax({
                        url: "{{url('question/delete')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            $this.closest("tr").remove();
                        },
                        complete: function() {
                            toastr.success('Deleted Successfully.', {
                                "closeButton": true
                            });

                        }
                    })

                }
            })

        });
        $('.optlayout').on('click', function () {
            var $this = $(this)
            $.ajax({
                url: "{{url('update-challenge-option-layout')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': $(this).data('id'),
                    'value': $(this).data('value')
                },
                success: function(data) {
                    if($this.data('value') == 0){
                        $('#together-'+$this.data('id')+'-'+3).removeClass('bg-info text-white')
                        $this.addClass('bg-info text-white')
                    } else {
                        $('#together-'+$this.data('id')+'-'+0).removeClass('bg-info text-white')
                        $this.addClass('bg-info text-white')
                    }
                    toastr.success("{{__('form.upload_notification_message')}}", {
                        "closeButton": true
                    });
                }
            })

        })
    </script>

@endsection
