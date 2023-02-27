@php $lang = App::getLocale(); @endphp
<div class="row justify-content-center">
@foreach($questionHasTopics as $quesHasTopic)
    <div class="checkbox checkbox-info col-6 py-2">
{{--        <input type="checkbox" value="{{$quesHasTopic->id}}" data-name="{{$quesHasTopic->name}}" data-bnname="{{$quesHasTopic->bn_name}}" id="chcQ{{$quesHasTopic->id}}" class="material-inputs aqchk">--}}
{{--        <label for="chcQ{{$quesHasTopic->id}}">{{$lang == 'gb' ? ($quesHasTopic->name ? $quesHasTopic->name : $quesHasTopic->bn_name) : ($quesHasTopic->bn_name ? $quesHasTopic->bn_name : $quesHasTopic->name)}}</label>--}}
{{--        <input type="number" class="d-none advanceNoq" data-id="{{$quesHasTopic->id}}" id="noqOfQ_{{$quesHasTopic->id}}" max="{{$quesHasTopic->questions_count}}">--}}
        <div class="form-check">
            <input class="form-check-input material-inputs chkparent" type="checkbox" data-tid="{{$quesHasTopic->id}}" value="{{$quesHasTopic->id}}" id="topicparent{{$quesHasTopic->id}}">
            <label class="form-check-label" for="topicparent{{$quesHasTopic->id}}">
                {{$quesHasTopic->name}}
            </label>
            <div id="topicChild{{$quesHasTopic->id}}" class="d-none parent">
                <div class="form-check py-1">
                    <input class="form-check-input material-inputs difficulty" type="checkbox" value="{{$quesHasTopic->id}}" data-name="{{$quesHasTopic->name}}" data-bnname="{{$quesHasTopic->bn_name}}" data-difficultyValue="1" data-difficulty="easy" id="easy{{$quesHasTopic->id}}">
                    <label class="form-check-label" for="easy{{$quesHasTopic->id}}">
                        Easy
                    </label>
                    <input type="number" class="advanceNoQ d-none" data-id="easy{{$quesHasTopic->id}}" min="0" max="{{$quesHasTopic->easy_count}}">
                </div>
                <div class="form-check py-1">
                    <input class="form-check-input material-inputs difficulty" type="checkbox" value="{{$quesHasTopic->id}}" data-name="{{$quesHasTopic->name}}" data-bnname="{{$quesHasTopic->bn_name}}" data-difficultyValue="2"  data-difficulty="intermediate" id="intermediate{{$quesHasTopic->id}}">
                    <label class="form-check-label" for="intermediate{{$quesHasTopic->id}}">
                        Intermediate
                    </label>
                    <input type="number" class="advanceNoQ d-none" data-id="intermediate{{$quesHasTopic->id}}" min="0" max="{{$quesHasTopic->intermidiate_count}}">
                </div>
                <div class="form-check py-1">
                    <input class="form-check-input material-inputs difficulty" type="checkbox" value="{{$quesHasTopic->id}}" data-name="{{$quesHasTopic->name}}" data-bnname="{{$quesHasTopic->bn_name}}" data-difficultyValue="3" data-difficulty="difficult" id="difficult{{$quesHasTopic->id}}">
                    <label class="form-check-label" for="difficult{{$quesHasTopic->id}}">
                        Difficult
                    </label>
                    <input type="number" class="advanceNoQ d-none" data-id="difficult{{$quesHasTopic->id}}" min="0" max="{{$quesHasTopic->difficult_count}}">
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
<div class="row mt-4 justify-content-center" id="topic_pagination">
    {{$questionHasTopics->links()}}
</div>

{{--<div class="form-check">--}}
{{--    <input class="form-check-input material-inputs chkparent" type="checkbox" value="" id="topicparent{{$questionHasTopics[0]->id}}">--}}
{{--    <label class="form-check-label" for="topicparent{{$questionHasTopics[0]->id}}">--}}
{{--        {{$questionHasTopics[0]->name}}--}}
{{--    </label>--}}
{{--    <div id="topicChild{{$questionHasTopics[0]->id}}" class="d-none">--}}
{{--        <div class="form-check py-1">--}}
{{--            <input class="form-check-input material-inputs difficulty" type="checkbox" value="" id="easy{{$questionHasTopics[0]->id}}">--}}
{{--            <label class="form-check-label" for="easy{{$questionHasTopics[0]->id}}">--}}
{{--                Easy--}}
{{--            </label>--}}
{{--            <input type="number" class="advanceNoq d-none">--}}
{{--        </div>--}}
{{--        <div class="form-check py-1">--}}
{{--            <input class="form-check-input material-inputs difficulty" type="checkbox" value="" id="intermediate{{$questionHasTopics[0]->id}}">--}}
{{--            <label class="form-check-label" for="intermediate{{$questionHasTopics[0]->id}}">--}}
{{--                Intermediate--}}
{{--            </label>--}}
{{--            <input type="number" class="advanceNoq d-none">--}}
{{--        </div>--}}
{{--        <div class="form-check py-1">--}}
{{--            <input class="form-check-input material-inputs difficulty" type="checkbox" value="" id="difficult{{$questionHasTopics[0]->id}}">--}}
{{--            <label class="form-check-label" for="difficult{{$questionHasTopics[0]->id}}">--}}
{{--                Difficult--}}
{{--            </label>--}}
{{--            <input type="number" class="advanceNoq d-none">--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}

