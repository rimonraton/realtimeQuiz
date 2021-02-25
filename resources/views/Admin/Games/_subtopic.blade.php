<ol class="dd-list">
    @foreach($category as $c)
        <li class="dd-item " >
            <div class="dd-handle-new" data-cid="{{$c->id}}">
                <input type="checkbox" value="{{$c->id}}"
                       name="topic" id="topic{{$c->id}}"
                       data-name="{{$lang=='gb'?$c->name:$c->bn_name}}"
                       data-qCount="{{$c->questions->count()}}"
                       class="material-inputs programming">
                <label class="" for="topic{{$c->id}}">
                    {{$lang=='gb'?$c->name:$c->bn_name}}
                    <span class="badge badge-pill badge-info float-right">{{$c->questions->count()}}</span>
                </label>
            </div>
            @if(count($c->childs))
                @include('Admin.Games._subtopic', ['category'=>$c->childs])
            @endif
        </li>
    @endforeach
</ol>
