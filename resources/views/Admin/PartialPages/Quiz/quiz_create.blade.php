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
        color: #979898;
        text-decoration: none;
        font-weight: 700;
        border: 1px solid #e5e5e5;
        background: #fafafa;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .activeli {
        background-color: red !important;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Create Quiz</h4>
                <hr>
                <form class="form-horizontal r-separator" action="{{url('quiz/save')}}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="cid" id="selectedCid">
                    <div class="form-group row justify-content-center">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="qb" value="qb" name="quizCreateType" class="custom-control-input" checked="">
                                    <label class="custom-control-label" for="qb">From Question Bank</label>
                                </div>
                            </label>
                            <label class="btn btn-primary">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cq" value="cq" name="quizCreateType" class="custom-control-input">
                                    <label class="custom-control-label" for="cq">Custom Questions</label>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="quizName" class="col-sm-3 text-right control-label col-form-label">Quiz Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="quizName" placeholder="Type Quiz name here." name="quizName">
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Sub Topic :</label>
                            <div class="col-sm-7">
                                <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                                    <ol class="dd-list">
                                        <li class="dd-item">
                                            <div class="dd-handle-new">
                                                Select Topic
                                            </div>
                                            <ol class="dd-list">
                                                @foreach($question_topic as $c)
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
                            <p class="col-sm-2" id="selectedTopic"></p>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Question Topic</label>
                            <div class="col-sm-9" id="options">
                                <select class="form-control custom-select artopic" name="topic" id="topic">
                                    <option value="">Select Topic</option>
                                    @foreach($question_topic as $qt)
                                    <option value="{{$qt->id}}">{{$qt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row subtopicDiv" style="display: none;">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Sub Topic :</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="subtopic" id="showsubtopic">
                                    <option value="">Select Sub Topic</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Question Type</label>
                            <div class="col-sm-9" id="options">
                                <select class="form-control custom-select arcategory" name="category" id="category">
                                    <option value="">All Type</option>
                                    @foreach($question_category as $qc)
                                    <option value="{{$qc->id}}">{{$qc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div id="FromQB" class="d-flex justify-content-center"> -->

                        <div id="viewData" class="justify-content-center" style="display: none">
                        </div>
                        <!-- </div> -->
                        <div id="CustomQ" style="display: none;">
                            <div class="form-group row">
                                <label for="question" class="col-sm-3 text-right control-label col-form-label">Question :</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="question" placeholder="Type Question here." name="question[]"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="option1" class="col-sm-3 text-right control-label col-form-label">Option :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control inpoption" id="option" name="option0[]" placeholder="Enter Option">
                                </div>
                                <div class="col-sm-1 bt-switch">
                                    <input type="hidden" name="answer0[]" class="hi" value="0">
                                    <input type="checkbox" class="chk" data-on-text="Yes" data-off-text="No" data-size="normal" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="option1" class="col-sm-3 text-right control-label col-form-label"> Option :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control inpoption" id="option" name="option0[]" placeholder="Enter Option">
                                </div>
                                <div class="col-sm-1 bt-switch">
                                    <input type="hidden" name="answer0[]" class="hi" value="0">
                                    <input type="checkbox" class="chk" data-on-text="Yes" data-off-text="No" data-size="normal" />
                                </div>
                            </div>
                            <div id="createNew-show">

                            </div>

                            <div class="d-flex justify-content-center form-group">
                                <div class="pr-3">
                                    <select class="form-control custom-select" id="NoOP-show">
                                        <option value="1">Select No. of Options Added</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <!-- <input type="number" id="NoOP" class="form-control Opcreate" min="1" placeholder="No. of Options Added"> -->
                                </div>
                                <div class="pr-3">
                                    <label for="option1" class="control-label col-form-label">
                                        <a class="waves-effect waves-light createNew" data-option="option0[]" data-answer="answer0[]" id="createNew" data-id="NoOP" href="">Add New Option</a>
                                    </label>
                                </div>
                                <div>
                                    <label for="option1" class=" text-right control-label col-form-label">
                                        <input type="checkbox" class="filled-in chk-col-indigo material-inputs explenation" id="explenation">
                                        <label style="font-size: .9rem;" for="explenation">Answer Explenation</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row exl" style="display: none;" id="explenation-show">
                                <label for="question" class="col-sm-3 text-right control-label col-form-label">Explenation :</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" placeholder="Type Answer Explenation here." name="explenation[]"></textarea>
                                </div>
                            </div>
                            <div id="newQ">
                            </div>
                            <div class="form-group pt-4">
                                <label for="option1" class="col-sm-12 text-center control-label col-form-label">
                                    <a class="waves-effect waves-light" id="createNewQ" href="">Add another Question</a>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Create Quiz</button>
                        <a class="btn btn-success waves-effect waves-light text-white" href="{{url('quiz/list')}}">Go to Quiz List</a>
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
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $(document).on('change', '#category', function() {
            // alert('Hello');
            var cid = $(this).val();
            // var id = $('#topic').val();
            // var tid = $('#showsubtopic').val();
            var tid = $("#selectedCid").val();
            // alert(cid + tid);
            if (tid != 0) {
                questions(tid, cid);
            }
            else{
                // questions(tid,'');
            }
            // if ($(this).val() == 0) {
            //     questions(id, '');
            //     console.log('Nothing..');

            // } else {
            //     if (id != 0 && tid != "") {
            //         questions(tid, cid);
            //     } else if (id != 0 && tid == "") {
            //         questions(id, cid);
            //     } else {
            //         console.log('Select Topic')
            //     }
            // }
        });

        $(document).on('change', '#topic', function() {
            // alert('world');
            var id = $(this).val();
            var cid = $('#category').val();
            if (id == 0) {
                console.log('Nothing Topic')
            } else {
                if (cid == 0) {
                    questions(id, '');
                } else {
                    questions(id, cid)
                }
            }


        })
        $(document).on('change', '#showsubtopic', function() {
            // alert('world');
            var id = $(this).val();
            var cid = $('#category').val();
            if (id == 0) {
                console.log('Nothing Topic')
            } else {
                if (cid == 0) {
                    questions(id, '');
                } else {
                    questions(id, cid)
                }
            }


        })

        function questions(id, cid) {
            var url = '';
            if (cid == '') {
                url = "{{url('quiz/list')}}/" + id;
            } else {
                url = "{{url('quiz/list')}}/" + id + '/' + cid;
            }
            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {
                    console.log('Before Send');
                },
                success: function(data) {
                    $('#viewData').addClass('d-flex');
                    $('#viewData').html(data);
                    console.log(data);
                },
                complete: function() {
                    console.log('Completed');
                }
            })
        }

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
            var mid = $(this).attr('data-id');
            var NOP = $('#' + mid + '-show').val();
            var option = $(this).attr('data-option');
            var answer = $(this).attr('data-answer');
            // alert(name);
            var id = $(this).attr('id');
            var data = '';
            for (i = 0; i < NOP; i++) {
                data += `<div class="form-group row">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label"><i class="ti-close remove" style="color:red;cursor:pointer;"></i> Option :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control inpoption" id="option" name="${option}" placeholder="Enter Option" required>
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="${answer}" class="hi" value="0">
                                <input type="checkbox" class="chk" data-on-text="Yes" data-off-text="No" data-size="normal" />
                            </div>
                        </div>`;
            }

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
                <h3 class="text-center pb-2">New Question <i class="ti-close removeQ" style="color:red;cursor:pointer;"></i></h3>
                <div class="form-group row">
                    <label for="question" class="col-sm-3 text-right control-label col-form-label">Question :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="question" placeholder="Type Question here." name="question[]" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="option1" class="col-sm-3 text-right control-label col-form-label">Option :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control inpoption" id="option" name="option${eid}[]" placeholder="Enter Option" required>
                    </div>
                    <div class="col-sm-1 bt-switch">
                        <input type="hidden" name="answer${eid}[]" class="hi" value="0">
                        <input type="checkbox" class="chk" data-on-text="Yes" data-off-text="No" data-size="normal" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="option1" class="col-sm-3 text-right control-label col-form-label"> Option :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control inpoption" id="option" name="option${eid}[]" placeholder="Enter Option" required>
                    </div>
                    <div class="col-sm-1 bt-switch">
                        <input type="hidden" name="answer${eid}[]" class="hi" value="0">
                        <input type="checkbox" class="chk" data-on-text="Yes" data-off-text="No" data-size="normal" />
                    </div>
                </div>
                <div id="createNew${eid}-show">

                </div>

                <div class="d-flex justify-content-center form-group">
                    <div class="pr-3">
                        <select class="form-control custom-select" id="NoOP${eid}-show">
                            <option value="1">Select No. of Options Added</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="pr-3">
                        <label for="option1" class="text-right control-label col-form-label">
                            <a class="waves-effect waves-light createNew" data-option="option${eid}[]" data-answer="answer${eid}[]" id="createNew${eid}" data-id="NoOP${eid}" href="">Add New Option</a>
                        </label>
                    </div>
                    <div>
                        <label for="option1" class="text-right control-label col-form-label">
                            <input type="checkbox" class="filled-in chk-col-indigo material-inputs explenation" id="explenation${eid}">
                            <label style="font-size: .9rem;" for="explenation${eid}">Answer Explenation</label>
                        </label>
                        
                    </div>
                </div>
                <div class="form-group row" style="display: none;" id="explenation${eid}-show">
                    <label for="question" class="col-sm-3 text-right control-label col-form-label">Explenation :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Type Answer Explenation here." name="explenation[]"></textarea>
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
                $('#selectedTopic').html('');
            } else {
                // $('.topicls').removeClass('activeli');
                // $(this).addClass('activeli');
                // alert($(this).attr('data-cid'));

                $('.topicls').removeClass('activeli');
                $(this).addClass('activeli');
                $('#selectedCid').val($(this).attr('data-cid'));
                $('#selectedTopic').html($(this).text());
                var cid = $('#category').val();
                var tid = $(this).attr('data-cid');
                if (cid == "") {
                    questions(tid, '');
                } else {
                    questions(tid, cid)
                }
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