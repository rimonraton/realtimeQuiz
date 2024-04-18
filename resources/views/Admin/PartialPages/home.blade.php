@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('css')
    <style>
        #camScan{
            position: absolute;
            left: calc(50vw - 200px);
            top: calc(50vh - 150px);
            width: 400px;
            height: 300px;
            z-index: 99;
            display: none;
        }
    </style>
@endsection
@section('content')
<div class="row justify-content-center">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card" id="cam" style="cursor: pointer">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">
{{--                            <a href="{{url('challenge/resultList')}}">{{__('msg.result')}}</a>--}}
                            <span>QR</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                        <i class="fas fa-arrows-alt-v"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">
                            <a href="{{url('challenge/resultList')}}">{{__('msg.result')}}</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{route('game.practice')}}">{{__('msg.practice')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                        <i class="fas fa-arrows-alt-h"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{route('game.challenge')}}">{{__('msg.challenge')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Publish Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
{{--    <div class="col-lg-3 col-md-6">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <div class="d-flex flex-row">--}}
{{--                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">--}}
{{--                        <i class="fas fa-users"></i>--}}
{{--                    </div>--}}
{{--                    <div class="ml-2 align-self-center">--}}
{{--                        <h3 class="mb-0 font-weight-light"><a class="disabled" href="{{url('Mode/Group')}}">{{__('msg.team')}}</a></h3>--}}
{{--                        <!-- <h5 class="text-muted mb-0">Participants</h5> -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Column -->
    <!-- Column -->
{{--    <div class="col-lg-3 col-md-6">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <div class="d-flex flex-row">--}}
{{--                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">--}}
{{--                        <i class="fas fa-user"></i>--}}
{{--                    </div>--}}
{{--                    <div class="ml-2 align-self-center">--}}
{{--                        <h3 class="mb-0 font-weight-light"><a href="{{url('Mode/Moderator')}}">{{__('msg.quizmaster')}}</a></h3>--}}
{{--                        <!-- <h5 class="text-muted mb-0">Active Participants</h5> -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Column -->
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-center">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="mdi mdi-library"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">{{$lang=='bd'?$bang->bn_number($quiz_counts):$quiz_counts}}</h3>
                        <h5 class="text-muted mb-0">{{__('msg.totalQuiz')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-center">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                        <i class="mdi mdi-library"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">{{$lang=='bd'?$bang->bn_number($quiz_publish):$quiz_publish}}</h3>
                        <h5 class="text-muted mb-0">{{__('msg.publishQuiz')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-center">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">
                        <i class="mdi mdi-library-books"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">{{$lang=='bd'?$bang->bn_number($totalQuestions):$totalQuestions}}</h3>
                        <h5 class="text-muted mb-0"> {{__('msg.totalQuestions')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <!-- <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">0</h3>
                        <h5 class="text-muted mb-0">{{__('msg.participants')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Column -->
</div>

@if(auth()->user()->roleuser->role->id < 4)
<div class="row justify-content-center">
    @if(auth()->user()->roleuser->role->id < 3)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="fas fa-question"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('question/list')}}">{{__('form.view_question_list')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('question/create')}}">{{__('form.create_question')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('question/category')}}">{{__('form.question_topic')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('questionTypelist')}}">{{__('form.question_type')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="mdi mdi-library"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('quiz/view/list')}}">{{__('form.list_quiz')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="mdi mdi-library"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('quiz/create')}}">{{__('form.create_quiz')}}</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(auth()->user()->roleuser->role->role_name == 'Super Admin')
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h4 class="card-title text-uppercase">{{__('form.institute')}}</h4>
{{--            <select class="custom-select w-25 ml-auto">--}}
{{--                <option selected="">January</option>--}}
{{--                <option value="1">February</option>--}}
{{--                <option value="2">March</option>--}}
{{--                <option value="3">April</option>--}}
{{--            </select>--}}
        </div>
        <div class="table-responsive mt-4">
            <table class="table stylish-table mb-0 no-wrap v-middle">
                <thead>
                <tr>
                    <th class="font-weight-normal text-muted border-0 border-bottom" >{{__('form.sl')}}</th>
                    <th class="font-weight-normal text-muted border-0 border-bottom" >{{__('form.admin')}}</th>
                    <th class="font-weight-normal text-muted border-0 border-bottom">{{__('form.institute_name')}}</th>
                    <th class="font-weight-normal text-muted border-0 border-bottom">{{__('form.mobile')}}</th>
                    <th class="font-weight-normal text-muted border-0 border-bottom">{{__('form.status')}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($admin as $a)
                <tr>
                    <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                    <td>
                        <span class="round text-white d-inline-block text-center">
                            <img src="{{asset($a->photo)}}" alt="user" class="rounded-circle" width="50">
                        </span>
                        <span class="pl-1"> {{$a->admin_name}}</span>
                    </td>
                    <td>{{$a->institute_name}}</td>
                    <td>{{$a->mobile}}</td>
                    <td><span class="badge badge-light-info text-info">Paid</span></td>
                </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
<div id="camScan">
    <div id="reader"></div>
</div>
@endsection
@section('js')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        $('#cam').click(function (){
            $('#camScan').toggle();
            const html5QrCode = new Html5Qrcode("reader");
            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                // alert(decodedText, decodedResult)
                window.location.href = decodedText
            };
            const config = { fps: 10, qrbox: { width: 250, height: 250 } };

            // // If you want to prefer front camera
            // html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback);
            //
            // If you want to prefer back camera
            html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);

            // // Select front camera or fail with `OverconstrainedError`.
            // html5QrCode.start({ facingMode: { exact: "user"} }, config, qrCodeSuccessCallback);
            //
            // // Select back camera or fail with `OverconstrainedError`.
            // html5QrCode.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);

        });
    </script>
@endsection
