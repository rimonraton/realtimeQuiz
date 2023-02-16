@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <h4 class="card-title text-center">
                                @if($lang == 'gb')
                                    {{__('exam.result_title') .' '. $userResult->exam_en}}
                                @else
                                    {{$userResult->exam_bn.' '.__('exam.result_title')}}
                                @endif
                            </h4>
                        </div>
                        <div class="ml-3">
                            <a class="btn btn-info border border-dark" href="{{url('exams')}}">Back</a>
                        </div>


                    </div>
                    <hr>

                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach($userResult->results as $result)
                                <a type="button" class="btn border border-secondary m-1" href="{{url('show-result/'.$result->examination_id.'/'.$result->user->id)}}" > {{$result->user->name}}</a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection
