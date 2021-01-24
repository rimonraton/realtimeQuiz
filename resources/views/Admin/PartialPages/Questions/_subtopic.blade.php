<ol class="dd-list">
    @foreach($category as $c)
    <li class="dd-item " >
        <div class="dd-handle-new topicls" data-cid="{{$c->id}}"> {{$c->name}} </div>
        @if(count($c->childs))
        @include('Admin.PartialPages.Questions._subtopic', ['category'=>$c->childs])
        @endif
    </li>
    @endforeach
</ol>