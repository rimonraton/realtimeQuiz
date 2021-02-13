<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">{{__('msg.adminDashboard')}}</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false">
                    <i class="mdi mdi-gauge"></i>
                    <span class="hide-menu">{{__('msg.dashboard')}}</span>
                </a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu">{{__('msg.questions')}}</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('question/list')}}" class="sidebar-link"><i class="mdi mdi-library-books"></i><span class="hide-menu"> {{__('msg.questionsList')}} </span></a></li>
                    <li class="sidebar-item"><a href="{{url('question/create')}}" class="sidebar-link"><i class="mdi mdi-library-books"></i><span class="hide-menu"> {{__('msg.createQuestion')}} </span></a></li>
                    <li class="sidebar-item"><a href="{{url('question/category')}}" class="sidebar-link"><i class="mdi mdi-library-books"></i><span class="hide-menu">{{__('msg.questionsTopics')}}</span></a></li>
                    <li class="sidebar-item"><a href="{{url('questionTypelist')}}" class="sidebar-link"><i class="mdi mdi-library-books"></i><span class="hide-menu">{{__('msg.questionsType')}}</span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">{{__('msg.quiz')}}</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('quiz/view/list')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> {{__('msg.quizList')}} </span></a></li>
                    <li class="sidebar-item"><a href="{{url('quiz/create')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> {{__('msg.createquiz')}} </span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu">{{__('msg.game')}}</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('game/setup')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> {{__('msg.gameSetup')}} </span></a></li>
                    <li class="sidebar-item"><a href="{{url('game/perform-message')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu">{{__('msg.performMsg')}}</span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">{{__('msg.team')}}</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('teamlist')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> {{__('msg.teamSetup')}} </span></a></li>
                    <!-- <li class="sidebar-item"><a href="{{url('')}}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Perform Message Setup</span></a></li> -->
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('features')}}" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="hide-menu">{{__('msg.features')}}</span></a></li>
            <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Participants</span></a></li> -->
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('profile')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">{{__('msg.profile')}}</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-lock"></i><span class="hide-menu">{{__('msg.security')}}</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{url('rolelist')}}" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu">{{__('msg.roles')}}</span></a></li>
                    <li class="sidebar-item"><a href="{{url('assignRoleList')}}" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu">{{__('msg.assignRoll')}}</span></a></li>
                </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('payment')}}" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span class="hide-menu">{{__('msg.payment')}}</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('menu')}}" aria-expanded="false"><i class="mdi mdi-menu"></i><span class="hide-menu">{{__('msg.menu_setup')}}</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">{{__('msg.logout')}}</span></a></li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>