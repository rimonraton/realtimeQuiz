@foreach($Questions as $q)
<div class="col-md-4 col-sm-4 p-3">
    <div class="list-group">
        <a class="list-group-item active text-white">{{$q->question_text}}</a>
        @foreach($q->options as $qo)
        <a class="list-group-item">{{$qo->option}}<span class="badge float-right text-primary">{{$qo->correct ==1?'✓':''}}</span></a>
        @endforeach
    </div>
</div>
@endforeach