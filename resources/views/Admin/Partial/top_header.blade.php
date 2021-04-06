@php $lang = App::getLocale(); @endphp
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="#">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{asset(auth()->user()->admin->photo)}}" width="50px" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{asset(auth()->user()->admin->photo)}}" width="50px" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <span class="dark-logo" onclick="window.location='{{url('dashboard')}}'">{{__('msg.slogan')}}</span>
                    <!-- <img src="{{asset('Admin/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" /> -->
                    <!-- Light Logo text -->
                    <span class="light-logo" onclick="window.location='{{url('dashboard')}}'">{{__('msg.slogan')}}</span>
                    <!-- <img src="{{asset('Admin/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /> -->
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto float-left">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul class="list-style-none">
                            <li>
                                <div class="border-bottom rounded-top py-3 px-4">
                                    <h5 class="mb-0 font-weight-medium">Notifications</h5>
                                </div>
                            </li>
                            <li>
                                <div class="message-center notifications position-relative" style="height:250px;">
                                    <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-danger rounded-circle btn-circle"><i class="fa fa-link"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">Notification 1</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my new admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-success rounded-circle btn-circle"><i class="ti-calendar"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">Notifications 2</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just a reminder that you have event</span> <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-success rounded-circle btn-circle"><i class="ti-calendar"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">Notifications 2</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just a reminder that you have event</span> <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link">
                        @if($lang == 'gb')
                            @if(auth()->user()->admin->institute_name != null)
                            {{auth()->user()->admin->institute_name}}
                            @else
                                {{auth()->user()->admin->bn_institute_name}}
                            @endif
                        @else
                            @if(auth()->user()->admin->bn_institute_name != null)
                                {{auth()->user()->admin->bn_institute_name}}
                            @else
                                {{auth()->user()->admin->institute_name}}
                            @endif
                        @endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark lang" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Choose Language">
                        <img src="https://www.countryflags.io/{{ session('locale', config('app.locale')) }}/flat/24.png">
                        <i class="fas fa-angle-down" style="color: black;"></i>
                            <!-- <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up" style="width: 200px;">
                        <ul class="list-style-none">
                            <li>
                                <div class="message-center notifications position-relative" style="height:82px;">
                                    <!-- <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-danger rounded-circle btn-circle"><i class="fa fa-link"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">Notification 1</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my new admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                        </div>
                                    </a> -->
                                    <a href="{{ url('setLanguage/gb') }}" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <img src="https://www.countryflags.io/gb/flat/24.png">
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">{{ __('msg.english') }}</h5>
                                        </div>

                                    </a>
                                    <a href="{{ url('setLanguage/bd') }}" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <img src="https://www.countryflags.io/bd/flat/24.png">

                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h5 class="message-title mb-0 mt-1">{{ __('msg.bangla') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset(auth()->user()->avatar?auth()->user()->avatar:'Admin/assets/images/users/1.png')}}" alt="user" width="30" class="profile-pic rounded-circle" />
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                        <ul class="dropdown-user list-style-none">
                            <li>
                                <div class="dw-user-box p-3 d-flex">
                                    <div class="u-img"><img src="{{asset(auth()->user()->avatar?auth()->user()->avatar:'Admin/assets/images/users/1.png')}}" alt="user" class="rounded" width="80"></div>
                                    <div class="u-text ml-2">
                                        <h4 class="mb-0">{{auth()->user()->name}}</h4>
                                        <p class="text-muted mb-1 font-14">{{auth()->user()->email}}</p>
                                        <a href="{{url('profile')}}" class="btn btn-rounded btn-danger btn-sm text-white d-inline-block">
                                            {{__('msg.showProfile')}}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="dropdown-divider"></li>
                            <li class="user-list"><a class="px-3 py-2" href="{{url('profile')}}"><i class="ti-user"></i> {{__('msg.profile')}}</a></li>
                            <li class="user-list"><a class="px-3 py-2" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> {{__('msg.logout')}}</a></li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
