<h4 class="card-title text-center">{{__('form.quiz_name_label')}} : {{$q->quiz_name?$q->quiz_name:$q->bd_quiz_name}}</h4>
<hr>
<!-- <div class="row d-flex justify-content-center" id="QuestionLoad"> -->
<div class="row d-flex justify-content-center">

    @foreach($Questions as $q)
    <div class="col-md-4 col-sm-4 p-3">
        <div class="list-group">
            <a class="list-group-item active text-white">{{$q->question_text?$q->question_text:$q->bd_question_text}}</a>
            @foreach($q->options as $qo)
            <a class="list-group-item">{{$qo->option?$qo->option:$qo->bd_option}}<span class="badge float-right text-primary">{{$qo->correct ==1?'✓':''}}</span></a>
            @endforeach
        </div>
    </div>
    @endforeach
</div>