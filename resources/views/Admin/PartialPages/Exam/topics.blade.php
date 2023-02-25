@php $lang = App::getLocale(); @endphp
<div class="row justify-content-center">
@foreach($questionHasTopics as $quesHasTopic)
    <div class="checkbox checkbox-info col-6 py-2">
        <input type="checkbox" value="{{$quesHasTopic->id}}" data-name="{{$quesHasTopic->name}}" data-bnname="{{$quesHasTopic->bn_name}}" id="chcQ{{$quesHasTopic->id}}" class="material-inputs aqchk">
        <label for="chcQ{{$quesHasTopic->id}}">{{$lang == 'gb' ? ($quesHasTopic->name ? $quesHasTopic->name : $quesHasTopic->bn_name) : ($quesHasTopic->bn_name ? $quesHasTopic->bn_name : $quesHasTopic->name)}}</label>
        <input type="number" class="d-none advanceNoq" data-id="{{$quesHasTopic->id}}" id="noqOfQ_{{$quesHasTopic->id}}" max="{{$quesHasTopic->questions_count}}">
    </div>
@endforeach
</div>
<div class="row mt-4 justify-content-center" id="topic_pagination">
    {{$questionHasTopics->links()}}
</div>
