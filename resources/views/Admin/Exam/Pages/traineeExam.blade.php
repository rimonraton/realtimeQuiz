@extends('Admin.Layout.dashboard')
@php
    $lang = App::getLocale();
    function convert_seconds($seconds_value)
    {
     $hasHours = '';
     $hasMinutes = '';
     $hasSeconds = '';
    $hours = $seconds_value > 3600 ? round($seconds_value/3600) : 0;
    $minutes = round($seconds_value/60);
    $seconds = round($seconds_value % 60);
    $bang = new \App\Lang\Bengali();
    if( App::getLocale() == 'gb') {
        // return hours + this.hourOrHours(hours) + ' ' + minutes + this.minuteOrMinutes(minutes) + ' ' + seconds + this.secondOrSeconds(seconds)
        if($hours > 0) {
           return $hasHours = $hours .' hours';
        }
        if ($minutes > 0) {
            return $hasMinutes = $minutes . ' minutes';
        }
        if ($seconds > 0) {
            return $hasSeconds = $seconds . 'seconds';
        }
        return $hasHours . ' ' . $hasMinutes .' '. $hasSeconds;
    } else {
        if($hours > 0) {
            $hasHours = $bang->bn_number($hours) . ' ঘণ্টা';
        }
        if ($minutes > 0) {
            $hasMinutes = $bang->bn_number($minutes)  . ' মিনিট';
        }
        if ($seconds > 0) {
            $hasSeconds = $bang->bn_number($seconds) . ' সেকেন্ড';
        }
       return $hasHours . ' ' . $hasMinutes . ' ' . $hasSeconds;
    }
    }
     function exam_completed($data){
        $results = array_filter((array)$data, function($item){
           return ($item->user_id === Auth::user()->id);
        });
            return $results;
      }
