<ul aria-expanded="false" class="collapse first-level">
    @foreach($menu as $m)
        @if(in_array($m->id, $menuIdArray) || $role->role_name == 'Super Admin')
        <li class="sidebar-item">
            <a href="{{$m->router_name != null ? route($m->router_name) :'javascript:void(0)'}}" class="sidebar-link {{count($m->childs)?'has-arrow':''}}">
                <i class="mdi mdi-library-books"></i>
                <span class="hide-menu"> {{$lang=='gb'?$m->name:$m->bn_name}}</span>
            </a>
            @if(count($m->childs))
                @include('Admin.Partial.__partialsidemenu',['menu'=>$m->childs,'menuIdArray'=>$menuIdArray])
            @endif
        </li>
        @endif
    @endforeach
</ul>
