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
            @if(session()->has('exam-message'))
                <p class="alert alert-danger">{{ session('exam-message') }}</p>
            @endif
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
                        @if(auth()->user()->roleuser->role->id > 3)
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
                        @endif
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
                            @if($exam->category)
                            <p>{{$lang == 'gb' ? 'Topic' : 'বিষয়'}}: {{$lang == 'gb' ? $exam->category->name : $exam->category->bn_name }}</p>
                            @else
                            <p>{{$lang == 'gb' ? 'Topic' : 'বিষয়'}}:
                                @foreach(json_decode($exam->topics) as $topic)
                                    {{$lang == 'gb' ? ( $topic->name ?  $topic->name :  $topic->bn_name)  : ($topic->bn_name ? $topic->bn_name : $topic->name)}}
                                    {{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </p>
                            @endif
                            <p>{{$lang == 'gb' ? 'Exam Time' : 'পরীক্ষার সময়'}}:
                            <span class="font-14 text-danger">
                                {{ $lang == 'gb' ? \Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A') : $ban->bn_date_time(\Carbon\Carbon::parse($exam->schedule)->format('d F Y, h:i A'))}}
                            </span>
                            </p>
                                @if($futureDate > $now)
                                    @if(auth()->user()->roleuser->role->id > 3)
                                        <p>{{$lang == 'gb' ? 'Time left for the exam to start' : 'পরীক্ষা শুরু হতে সময় বাকী'}}: {{$lang == 'gb' ? $remainingTime : $ban->bn_human($remainingTime) }}</p>
                                    <p>
                                        <span class="border border-primary rounded-lg align-self-center text-primary cursor-not-allowed p-2">
                                             {{__('msg.not_published_yet')}}
                                        </span>
                                    </p>
                                    @endif
                                @else
                                @if(auth()->user()->roleuser->role->id > 3)
                                    @if($futureDate < $now)
                                        @if($exam->results_count)
                                            {{--                                @if(auth()->user()->roleuser->role->id < 4)--}}
                                            {{--                                    <a href="{{ url('exam-result/'. $exam->id) }}" class="btn btn-xs btn-outline-danger align-self-center">--}}
                                            {{--                                        {{ $lang == 'gb' ? 'View the results' : 'ফলাফল দেখুন ' }}--}}
                                            {{--                                    </a>--}}
                                            {{--                                    @endif--}}
                                            <p>
                                    <span class="border border-success rounded-lg align-self-center text-success cursor-not-allowed p-2">
                                        {{__('exam.submitted')}}
                                    </span>
                                            </p>
                                        @else
                                            @if($exam->is_published)
                                                @if(count($exam->existUser))
                                                    @if($exam->existUser[0]->reason)
                                                        <button class="btn btn-sm btn-outline-secondary align-self-center rounded-lg cursor-not-allowed" disabled>
                                                            {{__('exam.pendingRequest')}}
                                                        </button>
                                                    @else
                                                        <button class="btn btn-sm btn-outline-warning align-self-center rounded-lg reason" data-name="{{$lang == 'gb'?($exam->exam_en?$exam->exam_en:$exam->exam_bn):($exam->exam_bn?$exam->exam_bn:$exam->exam_en)}}" data-exam="{{$exam->id}}" data-user="{{Auth::id()}}">
                                                            {{__('exam.unlockRequest')}}
                                                        </button>
                                                    @endif
                                                        <p class="text-danger pt-2">{{$lang == 'gb'? 'Temporarily locked' : 'সাময়িকভাবে লক করা হয়েছে'}}</p>
                                                @else
                                                <a href="{{ url('start-exams/'. $exam->id . '/' . Auth::id()) }}" class="btn btn-sm btn-outline-info align-self-center rounded-lg" >
                                                    {{__('msg.start')}}
                                                </a>
                                                @endif

                                            @else
                                                @if($futureDate < $now)
                                                    <p>
                                                <span class="border border-danger rounded-lg align-self-center text-danger cursor-not-allowed p-2">
                                                    {{__('exam.expired')}}
                                                </span>
                                                    </p>
                                                @else
                                                    <span class="border border-primary align-self-center text-primary cursor-not-allowed p-2">
                                                        {{__('msg.not_published_yet')}}
                                                    </span>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                                @endif

                                @if($exam->results_count)
                                        @if(auth()->user()->roleuser->role->id < 4)
                                            <p>{{$lang == 'gb' ? 'Number of Test takers' : 'পরীক্ষা জমাদানকারীর সংখ্যা'}}: {{$lang == 'gb' ? $exam->results_count : $ban->bn_number($exam->results_count)}}</p>
                                            <div class="d-flex justify-content-center">
                                            <p>
                                             <a href="{{ url('exam-result/'. $exam->id) }}" class="btn btn-sm rounded-lg btn-outline-primary align-self-center">
                                                {{ $lang == 'gb' ? 'View the results' : 'ফলাফল দেখুন ' }}
                                             </a>
                                            </p>
                                            <p id="btn_{{$exam->id}}" class="mx-1">
                                            @if(count($exam->existUser))
                                                    @if($exam->existUser[0]->reason)
                                                        <a data-name="{{$lang == 'gb'?($exam->exam_en?$exam->exam_en:$exam->exam_bn):($exam->exam_bn?$exam->exam_bn:$exam->exam_en)}}" data-reasons="{{$exam->existUser}}" class="btn btn-sm rounded-lg btn-outline-success align-self-center viewReason" id="viewRes_{{$exam->id}}">
                                                        {{ $lang == 'gb' ? 'View Requests' : 'অনুরোধগুলো দেখুন' }} (<span id="num_{{$exam->id}}">{{$lang == 'gb' ? count($exam->existUser) : $ban->bn_number(count($exam->existUser))}}</span>)
                                                    </a>
                                                    @endif
                                                @endif
                                        </p>
                                            </div>
                                        @endif
                                @else
                                @if(auth()->user()->roleuser->role->id < 4)
                                    <span id="btn_{{$exam->id}}">
                                    @if(count($exam->existUser))
                                            @if($exam->existUser[0]->reason)
                                                <a data-name="{{$lang == 'gb'?($exam->exam_en?$exam->exam_en:$exam->exam_bn):($exam->exam_bn?$exam->exam_bn:$exam->exam_en)}}" data-reasons="{{$exam->existUser}}" class="btn btn-sm rounded-lg btn-outline-success align-self-center viewReason" id="viewRes_{{$exam->id}}">
                                                {{ $lang == 'gb' ? 'View Requests' : 'অনুরোধগুলো দেখুন' }} (<span id="num_{{$exam->id}}">{{$lang == 'gb' ? count($exam->existUser) : $ban->bn_number(count($exam->existUser))}}</span>)
                                            </a>
                                            @endif
                                        @endif
                                </span>
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
    <div class="modal" tabindex="-1" role="dialog" id="resonModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">{{$lang == 'gb' ? 'Give suitable reasons' : 'উপযুক্ত কারণ দিন'}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">{{$lang == 'gb' ? 'Exam Name: ' : 'পরীক্ষার নামঃ '}} <span id="eName"></span></div>
                    <form action="{{url('update-reason')}}" method="POST">
                        @csrf
                        <input id="examId" type="hidden" name="exam">
                        <input id="userId" type="hidden" name="user">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{$lang == 'gb' ?'Write Reason' : 'কারণ লিখুন'}}</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" name="reasonValue"></textarea>
                        </div>
                        <div class="mt-4 text-right"><button type="submit" class="btn btn-primary">{{$lang == 'gb'?'Send Request': 'অনুরোধ পাঠান'}}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="userReasons">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleReason">{{$lang == 'gb' ? 'Reasons' : 'কারণগুলো'}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                       <div class="container">
                           <div class="row">
                               <div class="col-lg-10 mx-auto">
                                   <div class="section-title text-center ">
                                       <h3 class="top-c-sep">{{$lang == 'gb' ? 'Exam Name:' : 'পরীক্ষার নামঃ'}} <span id="examName"></span></h3>
                                   </div>
                               </div>
                           </div>

                           <div class="row overflow-auto" style="height: 400px">
                               <div class="col-lg-10 mx-auto">
                                   <div class="career-search mb-60">
                                       <div class="filter-result">
                                           <div id="loadReason">

                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                       </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $(".alert").delay(5000).slideUp(300);
            $('.reason').on('click', function () {
                {{--const lang = "{{$lang}}"--}}
                {{--const title = lang == 'gb' ? 'Appropriate Reason' : 'উপযুক্ত কারণ'--}}
                $('#userId').val($(this).attr('data-user'))
                $('#examId').val($(this).attr('data-exam'))
                // $('#title').html( `${title}` + "(" + $(this).attr('data-name')+")")
                $('#eName').html($(this).attr('data-name'))
                $('#resonModal').modal('show')
            })

            $('.viewReason').on('click', function () {
                $('#examName').html($(this).attr('data-name'))
                const reasons = JSON.parse($(this).attr('data-reasons'))
                // console.log('reasons', reasons)
                const lang = "{{$lang}}"
                const unlock = lang == 'gb' ? 'Unlock' : 'আনলক করুন'
                let reasonView = ''
                    $.each(reasons, function( index, value ) {
                        // console.log(index, value)
                        if(!!value.reason) {
                            reasonView += `<div class="job-box d-md-flex align-items-center justify-content-between mb-30 border rounded">
                                               <div class="job-left my-4 d-md-flex align-items-center flex-wrap p-2">
                                                   <div class="job-content">
                                                       <h5 class="text-center text-md-left">${value.user.name}(${value.user.email})</h5>
                                                       <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                                           <li class="mr-md-4 text-danger">
                                                               ${value.reason}
                                                           </li>
                                                       </ul>
                                                   </div>
                                               </div>
                                               <div class="job-right my-4 mx-2 flex-shrink-0">
                                                   <a href="#" class="btn d-block w-100 d-sm-inline-block btn-light unlock" data-exam="${value.exam_id}" data-user="${value.user_id}">${unlock}</a>
                                               </div>
                                         </div>`
                        }
                    });

                $('#loadReason').html( reasonView )
                $('#userReasons').modal('show')
            })
            $(document).on('click','.unlock', function () {
                const lang = "{{$lang}}"
                const exam = $(this).attr('data-exam')
                let fd = {
                    'exam': exam,
                    'user': $(this).attr('data-user')
                }
                $.ajax({
                    url:"{{url('api/unlock-exam')}}",
                    type:"Post",
                    data: fd,
                    success: function (data) {
                        console.log('number_of_reason...', data['number_of_reason'])
                        if (data['number_of_reason'] > 0){
                            $('#num_'+ exam).html(lang == 'gb' ? data['number_of_reason'] : q2bNumber(data['number_of_reason']))
                            $('#viewRes_' + exam).attr('data-reasons', JSON.stringify(data['reasons']))
                        } else{
                            $('#btn_'+ exam).addClass('d-none')
                        }
                        $('#userReasons').modal('hide')
                    }
                })
            })

           function q2bNumber(numb) {
                let numbString = numb.toString();
                let bn = ''
                let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯', '.':'.'};
                [...numbString].forEach(n => bn += eb[n])
                return bn
            }

        })
    </script>
@endsection

