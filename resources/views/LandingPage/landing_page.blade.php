<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gyankosh</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('images/favicon.png')}}" rel="icon">
    <link href="{{asset('images/favicon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="{{asset('css/theme-site.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
        .task {
            /* box-shadow: 0 0 2px #007bff;  */
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            /* perspective: 800px; */
            transform-style: preserve-3d;
        }

        .abstract,
        .details {
            width: 100%;
            padding: 15px 30px;
            position: relative;
        }

        .task:hover .abstract,
        .task:hover .details {
            /* background: #fafafa; */
        }

        .abstract {
            transition: 0.3s ease all;
        }

        .details {
            /* background: linear-gradient(to left, #FF512F, #DD2476);  */
            color: white;
            max-height: 0;
            padding: 0;
            overflow: hidden;
            visibility: visible;
            transform: rotateX(-180deg);
            transform-origin: top center;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transition: 0.3s transform ease;
        }

        .details:before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: grey;
        }

        .task:hover .details {
            max-height: 200px;
            overflow: auto;
            visibility: visible;
            transform: rotateX(0deg);
        }

        .details__inner {
            /* padding: 15px 30px; */
        }

        h5 a {
            color: #3d3b3b;
        }

        a:hover {
            text-decoration: none !important;
        }

        .mixer {
            color: #7b4397;
            /* fallback for old browsers */
            color: -webkit-linear-gradient(to right, #dc2430, #7b4397);
            /* Chrome 10-25, Safari 5.1-6 */
            color: linear-gradient(to right, #dc2430, #7b4397);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="{{url('/')}}"><span><img src="{{asset('images/logo3.png')}}" alt=""> {{__('msg.logo')}}</span></a></h1>
            </div>
            <div class="dropdown mr-5 d-md-none">
                <a class="btn btn-default dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://flagcdn.com/40x30/{{ session('locale', config('app.locale')) }}.png">
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="{{ url('setLanguage/gb') }}" class="language p-3 ">
                        <img src="https://flagcdn.com/40x30/gb.png">
                        {{ __('msg.english') }}
                    </a><br>
                    <a href="{{ url('setLanguage/bd') }}" class="language p-3 ">
                        <img src="https://flagcdn.com/40x30/bd.png">
                        {{ __('msg.bangla') }}
                    </a>
                </div>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#">{{__('msg.home')}}</a></li>
                    <li><a href="#about">{{__('msg.about')}}</a></li>
                    <li><a href="#features">{{__('msg.features')}}</a></li>
                    <li><a href="#topics">{{__('msg.topics')}}</a></li>

                    <li><a href="#contact">{{__('msg.contact')}}</a></li>
                    @guest
                    <li><a href="{{ route('register') }}" id="reg">{{__('msg.register')}}</a></li>
                    <li><a href="{{ route('login') }}" id="login">{{__('msg.login')}}</a></li>
                    @endguest
                    @auth
                    <li><a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{__('msg.logout')}}</a></li>
                    @endauth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <li class="drop-down">
                        <a href="#">
                            <img src="https://flagcdn.com/40x30/{{ session('locale', config('app.locale')) }}.png">
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('setLanguage/gb') }}" class="language">
                                    <img src="https://flagcdn.com/40x30/gb.png">
                                    {{ __('msg.english') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('setLanguage/bd') }}" class="language">
                                    <img src="https://flagcdn.com/40x30/bd.png">
                                    {{ __('msg.bangla') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="home">

        <div class="container">
            <div class="row">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1 style="font-size: 2.2em;">{{__('msg.motivation')}}</h1>
                        <h2>{{__('msg.slogan')}}</h2>
                    </div>
                </div>
                <div id="logoimg" class="col-lg-5 order-1 order-lg-2 hero-img text-md-right" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{asset('images/logobe.png')}}" class="img-fluid animated " alt="" width="115px">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-8 m-auto icon-boxes d-flex flex-column align-items-stretch justify-content-center" data-aos="fade-left">
                        <div class="video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
                            <h3 class="text-center">{{ __('msg.SGM') }}</h3>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="menu-container">


                                <div class="circle-menu-box">
                                    <p class="top-text"><strong>{{__('msg.practice')}}</strong></p>
                                    <p class="right-text"><strong>{{__('msg.challenge')}}</strong></p>
                                    <p class="left-text"> <strong>{{__('msg.team')}}</strong></p>
                                    <p class="bottom-text"><strong>{{__('msg.quizmaster')}}</strong></p>
                                    <a href="{{url('Mode/Practice')}}" class="menu-item menu-red top-cercle">
                                        <i class="fas fa-address-card text-white"></i>
                                    </a>
                                    <div class="borogoldiv d-flex justify-content-center align-items-center">
                                        <a data-url="A4jqX3Psbig" href="#" class="play-btn mb-4 yt"></a>
                                    </div>

                                    <a href="{{url('game/mode/challenge')}}" class="menu-item menu-green right-cercle">
                                        <i class="fas fa-people-arrows text-white"></i>
                                    </a>
{{--                                    exampleModal--}}
{{--                                    <a href="{{url('Mode/Moderator')}}" class="menu-item menu-blue bottom-cercle">--}}
{{--                                        <i class="fas fa-user text-white"></i>--}}
{{--                                    </a>--}}
                                    <a href="" class="menu-item menu-blue bottom-cercle alt_notify">
                                        <i class="fas fa-user text-white"></i>
                                    </a>

{{--                                    <a href="{{url('Mode/Team')}}" class="menu-item menu-purple left-cercle">--}}
{{--                                        <i class="fas fa-users text-white"></i>--}}
{{--                                    </a>--}}
                                    <a href="{{url('team_quiz')}}" class="menu-item menu-purple left-cercle">
                                        <i class="fas fa-users text-white"></i>
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
        @php
            $lang = App::getLocale();
            $bang = new \App\Lang\Bengali();
        @endphp
        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>{{__('msg.features')}}</h2>
                    <p>{{__('msg.checkfeatures')}}</p>
                </div>

                <div class="row justify-content-center" data-aos="fade-left">
                    @foreach($features as $f)
                    <div class="col-lg-6 col-md-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            {!! '<i class="'.$f->icon.'" style="color:'.$f->icon_color.'"></i>' !!}
                            <h3><a>{{$lang=='gb'?$f->gb_game_name:$f->bd_game_name}}</a></h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($f->features as $ff)
                            <li class="list-group-item">{{$lang=='gb'?$ff->gb_feature_name:$ff->bd_feature_name}}</li>
                            @endforeach
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Features Section -->
        <!-- ======= Topics Section ======= -->
        <section id="topics" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>{{__('msg.topics')}}</h2>
                    <p>{{__('msg.checktopics')}}</p>
                </div>

                <div class="row justify-content-center" data-aos="fade-left">
                    <!-- @foreach($category as $c)
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <i class="fas fa-book"></i>
                            <h3>
                                <a href="">
                                    <span>{{$lang=='gb'?$c->name:$c->bn_name}}</span>
                                </a>
                            </h3>
                        </div>
                    </div>
                    @endforeach -->

                    <div class="row justify-content-center ml-0 mb-5">
                        @foreach($category as $cat)
{{--                            @if( App\User::where('id',$cat->user_id)->first()->admin_id == 1)--}}
                        <div class="col-md-4 col-sm-12 text-center">
                            <div class="wrap my-3">
                                <div class="task">
                                    <div class="abstract tops" data-id="sub__{{$cat->id}}">
                                        <h5 class="d-flex">
                                            <span>{!! $cat->icon !!}</span>
                                            <a class="ml-2">{{ $lang=='gb'?$cat->name:$cat->bn_name }}</a>
                                            @if(count($cat->childs))
                                            <i class="fas fa-sort-down ml-auto closepanel" style="z-index: 100000;" data-rid="sub__{{$cat->id}}"></i>
                                            @endif
                                        </h5>
                                    </div>
                                    @if(count($cat->childs))
                                    <div class="details" id="sub__{{$cat->id}}">
                                        <div class="details__inner">
                                            <div id="list-example" class="list-group">
                                                @foreach($cat->childs->where('is_published',1) as $cc)
                                                <!-- <i class="fas fa-angle-right"></i> -->
                                                <a class="list-group-item list-group-item-action gb">
                                                    <i class="fas fa-check text-success"></i>
                                                    {{ $lang=='gb'?$cc->name:$cc->bn_name }}
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
{{--                            @endif--}}
                        @endforeach

                    </div>
                </div>


            </div>
        </section>
        <!-- End Topics Section -->

        <!-- ======= Counts Section ======= -->
{{--        <section id="counts" class="counts">--}}
{{--            <div class="container">--}}

{{--                <div class="row" data-aos="fade-up">--}}

{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="count-box">--}}
{{--                            <i class="fas fa-user"></i>--}}
{{--                            <span data-toggle="counter-up">1463</span>--}}
{{--                            <p>{{__('msg.participants')}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">--}}
{{--                        <div class="count-box">--}}
{{--                            <i class="fas fa-users"></i>--}}
{{--                            <span data-toggle="counter-up">521</span>--}}
{{--                            <p>{{__('msg.teams')}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">--}}
{{--                        <div class="count-box">--}}
{{--                            <i class="fas fa-brain"></i>--}}
{{--                            <span data-toggle="counter-up">200</span>--}}
{{--                            <p>{{__('msg.quiz')}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">--}}
{{--                        <div class="count-box">--}}
{{--                            <i class="fas fa-trophy"></i>--}}
{{--                            <span data-toggle="counter-up">15</span>--}}
{{--                            <p>{{__('msg.winner')}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </section>--}}
        <!-- End Counts Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="owl-carousel testimonials-carousel" data-aos="zoom-in">

                    <div class="testimonial-item">
                        <p>
                            <i class="fas fa-quote-left"></i>
                            {{$lang=='gb'?'Gyankosh':'জ্ঞানকোষ'}}
                            <i class="fas fa-quote-right"></i>
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>{{__('msg.contact')}}</h2>
                    <p>{{__('msg.checkcontact')}}</p>
                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="fas fa-map-marker-alt"></i>
                                <h4>{{__('msg.location')}}:</h4>
                                <p>@if($lang == 'gb')
                                        House: 1150, Road: 9/A, Avenue: 11
                                        Mirpur DOHS, Dhaka-1216
                                    @else
                                        বাড়িঃ ১১৫০,রোডঃ ৯/এ, এভিনিউঃ ১১
                                        মিরপুর ডিওএইচএস, ঢাকা - ১২১৬
                                    @endif</p>
                            </div>

                            <div class="email">
                                <i class="fas fa-envelope"></i>
                                <h4>{{__('msg.email')}}:</h4>
                                <p>info@gyankosh.info</p>
                            </div>

                            <div class="phone">
                                <i class="fas fa-phone"></i>
                                <h4>{{__('msg.call')}}:</h4>
                                <p>{{$lang == 'gb'?'+880 9617171125':'+৮৮০ ৯৬১৭১৭১১২৫'}}</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

                        <form action="{{url('contact')}}" method="POST" role="form" class="php-email-form">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{__('msg.contactName')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{__('msg.contactEmail')}}" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="{{__('msg.contactSubject')}}" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="{{__('msg.contactMessage')}}"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">{{__('msg.loading')}}</div>
                                <div class="error-message"></div>
                                <div class="sent-message">{{__('msg.send_msg')}}</div>
                            </div>
                            <div class="text-center"><button type="submit">{{__('msg.sendmessage')}}</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h4>{{__('msg.companyName')}}</h4>
                            <p>
                                @if($lang == 'gb')
                                House: 1150, Road: 9/A, Avenue: 11 <br>
                                Mirpur DOHS, Dhaka-1216
                                @else
                                    বাড়িঃ ১১৫০,রাস্তা, ৯/এ, এভিনিউঃ ১১ <br>
                                    মিরপুর ডিওএইচএস, ঢাকা - ১২১৬
                                @endif
                                    <br><br>
                                <strong>{{__('msg.call')}}: </strong> {{$lang == 'gb'?'+880 9617171125':'+৮৮০ ৯৬১৭১৭১১২৫'}}<br>
                                <strong>{{__('msg.email')}}:</strong> info@gyankosh.info<br>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 footer-links">

                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>{{__('msg.links')}}</h4>
                        <ul>
                            <li><i class="fas fa-home pr-1"></i><a href="#">{{__('msg.home')}}</a></li>
                            <li><i class="fas fa-brain pr-1"></i><a href="#about">{{__('msg.about')}}</a></li>
                            <li><i class="fas fa-list-ul pr-1"></i><a href="#features">{{__('msg.features')}}</a></li>
                            <li><i class="fas fa-book-reader pr-1"></i><a href="#topics">{{__('msg.topics')}}</a></li>
                            <li><i class="fas fa-address-book pr-1"></i><a href="#contact">{{__('msg.contact')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <img src="{{asset('images/logobe.png')}}" width="170px" class="img-fluid animated" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; {{__('msg.copyright')}} <strong><span>{{__('msg.companyName')}}</span></strong>. {{__('msg.rights')}}.
            </div>
            <div class="credits">
            </div>
        </div>
    </footer><!-- End Footer -->
    <div class="modal fade" id="youtubeVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close closebutton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top"><i class="fas fa-angle-up"></i></a>
    <div id="preloader"></div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('msg.notify')}}</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($lang=='gb')
                        Coming very soon. Please try <a href="{{url('Mode/Practice')}}">Practice</a> Or <a href="{{url('game/mode/challenge')}}">Challenge.</a>
                    @else
                        খুব শীঘ্রই আসছে. দয়া করে <a href="{{url('Mode/Practice')}}">অনুশীলন</a> অথবা <a href="{{url('game/mode/challenge')}}">প্রতিযোগিতা</a> চেষ্টা করুন।
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">{{__('form.cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/theme-site.js')}}"></script>
    <script>
        $(function() {
            // $('.tops').on('click', function() {
            //     var did = $(this).data('id');
            //     $(this).children().children('i').removeClass('fa-sort-down').addClass('fa-times');
            //     $('#' + did).css({
            //         'color': 'white',
            //         'max-height': '200px',
            //         'padding': '10px',
            //         'overflow': 'auto',
            //         'visibility': 'visible',
            //         'transform': 'rotateX(0deg)',
            //         'transform-origin': 'top center',
            //         'webkit-backface-visibility': 'hidden',
            //         'backface-visibility': 'hidden',
            //         'transition': '0.3s transform ease',
            //     })
            // })
            // $('.closepanel').on('click',function(){
            //     var did = $(this).data('rid');
            //     $(this).removeClass('fa-times').addClass('fa-sort-down');
            //     if($(this).hasClass('fa-times')){
            //         $('#' + did).css({
            //         'color': 'white',
            //         'max-height': '0px',
            //         'padding': '0px',
            //         'overflow': 'hidden',
            //         'visibility': 'visible',
            //         'transform': 'rotateX(-180deg)',
            //         'transform-origin': 'top center',
            //         'webkit-backface-visibility': 'hidden',
            //         'backface-visibility': 'hidden',
            //         'transition': '0.3s transform ease',
            //     })
            //     }
            // })
            $('.alt_notify').on('click',function (e){
                e.preventDefault();
                $('#exampleModal').modal('show');
            })
            $('.yt').on('click', function(event) {
                event.preventDefault();
                var idVideo = $(this).data('url');
                $('#youtubeVideo .modal-body').append('<button type="button" class="close closebutton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><iframe id="ifm" src="https://www.youtube.com/embed/' + idVideo + '?autoplay=true" frameborder="0" allowfullscreen></iframe>');
                $('#youtubeVideo').modal('show');
            })
            $('#youtubeVideo').on('hidden.bs.modal', function() {
                $('#youtubeVideo .modal-body').empty();
            });


        });
    </script>

</body>

</html>
