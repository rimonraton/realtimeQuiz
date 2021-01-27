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
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Quiz List <a class="btn btn-success float-right" href="{{url('quiz/create')}}">Create Quiz</a></h4>
                <hr>
                <div class="d-flex flex-row bd-highlight mb-3 justify-content-center">
                    <div class=" bd-highlight pt-3">Topic :</div>
                    <div class="p-2 bd-highlight w-50">
                        <select class="form-control custom-select category" id="topic">
                            <option value="0">Select Topic</option>
                            @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="viewData"></div>

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
            $('#topic').val(getId);
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
                    success: function(data) {
                        $('#viewData').html(data);
                        console.log(data);
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
    })
</script>
@endsection