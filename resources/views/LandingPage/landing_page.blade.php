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
    <!-- <link href="{{asset('Landing/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    
    <link href="{{asset('css/theme-site.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- =======================================================
  * Template Name: Bootslander - v2.3.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>

    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">

                <h1 class="text-light"><a href="{{url('/')}}"><span><img src="{{asset('images/logo3.png')}}" alt=""> {{__('msg.logo')}}</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="{{asset('Landing/assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#">{{__('msg.home')}}</a></li>
                    <li><a href="#about">{{__('msg.about')}}</a></li>
                    <li><a href="#features">{{__('msg.features')}}</a></li>
                    <li><a href="#topics">{{__('msg.topics')}}</a></li>
                    <!-- <li><a href="#faq">{{__('msg.faq')}}</a></li> -->
                    <!-- <li><a href="#gallery">Gallery</a></li> -->
                    <!-- <li><a href="#team">Team</a></li>
                    <li><a href="#pricing">Pricing</a></li> -->
                    <!-- <li class="drop-down"><a href="">Drop Down</a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="drop-down"><a href="#">Drop Down 2</a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                            <li><a href="#">Drop Down 5</a></li>
                        </ul>
                    </li> -->

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
                            <img src="https://www.countryflags.io/{{ session('locale', config('app.locale')) }}/flat/24.png">
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('setLanguage/gb') }}">
                                    <img src="https://www.countryflags.io/gb/flat/24.png">
                                    {{ __('msg.english') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('setLanguage/bd') }}">
                                    <img src="https://www.countryflags.io/bd/flat/24.png">
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
                        <!-- <div class="text-center text-lg-left">
                            <a href="#about" class="btn-get-started scrollto">Get Started</a>
                        </div> -->
                    </div>
                </div>
                <div id="logoimg" class="col-lg-5 order-1 order-lg-2 hero-img text-md-right" data-aos="zoom-out" data-aos-delay="300">
                    <!-- <img src="{{asset('Landing/assets/img/hero-img.png')}}" class="img-fluid animated" alt=""> -->
                    <img src="{{asset('images/logobe.png')}}" class="img-fluid animated " alt="" width="115px">
                    <!-- <img src="{{asset('Landing/hero/7.gif')}}" class="img-fluid animated" alt=""> -->
                    <!-- <img src="{{asset('Landing/hero/6.gif')}}" class="img-fluid animated" alt=""> -->
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
                                    <p class="bottom-text"><strong>{{__('msg.moderator')}}</strong></p>
                                    <a href="{{url('Mode/Practice')}}" class="menu-item menu-red top-cercle">
                                        <i class="fas fa-address-card text-white"></i>
                                        <!-- <span class="pb-5" style="font-size: 16px;">Practice</span> -->
                                    </a>
                                    <div class="borogoldiv d-flex justify-content-center align-items-center">
                                        <!-- <a href="https://www.youtube.com/embed/A4jqX3Psbig?rel=0&showinfo=0&autoplay=1" class="venobox play-btn mb-4 yt" data-vbtype="video" data-autoplay="true"></a> -->
                                        <a data-url="A4jqX3Psbig" href="#" class="play-btn mb-4 yt"></a>

                                        <!-- <i class="icofont-globe-alt"></i> -->
                                        <!-- <img src="{{asset('Landing/hero/brain.png')}}" alt=""> -->
                                    </div>

                                    <a href="{{url('Mode/Challenge')}}" class="menu-item menu-green right-cercle">
                                        <i class="fas fa-people-arrows text-white"></i>
                                    </a>

                                    <a href="{{url('Mode/Moderator')}}" class="menu-item menu-blue bottom-cercle">
                                        <i class="fas fa-user text-white"></i>
                                    </a>

                                    <a href="{{url('Mode/Group')}}" class="menu-item menu-purple left-cercle">
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
        <!-- Quiz -->
        <!-- <section id="about" class="about">
            <div class="container-fluid">

                <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
                <div class="row" style="background: #afafaf">
                    <div class="col-6 m-auto" data-aos="fade-left" >
                        <style>
                            :root {
                                --n: 5
                            }
                        </style>
                        <article style="--idx: 0;--c0: #b071fe;--c1: #c08fff;--c2: #8d5bcc">
                            <h3>gingerbread</h3>
                            <p>Cake muffin donut chocolate cake jelly sesame snaps wafer tart pie sweet roll muffin chupa chups.</p>
                        </article>
                        <article style="--idx: 1;--c0: #f88c06;--c1: #f7a334;--c2: #c87107">
                            <h3>brownie</h3>
                            <p>Cake cookie lemon drops muffin sugar plum. Liquorice pudding sugar plum topping macaroon pie chocolate.</p>
                        </article>
                        <article style="--idx: 2;--c0: #b3de15;--c1: #c2e443;--c2: #8fb112">
                            <h3>ice cream</h3>
                            <p>Cake muffin donut chocolate cake jelly sesame snaps wafer tart pie sweet roll muffin chupa chups.</p>
                        </article>
                        <article style="--idx: 3;--c0: #e43695;--c1: #e95eab;--c2: #b52e78">
                            <h3>lava cake</h3>
                            <p>Cake cookie lemon drops muffin sugar plum. Liquorice pudding sugar plum topping macaroon pie chocolate.</p>
                        </article>
                        <article style="--idx: 4;--c0: #09c3d0;--c1: #3aced6;--c2: #0a9da7">
                            <h3>macaroon</h3>
                            <p>Cake muffin donut chocolate cake jelly sesame snaps wafer tart pie sweet roll muffin chupa chups.</p>
                        </article>
                    </div>
                </div>

            </div>
        </section> -->
        <!-- EndQuiz -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>{{__('msg.features')}}</h2>
                    <p>{{__('msg.checkfeatures')}}</p>
                </div>

                <div class="row justify-content-center" data-aos="fade-left">
                    <div class="col-lg-6 col-md-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <i class="fas fa-address-card" style="color: #ffbb2c;"></i>
                            <h3><a href="">{{__('msg.practice')}}</a></h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">অনুশীলনী সেশনে বিভিন্ন বিষয়ে অনুশীলন করতে পারে</li>
                            <li class="list-group-item">অনুশীলনের সময় সঠিক ও ভূল উত্তর দেখতে পারে</li>
                            <li class="list-group-item">প্রতিটি প্রশ্নের উত্তর দিতে সময় দেখতে পারে</li>
                            <li class="list-group-item">সঠিক ও ভূল উত্তরের সংখ্যা দেখতে পারে</li>
                            <li class="list-group-item">অনুশীলন শেষে সম্পূর্ন অনুশীলনের রিপোর্ট দেখতে পারে</li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <i class="fas fa-people-arrows" style="color: #5578ff;"></i>
                            <h3><a href="">{{__('msg.challenge')}}</a></h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">প্রতিযোগিতা সেশনে প্রতিযোগিতার জন্য কুইজ শেয়ার করতে পারে</li>
                            <li class="list-group-item">প্রতিযোগিদের লিস্ট দেখতে পারে</li>
                            <li class="list-group-item">সঠিক উত্তরদাতা দেখতে পারে</li>
                            <li class="list-group-item">প্রতিটি প্রশ্নের জন্য নির্দিষ্ট সময় থাকে</li>
                            <!-- <li class="list-group-item">প্রতিযোগিতা শেষে সম্পূর্ন রিপোর্ট দেখতে পারে</li> -->
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                            <i class="fas fa-users" style="color: #e80368;"></i>
                            <h3><a href="">{{__('msg.team')}}</a></h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">দল সেশনে নিয়ন্ত্রক কুইজ শেয়ার করতে পারে</li>
                            <li class="list-group-item">কুইজ শেয়ার এর লিংক এ ক্লিক করে দল হিসেবে যোগ করতে পারে</li>
                            <li class="list-group-item">নির্দিষ্ট সময়ে নিয়ন্ত্রক কুইজ শুরু করতে পারে</li>
                            <li class="list-group-item">কুইজ ভবিষ্যদ্বাণী করতে পারে</li>
                            <li class="list-group-item">নিয়ন্ত্রক প্রতিটি দলের উত্তর দেখতে পারে</li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <i class="fas fa-user" style="color: #e361ff;"></i>
                            <h3><a href="">{{__('msg.moderator')}}</a></h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">নিয়ন্ত্রক সেশনে নিয়ন্ত্রক কুইজ শেয়ার করতে পারে</li>
                            <li class="list-group-item">কুইজ শেয়ার এর লিংক এ ক্লিক করে প্রতিযোগি হিসেবে যোগ করতে পারে</li>
                            <li class="list-group-item">নির্দিষ্ট সময়ে নিয়ন্ত্রক কুইজ শুরু করতে পারে</li>
                            <li class="list-group-item">কুইজ ভবিষ্যদ্বাণী করতে পারে</li>
                            <li class="list-group-item">নিয়ন্ত্রক প্রতিটি দলের উত্তর দেখতে পারে</li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
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
                    @foreach($category as $c)
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <!-- <i class="ri-store-line" style="color: #ffbb2c;"></i> -->
                            <i class="fas fa-book"></i>
                            <h3><a href="">{{$c->name}}</a></h3>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <img src="{{asset('Landing/assets/img/topics/math.png')}}" alt="">
                            <h3><a href="">{{$c->name}}</a></h3>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3><a href="">Dolor Sitema</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                            <h3><a href="">Sed perspiciatis</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                            <h3><a href="">Magni Dolores</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                            <i class="ri-database-2-line" style="color: #47aeff;"></i>
                            <h3><a href="">Nemo Enim</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                            <h3><a href="">Eiusmod Tempor</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="">Midela Teren</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                            <h3><a href="">Pira Neve</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="450">
                            <i class="ri-anchor-line" style="color: #b2904f;"></i>
                            <h3><a href="">Dirada Pack</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
                            <i class="ri-disc-line" style="color: #b20969;"></i>
                            <h3><a href="">Moton Ideal</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="550">
                            <i class="ri-base-station-line" style="color: #ff5828;"></i>
                            <h3><a href="">Verdo Park</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="600">
                            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                            <h3><a href="">Flavor Nivelanda</a></h3>
                        </div>
                    </div> -->
                </div>

            </div>
        </section><!-- End Topics Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row" data-aos="fade-up">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="fas fa-user"></i>
                            <span data-toggle="counter-up">1,463</span>
                            <p>{{__('msg.participants')}}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="fas fa-users"></i>
                            <span data-toggle="counter-up">521</span>
                            <p>{{__('msg.teams')}}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-brain"></i>
                            <span data-toggle="counter-up">200</span>
                            <p>{{__('msg.quiz')}}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-trophy"></i>
                            <span data-toggle="counter-up">15</span>
                            <p>{{__('msg.winner')}}</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Details Section ======= -->
        <!-- <section id="details" class="details">
            <div class="container">

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{asset('Landing/assets/img/details-1.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="font-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="icofont-check"></i> Iure at voluptas aspernatur dignissimos doloribus repudiandae.</li>
                            <li><i class="icofont-check"></i> Est ipsa assumenda id facilis nesciunt placeat sed doloribus praesentium.</li>
                        </ul>
                        <p>
                            Voluptas nisi in quia excepturi nihil voluptas nam et ut. Expedita omnis eum consequatur non. Sed in asperiores aut repellendus. Error quisquam ab maiores. Quibusdam sit in officia
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{asset('Landing/assets/img/details-2.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                        <h3>Corporis temporibus maiores provident</h3>
                        <p class="font-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <p>
                            Inventore id enim dolor dicta qui et magni molestiae. Mollitia optio officia illum ut cupiditate eos autem. Soluta dolorum repellendus repellat amet autem rerum illum in. Quibusdam occaecati est nisi esse. Saepe aut dignissimos distinctio id enim.
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{asset('Landing/assets/img/details-3.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-5" data-aos="fade-up">
                        <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
                        <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
                        <ul>
                            <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="icofont-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                        </ul>
                        <p>
                            Qui consequatur temporibus. Enim et corporis sit sunt harum praesentium suscipit ut voluptatem. Et nihil magni debitis consequatur est.
                        </p>
                        <p>
                            Suscipit enim et. Ut optio esse quidem quam reiciendis esse odit excepturi. Vel dolores rerum soluta explicabo vel fugiat eum non.
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{asset('Landing/assets/img/details-4.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                        <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
                        <p class="font-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <ul>
                            <li><i class="icofont-check"></i> Et praesentium laboriosam architecto nam .</li>
                            <li><i class="icofont-check"></i> Eius et voluptate. Enim earum tempore aliquid. Nobis et sunt consequatur. Aut repellat in numquam velit quo dignissimos et.</li>
                            <li><i class="icofont-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section> -->
        <!-- End Details Section -->

        <!-- ======= Gallery Section ======= -->
        <!-- <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Gallery</h2>
                    <p>Check our Gallery</p>
                </div>

                <div class="row no-gutters" data-aos="fade-left">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-1.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-1.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-2.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-2.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-3.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-3.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-4.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-4.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-5.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-5.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-6.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-6.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-7.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-7.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                            <a href="{{asset('Landing/assets/img/gallery/gallery-8.jpg')}}" class="venobox" data-gall="gallery-item">
                                <img src="{{asset('Landing/assets/img/gallery/gallery-8.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
        <!-- End Gallery Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="owl-carousel testimonials-carousel" data-aos="zoom-in">

                    <div class="testimonial-item">
                        <!-- <img src="{{asset('Landing/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt=""> -->
                        <!-- <h3>Saul Goodman</h3> -->
                        <!-- <h4>Ceo &amp; Founder</h4> -->
                        <p>
                            <!-- <i class="bx bxs-quote-alt-left quote-icon-left"></i> -->
                            <i class="fas fa-quote-left"></i>
                            Gyankosh
                            <i class="fas fa-quote-right"></i>
                            <!-- <i class="bx bxs-quote-alt-right quote-icon-right"></i> -->
                        </p>
                    </div>

                    <!-- <div class="testimonial-item">
                        <img src="{{asset('Landing/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div> -->

                    <!-- <div class="testimonial-item">
                        <img src="{{asset('Landing/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div> -->

                    <!-- <div class="testimonial-item">
                        <img src="{{asset('Landing/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div> -->

                    <!-- <div class="testimonial-item">
                        <img src="{{asset('Landing/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div> -->

                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <!-- <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Team</h2>
                    <p>Our Great Team</p>
                </div>

                <div class="row" data-aos="fade-left">

                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img src="{{asset('Landing/assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="member" data-aos="zoom-in" data-aos-delay="200">
                            <div class="pic"><img src="{{asset('Landing/assets/img/team/team-2.jpg')}}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="member" data-aos="zoom-in" data-aos-delay="300">
                            <div class="pic"><img src="{{asset('Landing/assets/img/team/team-3.jpg')}}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="member" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic"><img src="{{asset('Landing/assets/img/team/team-4.jpg')}}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
        <!-- End Team Section -->

        <!-- ======= Pricing Section ======= -->
        <!-- <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Pricing</h2>
                    <p>Check our Pricing</p>
                </div>

                <div class="row" data-aos="fade-left">

                    <div class="col-lg-3 col-md-6">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                            <h3>Free</h3>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li class="na">Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
                            <h3>Business</h3>
                            <h4><sup>$</sup>19<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="300">
                            <h3>Developer</h3>
                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="400">
                            <span class="advanced">Advanced</span>
                            <h3>Ultimate</h3>
                            <h4><sup>$</sup>49<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
        <!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <!-- <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>{{__('msg.faq')}}</h2>
                    <p>{{__('msg.checkfaq')}}</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                                <p>
                                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section> -->
        <!-- End F.A.Q Section -->

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
                                <p>House: 1150, Road: 9/A, Avenue:11, Mirpur DOHS, Dhaka-1216</p>
                            </div>

                            <div class="email">
                                <i class="fas fa-envelope"></i>
                                <h4>{{__('msg.email')}}:</h4>
                                <p>info@maharah.online</p>
                            </div>

                            <div class="phone">
                                <i class="fas fa-phone"></i>
                                <h4>{{__('msg.call')}}:</h4>
                                <p>+880 9617171125</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

                        <form action="{{url('contact')}}" method="post" role="form" class="php-email-form">
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
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
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
                            <h3>Darco Technologies Limited</h3>
                            <!-- <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p> -->
                            <p>
                                House: 1150, Road: 9/A, Avenue: 11 <br>
                                Mirpur DOHS, Dhaka-1216<br><br>
                                <strong>Phone:</strong> +880 9617171125<br>
                                <strong>Email:</strong> info@maharah.online<br>
                            </p>
                            <!-- <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 footer-links">

                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Links</h4>
                        <ul>
                            <li><i class="fas fa-home pr-1"></i><a href="#">Home</a></li>
                            <li><i class="fas fa-brain pr-1"></i><a href="#about">Quiz</a></li>
                            <li><i class="fas fa-list-ul pr-1"></i><a href="#features">Features</a></li>
                            <li><i class="fas fa-book-reader pr-1"></i><a href="#topics">Topics</a></li>
                            <li><i class="fas fa-address-book pr-1"></i><a href="#contact">Contact</a></li>
                            <!-- <li><i class="fas fa-question pr-1"></i> <a href="#faq">FAQ</a></li> -->
                        </ul>
                    </div>

                    <!-- <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div> -->

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <img src="{{asset('images/logobe.png')}}" width="170px" class="img-fluid animated" alt="">
                        </div>
                        <!-- <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form> -->

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Darco Technologies Limited</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>
    </footer><!-- End Footer -->
    <div class="modal fade" id="youtubeVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close closebutton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <!-- <iframe id="ifm" src="https://www.youtube.com/embed/A4jqX3Psbig?autoplay=true" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top"><i class="fas fa-angle-up"></i></a>
    <div id="preloader"></div>

    <script src="{{asset('js/theme-site.js')}}"></script>
    <script>
        $(function() {
            // $('#reg').click(function(){
            //     window.href = "{{route('register')}}";
            // })
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