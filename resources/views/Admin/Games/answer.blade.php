
<div class="row d-flex justify-content-center">
@foreach($all_answers as $ans)
    <div class="col-md-6 col-sm-6 p-3">
        <div class="list-group">
            <p class="list-group-item bg-secondary text-white">{{$ans->question}}</p>
            <p class="list-group-item"> {{__('games.correct_answer')}}: <strong style="font-weight: bold" class="text-success"> {{$ans->answer}} </strong><span class="badge float-right text-primary">✓</span></p>
            <p class="list-group-item">{{__('games.given_answer')}}: <span class="{{$ans->isCorrect?'text-primary':'text-danger'}}"> {{$ans->selected}}</span>
                <span class="badge float-right {{$ans->isCorrect?'text-primary':'text-danger'}}">{{$ans->isCorrect?'✓':'X'}}</span>
            </p>
            <div class="list-group-item">
                {{__('games.answered_by')}}: <span style="font-weight: bold"> {{$ans->user->name}}</span>
            </div>
        </div>
    </div>
@endforeach
</div>
