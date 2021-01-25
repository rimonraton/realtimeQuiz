@extends('Admin.Layout.dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{url('quiz/update')}}">
                    @csrf
                    <input type="hidden" value="{{$quiz->id}}" name="quiz_id" id="">
                    <h4 class="card-title text-center">Quiz Name : {{$quiz->quiz_name}}</h4>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        @foreach($Questions as $q)
                        <div class="col-md-4 col-sm-4 p-3" id="q_{{$q->id}}">
                            <div class="list-group">
                                <p class="list-group-item active text-white">{{$q->question_text}} <a class="" data-id="{{$q->id}}" href="{{url('quiz/'.$quiz->id.'/'.$q->id.'/delete')}}"> <input type="hidden" value="{{$q->id}}" name="questions[]" id=""><i class="fas fa-trash text-danger"></i></a></p>
                                @foreach($q->options as $qo)
                                <a class="list-group-item">{{$qo->option}}<span class="badge float-right text-primary">{{$qo->correct ==1?'✓':''}}</span></a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-info waves-effect">Update</button> -->
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
    })
</script>
@endsection