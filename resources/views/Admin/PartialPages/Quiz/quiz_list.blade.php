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
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('msg.quizList')}}
                    @can('create',App\Quiz::class)
                    <a class="btn btn-success float-right" href="{{url('quiz/create')}}">{{__('msg.createquiz')}}</a>
                    @else
                    <a class="btn btn-secondary float-right disabled" href="" >{{__('msg.createquiz')}}</a>
                    @endcan
                </h4>
                <hr>
                <div class="form-group row pb-3">
                    <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}} :</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="top_id" />
                        <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                            <ol class="dd-list">
                                <li class="dd-item" id="parentdd">
                                    <div class="dd-handle-new">
                                        <strong class="selectedTopic">{{ $tid ? $catName : __('form.select_topic') }}</strong>
                                    </div>
                                    <ol class="dd-list">
                                        @foreach($category as $c)
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
                <div class="row">
                    <div class="col-sm-12" id="loading" style="display: none;">
                        <div class="text-center">
                            <button class="btn btn-primary" type="button" disabled="">
                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                {{__('form.loading')}}
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 pt-3" id="viewData">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="alert alert-success text-center" role="alert" id="msg">
                                    <p class="pt-3">{{__('form.quiz_notify')}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- <div id="viewData"></div> -->

            </div>
        </div>
    </div>
</div>
<div id="quiz-info" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.quiz_info')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="QuestionLoad">
                <!-- <h4 class="card-title text-center" id="quesHeader"></h4>
                <hr> -->
                <!-- <div class="row d-flex justify-content-center" id="QuestionLoad"> -->
                <!-- <div class="row d-flex justify-content-center">

                </div> -->
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
                url: url,
                type: "GET",
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    $('#viewData').html(data);
                    console.log(data);
                },
                complete: function() {
                    $('#loading').hide();
                }
            })
        });

        var getId = "{{$tid}}"
        if (getId != "") {
            quizList(getId);
        }
        $('#topic').on('change', function() {
            var id = $(this).val();
            quizList(id);
        })

        function quizList(id) {
            if (id != '') {
                $.ajax({
                    url: "{{url('quiz/quiz/list')}}/" + id,
                    type: "GET",
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    success: function(data) {
                        $('#viewData').html(data);
                        console.log(data);
                    },
                    complete: function() {
                        $('#loading').hide();
                    }
                })
            }
        }

        $(document).on('click', '.view', function() {
            var Question = $(this).attr('data-question');
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{url('quiz/quiz')}}/" + id,
                type: "GET",
                success: function(data) {
                    $('#quesHeader').html("Quiz Name :" + Question);
                    $('#QuestionLoad').html(data);
                    console.log(data);
                }
            })
            $('#quiz-info').modal('show');
        })

        $(document).on('click', '.delete', function() {

            Swal.fire({
                title: '{{__('form.are_you_sure')}}?',
                text: "{{__('form.no_revert')}}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('form.yes_delete_it')}}',
                cancelButtonText:"{{__('form.cancel')}}"
            }).then((result) => {
                if (result.value) {
                    var $this = $(this);
                    var id = $this.attr('data-id')
                    $.ajax({
                        url: "{{url('quiz/delete')}}/" + id,
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
        })

        $(document).on('click', '.topicls', function() {

            // $(this).hasClass('activeli') ? $(this).removeClass('activeli') : [$('.topicls').removeClass('activeli'), $(this).addClass('activeli'), $('#selectedCid').val($(this).attr('data-cid')), $('#selectedTopic').html($(this).text())];

            if ($(this).hasClass('activeli')) {
                $(this).removeClass('activeli');
                $('#selectedCid').val('');
                $('.selectedTopic').html('Select Topic');
            } else {
                // $('.topicls').removeClass('activeli');
                // $(this).addClass('activeli');
                // alert($(this).attr('data-cid'));

                $('#parentdd').addClass('dd-collapsed').children('[data-action="collapse"]').hide();
                $('#parentdd').children('[data-action="expand"]').show();
                $('.topicls').removeClass('activeli');
                $(this).addClass('activeli');
                $('#selectedCid').val($(this).attr('data-cid'));
                $('.selectedTopic').html($(this).text());
                quizList($(this).attr('data-cid'));
                $('#top_id').val($(this).attr('data-cid'));
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
</script>
@endsection
