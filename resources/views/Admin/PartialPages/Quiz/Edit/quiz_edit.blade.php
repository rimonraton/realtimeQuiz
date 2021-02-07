@extends('Admin.Layout.dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{url('quiz/update')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" value="{{$quiz->id}}" name="quiz_id" id="">
                    <input type="hidden" value="{{$quiz->category_id}}" name="category_id" id="">
                    <div class="form-group row">
                        <label for="quizName" class="col-sm-3 text-right control-label col-form-label">Quiz Name in English:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$quiz->quiz_name}}" id="quizName" placeholder="Type Quiz name here in English." name="quizName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quizName" class="col-sm-3 text-right control-label col-form-label">Quiz Name in Bangla:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$quiz->bd_quiz_name}}" id="bdquizName" placeholder="Type Quiz name here in Bangla." name="bdquizName" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        @foreach($Questions as $q)
                        <div class="col-md-4 col-sm-4 p-3" id="q_{{$q->id}}">
                            <div class="list-group">
                                <p class="list-group-item active text-white">{{$q->question_text?$q->question_text:$q->bd_question_text}} <a class="" data-id="{{$q->id}}" href="{{url('quiz/'.$quiz->id.'/'.$q->id.'/delete')}}"> <input type="hidden" value="{{$q->id}}" name="questions[]" id=""><i class="fas fa-trash text-danger"></i></a></p>
                                @foreach($q->options as $qo)
                                <a class="list-group-item">{{$qo->option?$qo->option:$qo->bd_option}}<span class="badge float-right text-primary">{{$qo->correct ==1?'✓':''}}</span></a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="newQuestion">
                        
                    </div>
                    <div class="form-group text-center">
                    <a class="addNew" style="color: #009efb;cursor:pointer;">New Question</a>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-info addNew">New Question</button> -->
                        <button type="submit" class="btn btn-info waves-effect">Update</button>
                        <a href="{{url('quiz/view/list').'/'.$quiz->category_id}}">Go Back</a>
                        <!-- <a type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</a> -->
                    </div>
                </form>
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
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $('#topic').on('change', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{url('quiz/quiz/list')}}/" + id,
                type: "GET",
                success: function(data) {
                    $('#viewData').html(data);
                    console.log(data);
                }
            })
        })

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
        $('.qdelete').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            // var qid = "#q__" + id;
            // $(this).remove();
            $(this).closest("div.row").find("#q_" + id).remove();
        })

        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            if (state == true) {
                $(this).closest("div.bt-switch").find(".hi").val('1');
            } else {
                $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
            }
        });
        $(document).on('click', '.createNew', function(e) {
            e.preventDefault();
            var option = $(this).attr('data-option');
            var answer = $(this).attr('data-answer');
            var id = $(this).attr('id');
            var data = '';
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

            $('#' + id + '-show').append(data);
            $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        });

        $(document).on('click', '.remove', function() {
            $(this).closest('.row').remove();
        });
        $(document).on('click', ".explenation", function() {
            var id = $(this).attr('id');
            if (this.checked) {
                $('#' + id + '-show').show();
            } else {
                $('#' + id + '-show').hide();
            }
        });
        var eid = -1;
        $('.addNew').on('click', function(e) {
            // e.preventDefault();
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
                        <input type="text" class="form-control inpoption" name="option${eid}[]" placeholder="Enter Option" required>
                    </div>
                    <div class="col-sm-1 bt-switch">
                        <input type="hidden" name="answer${eid}[]" class="hi" value="0">
                        <input type="checkbox" class="chk" data-on-text="Yes" data-off-text="No" data-size="normal" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="option1" class="col-sm-3 text-right control-label col-form-label"> Option :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control inpoption" name="option${eid}[]" placeholder="Enter Option" required>
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
            $('#newQuestion').append(data);
            $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        });

        $(document).on('click', '.removeQ', function() {
            $(this).closest('.NQ').remove();
        });
    })
</script>
@endsection