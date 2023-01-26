@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
{{--                            @if(count($exam_result->results))--}}
{{--                                @foreach(json_decode($exam_result->results[0]->result) as $result)--}}
{{--                                    <p>{{$result->option}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
                            <exam-result
                                :exam ='{{$exam_result}}'
                                :user = '{{$user}}'
                            >

                            </exam-result>
{{--                        <exam-time-mode--}}
{{--                            :questions="{{ $questions }}"--}}
{{--                            :qid="{{$id}}"--}}
{{--                            :user="{{ $user }}"--}}
{{--                            :exam-time="{{ $examination->exam_time }}"--}}
{{--                            @addQuestion="addQuestion($event)">--}}
{{--                        </exam-time-mode>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
