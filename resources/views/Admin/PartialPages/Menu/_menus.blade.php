@php $lang = App::getLocale(); @endphp
@foreach($menu as $mc)
    <ul class="list-group m-3">
        <li class="list-group-item">
            <!-- <div class="col-md-12"> -->
            <input type="checkbox" value="{{$mc->id}}" id="child{{$mc->id}}" name="menu[]" class="material-inputs child">
            <label for="child{{$mc->id}}">{{$lang=='gb'?$mc->name:$mc->bn_name}}</label>
            <!-- </div> -->
            @if(count($mc->childs))
                @include('Admin.PartialPages.Menu._menus',['menu'=>$mc->childs])
            @endif
        </li>
    </ul>
@endforeach
