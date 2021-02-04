<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">Admin Dashboard</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false">
                    <i class="mdi mdi-gauge"></i>
                    <span class="hide-menu">Dashboard </span>
                </a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu">Questions</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('question/list')}}" class="sidebar-link"><i class="mdi-library-books"></i><span class="hide-menu"> List Of Questions </span></a></li>
                    <li class="sidebar-item"><a href="{{url('question/create')}}" class="sidebar-link"><i class="mdi-library-books"></i><span class="hide-menu"> Create Questions </span></a></li>
                    <li class="sidebar-item"><a href="{{url('question/category')}}" class="sidebar-link"><i class="mdi-library-books"></i><span class="hide-menu">Questions Topics</span></a></li>
                    <li class="sidebar-item"><a href="{{url('questionTypelist')}}" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu">Questions Type</span></a></li>

                    <!-- <li class="sidebar-item"><a href="{{url('question/subtopic')}}" class="sidebar-link"><i class="mdi-library-books"></i><span class="hide-menu">Sub Topics</span></a></li> -->
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Quiz</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('quiz/view/list')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> List Of Quiz </span></a></li>
                    <li class="sidebar-item"><a href="{{url('quiz/create')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Create Quiz </span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu">Game</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('game/setup')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Game Setup </span></a></li>
                    <li class="sidebar-item"><a href="{{url('game/perform-message')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Perform Message Setup</span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Team</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('teamlist')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Team Setup </span></a></li>
                    <!-- <li class="sidebar-item"><a href="{{url('')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Perform Message Setup</span></a></li> -->
                </ul>
            </li>
            @if(Auth()->user()->roleuser->role->id == 5)
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('features')}}" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="hide-menu">Features</span></a></li>
            @endif
            <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Participants</span></a></li> -->

            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('profile')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-lock"></i><span class="hide-menu">Security</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    @if(Auth()->user()->roleuser->role->id == 5)
                    <li class="sidebar-item"><a href="{{url('rolelist')}}" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu">Roles</span></a></li>
                    @endif
                    <li class="sidebar-item"><a href="{{url('assignRoleList')}}" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu">Assign Role</span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>