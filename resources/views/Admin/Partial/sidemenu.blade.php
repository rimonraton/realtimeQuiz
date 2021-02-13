@php
$rm = auth()->user()->roleuser->rolemenu;
if($rm)
{
    $menuIdArray = explode(',', $rm->menu_id);
}
else
{
    $menuIdArray = array("1");
}
$menu =\App\Menu::where('parent_id',0)->get();
$lang = App::getLocale();
@endphp
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">{{__('msg.adminDashboard')}}</span>
            </li>
            @foreach($menu as $m)
            @if(in_array($m->id, $menuIdArray))
            <li class="sidebar-item">
                <a class="sidebar-link {{count($m->childs)?'has-arrow':''}} waves-effect waves-dark" href="{{$m->action? url($m->action) :'javascript:void(0)'}}" aria-expanded="false">
                    <i class="{{$m->icon}}"></i>
                    <span class="hide-menu">{{$lang=='gb'?$m->name:$m->bn_name}}</span>
                </a>
                @if(count($m->childs))
                @include('Admin.Partial.__partialsidemenu',['menu'=>$m->childs,'menuIdArray'=>$menuIdArray])
                @endif
            </li>
            @endif
            @endforeach

            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">{{__('msg.logout')}}</span></a></li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>