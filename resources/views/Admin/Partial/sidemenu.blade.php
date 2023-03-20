@php
    $data = \Permission::getMenus();
@endphp
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">{{$data['lang']=='gb'?$data['role']->role_name:$data['role']->bn_role_name}} {{__('msg.dashboard')}}</span>
            </li>
            @foreach($data['menu'] as $m)
                @if(in_array($m->id, $data['menuIdArray']) || $data['role']->role_name == 'Super Admin')
                <li class="sidebar-item">
                    <a class="sidebar-link {{count($m->childs->where('show_menu', 1))?'has-arrow':''}} waves-effect waves-dark" href="{{$m->router_name? route($m->router_name) :'javascript:void(0)'}}" aria-expanded="false">
                        <i class="{{$m->icon}}"></i>
                        <span class="hide-menu">{{$data['lang']=='gb'?$m->name:$m->bn_name}}</span>
                    </a>
                    @if(count($m->childs->where('show_menu', 1)))
                    @include('Admin.Partial.__partialsidemenu',['menu'=>$m->childs->where('show_menu', 1),'menuIdArray'=>$data['menuIdArray'], 'role' => $data['role'], 'lang' => $data['lang']])
                    @endif
                </li>
                @endif
            @endforeach
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false">
                    <i class="mdi mdi-directions"></i><span class="hide-menu">{{__('msg.logout')}}</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
