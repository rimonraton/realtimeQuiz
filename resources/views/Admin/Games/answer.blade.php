
<div class="row d-flex justify-content-center">
@foreach($all_answers as $ans)
    <div class="col-md-6 col-sm-6 p-3">
        <div class="list-group">
            <a class="list-group-item active text-white">{{$ans->question}}</a>
            <a class="list-group-item">Answer: {{$ans->answer}}<span class="badge float-right text-primary">✓</span></a>
            <a class="list-group-item">Given Answer: {{$ans->selected}}
                <span class="badge float-right {{$ans->isCorrect?'text-primary':'text-danger'}}">{{$ans->isCorrect?'✓':'X'}}</span>
            </a>
        </div>
    </div>
@endforeach
</div>
