@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title text-center">{{__('Examinations')}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4 " id="quizlist">
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
                        <div title="" data-placement="top" data-toggle="tooltip" class="d-flex pointer p-2" data-original-title="Easy">
                            <span class="normal"></span>
                            <span class="normal"></span>
                            <span class="easy"></span>
                        </div>
                        <span class="text-muted"> 6 Questions </span>
                    </div>
{{--                    <a href="http://realtimequiz.test/Mode/Practice/931/112">--}}
                        <div class="card-body py-0 ">
                            <h5 class="my-3 text-primary">{{$lang == 'gb' ? $exam->exam_en : $exam->exam_bn}}</h5>
                        </div>
{{--                    </a>--}}
                    <div class="info d-flex justify-content-end py-1 px-2 mt-auto ">
                        <a href="{{ url('start-exams/'. $exam->id . '/' . Auth::id()) }}" class="btn btn btn-xs btn-outline-info align-self-center" >
                            {{__('msg.start')}}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center my-3 table-responsive">
            {{ $exams->links() }}
        </div>
    </div>
@endsection
@section('js')
    <script></script>
@endsection
