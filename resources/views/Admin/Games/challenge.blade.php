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
    </style>
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <form id="tf" action="{{url('createChallenge')}}" method="post" class="validation-wizard wizard-circle">
                        @csrf
                        <!-- Step 1 -->
                        <h6>Select Question Group </h6>
                        <section>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row pb-3">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}} :</label>
                                        <div class="col-sm-6">
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
                                                                            {{$lang=='gb'?$c->name:$c->bn_name}}
                                                                            @if( ! count($c->childs))
                                                                                <span class="badge badge-pill badge-info float-right">{{$c->questions_count}}</span>
                                                                            @endif
                                                                        </label>

                                                                    </div>
                                                                    @if(count($c->childs))
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
                                    <div class="table-responsive" style="overflow-x: hidden">

                                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12" id="loading" style="display: none;">
                                                    <div class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled="">
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            Loading...
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 pt-3" id="viewData">
                                                    <div class="container">
                                                        <div class="row justify-content-md-center">
                                                            <div class="alert alert-success text-center" role="alert" id="msg">
                                                                <p class="pt-3">{{__('form.question_notify')}}.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Question Type & Number</h6>
                        <section>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Select Question Type (Optional)</h4>
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
                                                    <h4 class="card-title"> Number of Question</h4>
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
                        <h6>Name and Schedule</h6>
                        <section>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Challenge Name (<small>Optional</small>)</h4>
                                                    <div class="form-group">
                                                        <input name="name" type="text" class="form-control"
                                                               id="placeholder" placeholder="Challenge Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title"> Schedule (<small>Optional</small>)</h4>
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
                                    </div>
                                </div>
                            </div>

                        </section>
                    </form>
                </div>
            </div>
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
        var form = $(".validation-wizard").show();

        $(".validation-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanging: function(event, currentIndex, newIndex) {
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
                format: 'DD-MM-YYYY h:mm:ss'
            }
        });
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
                $('.selectedTopic').append(`<span class="badge badge-pill badge-danger float-right">${qCount}</span>`);

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
    </script>

@endsection
