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
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Quiz List <a class="btn btn-success float-right" href="{{url('quiz/create')}}">Create Quiz</a></h4>
                <hr>
                <!-- <div class="d-flex flex-row bd-highlight mb-3 justify-content-center">
                    <div class=" bd-highlight pt-3">Topic :</div>
                    <div class="p-2 bd-highlight w-50">
                        <select class="form-control custom-select category" id="topic">
                            <option value="0">Select Topic</option>
                            @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> -->
                <div class="form-group row pb-3">
                    <label for="category" class="col-sm-3 text-right control-label col-form-label">Topic :</label>
                    <div class="col-sm-9">
                        <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                            <ol class="dd-list">
                                <li class="dd-item" id="parentdd">
                                    <div class="dd-handle-new">
                                        <strong class="selectedTopic">{{ $tid ? $catName : 'Select Topic' }}</strong>
                                    </div>
                                    <ol class="dd-list">
                                        @foreach($category as $c)
                                        <li class="dd-item">
                                            <div class="dd-handle-new topicls" data-cid="{{$c->id}}"> {{$c->name}} </div>
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
                                Loading...
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 pt-3" id="viewData">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="alert alert-success text-center" role="alert" id="msg">
                                    <p class="pt-3">Please select from the topic above and see the quizzes according to the topic.</p>
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
                <h4 class="modal-title" id="myModalLabel">Quiz Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h4 class="card-title text-center" id="quesHeader"></h4>
                <hr>
                <div class="row d-flex justify-content-center" id="QuestionLoad">

                </div>
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