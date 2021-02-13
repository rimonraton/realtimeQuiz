<ul aria-expanded="false" class="collapse first-level">
    @foreach($menu as $m)
    @if(in_array($m->id, $menuIdArray))
    <li class="sidebar-item">
        <a href="{{url($m->action)}}" class="sidebar-link">
            <i class="mdi mdi-library-books"></i>
            <span class="hide-menu"> {{$lang=='gb'?$m->name:$m->bn_name}}</span>
        </a>
    </li>
    @endif
    @endforeach
</ul>