<ol class="dd-list">
    @foreach($category as $c)
        <li class="dd-item">
            <div class="dd-handle-new" data-cid="{{$c->id}}">
                @if( ! count($c->childs))
                    <input type="checkbox" value="{{$c->id}}"
                           name="topic" id="topic{{$c->id}}"
                           data-name="{{$lang=='gb'?$c->name:$c->bn_name}}"
                           data-qCount="{{$c->questions_count}}"
                           class="material-inputs programming">
                @endif
                <label class="" for="topic{{$c->id}}">
                    {{$lang=='gb'?$c->name:$c->bn_name }}
                    @if( ! count($c->childs))
                        <span class="badge badge-pill badge-info float-right">
                                                                                    {{$lang=='gb'? $c->questions_count : $bang->bn_number($c->questions_count)}}
                                                                                </span>
                    @endif
                </label>

            </div>
            @if(count($c->childs))
                {{--                                                                        {{dd($c->childs)}}--}}
                @include('Admin.Games._subtopic', ['category'=>$c->childs])
            @endif
        </li>
    @endforeach
</ol>