@endphp
@section('css')
    <style>
        .cursor-not-allowed {
            cursor: not-allowed !important;
        }
        .help-tippo{
            /*position: absolute;*/
            /*top: 50%;*/
            /*left: 50%;*/
            /*transform: translate(-50%, -50%);*/
            margin: auto;
            text-align: center;
            border: 1px solid #444;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            /*line-height: 42px;*/
            cursor: default;
        }

        .help-tippo:before{
            content:'i';
            font-family: sans-serif;
            font-weight: normal;
            color:#444;
        }

        .help-tippo:hover p{
            display:block;
            transform-origin: 100% 0%;
            -webkit-animation: fadeIn 0.3s ease;
            animation: fadeIn 0.3s ease;
        }

        /* The tooltip */
        .help-tippo p {
            display: none;
            font-family: sans-serif;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            text-align: center;
            background-color: #FFFFFF;
            padding: 12px 16px;
            width: 178px;
            height: auto;
            /*position: absolute;*/
            /*left: 50%;*/
            transform: translate(-50%, 5%);
            border-radius: 3px;
            /* 	border: 1px solid #E0E0E0; */
            box-shadow: 0 0px 20px 0 rgba(0,0,0,0.1);
            color: #37393D;
            font-size: 12px;
            line-height: 18px;
            z-index: 99;
        }

        .help-tippo p a {
            color: #067df7;
            text-decoration: none;
        }

        .help-tippo p a:hover {
            text-decoration: underline;
        }

        /* The pointer of the tooltip */
        .help-tippo p:before {
            position: absolute;
            content: '';
            width: 0;
            height: 0;
            border: 10px solid transparent;
            border-bottom-color:#FFFFFF;
            top: -9px;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Prevents the tooltip from being hidden */
        .help-tippo p:after {
            width: 10px;
            height: 40px;
            content:'';
            position: absolute;
            top: -40px;
            left: 0;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title text-center">{{__('form.examination')}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        @foreach($exams as $exam)
            <div class="col-md-4 col-sm-12 text-center mb-4 ">
                <div class="card shadow h-100 animate-fast animate__zoomIn animate__animated animate__delay-1s">
                    <div class="d-flex justify-content-between py-1 px-2">
{{--                        <div class="text-muted">--}}
{{--                            <i class="fas fa-star checked"></i>--}}
{{--                            <i class="fas fa-star checked"></i>--}}
{{--                            <i class="fas fa-star checked"></i>--}}
{{--                            <i class="fas fa-star checked"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                        </div>--}}
                        <div class="d-flex pointer p-2">
                            <div class="help-tippo">
                                <p style="z-index: 999999; position: relative;">
                                    @if($exam->exam_time > 0)
                                        {{$lang == 'gb' ? 'The entire exam must be completed within the stipulated time.' : 'সম্পূর্ণ পরীক্ষা নির্দিষ্ট সময়ে শেষ করতে হবে।'}}
                                    @elseif($exam->question_time > 0)
                                        {{$lang == 'gb' ? 'Each question will have fixed time. Each question has to be answered within the given time.' : 'প্রতিটি প্রশ্নে নির্দিষ্ট সময় থাকবে। প্রতিটি প্রশ্নের উত্তর নির্দিষ্ট সময়ের মধ্যে দিতে হবে।'}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <span class="text-muted">
                            @php
                                $qc = count(explode(',', $exam->questions));
                                $qn = $qc * $exam->each_question_mark;
                                $ban = new \App\Lang\Bengali();
                                $now = \Carbon\Carbon::now();
                                $futureDate = \Carbon\Carbon::parse($exam->schedule);
                                $remainingTime = $futureDate->diffForHumans();
                            @endphp
                            {{ app()->getLocale() == 'bd'? $bang->bn_number($qc) . 'টি ' : $qc  }}
                            {{ __('games.questions') }}
                        </span>
                        <span class="text-muted">
                            {{ app()->getLocale() == 'bd'? $bang->bn_number($qn): $qn  }}
                            {{ __('exam.questions_mark') }}
                        </span>
                    </div>
{{--                    <a href="http://realtimequiz.test/Mode/Practice/931/112">--}}
                        <div class="card-body py-0 ">
                            <h5 class="my-3 text-primary">{{$lang == 'gb' ? ($exam->exam_en ? $exam->exam_en : $exam->exam_bn)  : ($exam->exam_bn ? $exam->exam_bn : $exam->exam_en)}}</h5>
                            <p>{{$lang == 'gb' ? 'Exam Duration' : 'পরীক্ষার সময়কাল'}}: {{ convert_seconds($exam->exam_time ? $exam->exam_time : ($exam->question_time ? $exam->question_time : 0)) }}</p>
                            <p>{{$lang == 'gb' ? 'Topic' : 'বিষয়'}}: {{$lang == 'gb' ? $exam->category->name : $exam->category->bn_name }}</p>
                            <p>{{$lang == 'gb' ? 'Exam Time' : 'পরীক্ষার সময়'}}:
                            <span class="font-14 text-danger">
                                {{ $lang == 'gb' ? \Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A') : $ban->bn_date_time(\Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A'))}}
                            </span>
                            </p>
                                @if($futureDate > $now)
                                    @if(auth()->user()->roleuser->role->id > 3)
                                        <p>{{$lang == 'gb' ? 'Time left for the exam to start' : 'পরীক্ষা শুরু হতে সময় বাকী'}}: {{$lang == 'gb' ? $remainingTime : $ban->bn_human($remainingTime) }}</p>
                                    @endif
                                @endif
                                @if($exam->results_count)
                                        @if(auth()->user()->roleuser->role->id < 4)
                                            <p>{{$lang == 'gb' ? 'Number of Test takers' : 'পরীক্ষা জমাদানকারীর সংখ্যা'}}: {{$lang == 'gb' ? $exam->results_count : $ban->bn_number($exam->results_count)}}</p>
                                            <p>
                                             <a href="{{ url('exam-result/'. $exam->id) }}" class="btn btn-sm rounded-lg btn-outline-primary align-self-center">
                                                {{ $lang == 'gb' ? 'View the results' : 'ফলাফল দেখুন ' }}
                                                </a>
                                            </p>
                                        @else
                                            <p>
                                                <span class="btn btn-sm btn-outline-danger rounded-lg align-self-center text-danger cursor-not-allowed">
                                                    {{__('exam.submitted')}}
                                                </span>
                                            </p>
                                        @endif

                                @endif
                        </div>
{{--                    </a>--}}
                    <div class="info d-flex justify-content-end py-1 px-2 mt-auto ">
                            @if($exam->results_count)
{{--                                @if(auth()->user()->roleuser->role->id < 4)--}}
{{--                                    <a href="{{ url('exam-result/'. $exam->id) }}" class="btn btn-xs btn-outline-danger align-self-center">--}}
{{--                                        {{ $lang == 'gb' ? 'View the results' : 'ফলাফল দেখুন ' }}--}}
{{--                                    </a>--}}
{{--                                    @endif--}}
                            @else
                            @if($futureDate > $now)
                            @if(auth()->user()->roleuser->role->id > 3)
                                    @if($exam->is_published)
                                    <a href="{{ url('start-exams/'. $exam->id . '/' . Auth::id()) }}" class="btn btn-xs btn-outline-info align-self-center" >
                                        {{__('msg.start')}}
                                    </a>
                                    @else
                                        <a class="btn btn-xs btn-outline-dark align-self-center text-warning cursor-not-allowed">
                                            {{__('msg.not_published_yet')}}
                                        </a>
                                    @endif
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center my-3 table-responsive">
            {{ $exams->links() }}
        </div>
    </div>
@endsection

