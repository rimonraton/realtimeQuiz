<ol class="dd-list">
    @foreach($category as $c)
    <li class="dd-item " >
        <div class="dd-handle-new topicls" data-cid="{{$c->id}}">
{{--            <input type="checkbox" name="topic" value="{{$c->id}}" data-name="{{$lang=='gb'?$c->name:$c->bn_name}}" id="" class="programming">--}}
            {{$lang=='gb'?$c->name:$c->bn_name}}
        </div>
        @if(count($c->childs))
        @include('Admin.PartialPages.Questions._subtopic', ['category'=>$c->childs])
        @endif
    </li>
    @endforeach
</ol>
