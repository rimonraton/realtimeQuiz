@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ $type }}</div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
{{--                        {{$id->question_time}}--}}
                            @if($examination->question_time > 0)
                                <exam-question-time-mode :id="{{ $id }}"
                                                      :uid="{{ $uid }}"
                                                      :questions="{{ $questions }}"
                                                      :user="{{ $user }}"
                                                      :gmsg="{{ $gmsg }}"
                                ></exam-question-time-mode>
                            @else
                                <exam-time-mode
                                    :questions="{{ $questions }}"
                                    :qid="{{$id}}"
                                    :user="{{ $user }}"
                                    :exam-time="{{ $examination->exam_time }}"
                                    @addQuestion="addQuestion($event)">
                                </exam-time-mode>
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <exam-time-mode--}}
{{--                                            :questions="{{ $questions }}"--}}
{{--                                            :qid="{{$id}}"--}}
{{--                                            :user="{{ $user }}"--}}
{{--                                            @addQuestion="addQuestion($event)">--}}
{{--                                        </exam-time-mode>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-5">--}}
{{--                                        <div class="form-group mt-1">--}}
{{--                                            <input type="number" class="form-control"  placeholder="Enter Time in Seconds" v-model="question_time">--}}
{{--                                        </div>--}}
{{--                                        <div class="card text-white bg-secondary">--}}
{{--                                            <div class="card-header card-title d-flex justify-content-between">--}}
{{--                                                <a @click="reloadPage" class="btn btn-sm btn-danger" >{{tbe('রিসেট','Reset',user.lang)}}</a>--}}
{{--                                                <!-- <strong>Information</strong> -->--}}
{{--                                                <a class="btn btn-sm btn-info" v-if="!isLastQuestion" @click="teamResult">{{ tbe('খেলা শেষ করুন','Game Finish',user.lang) }}</a>--}}

{{--                                                <a class="btn btn-sm btn-warning" v-if="isLastQuestion" @click="nextQuestion">{{ tbe('পরবর্তী প্রশ্ন','NEXT QUESTION',user.lang) }}</a>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-body" v-if="results.length > 0">--}}
{{--                                                <h3 class="p-2">--}}
{{--                                                    <i class="fa fa-trophy" aria-hidden="true"></i>--}}
{{--                                                    {{ tbe('লিডার বোর্ড','Leader Board',user.lang) }}--}}
{{--                                                </h3>--}}
{{--                                                <ul class="list-group text-dark">--}}
{{--                                                    <li class="list-group-item d-flex justify-content-between align-items-center p-0" v-for="(result, key) in results" :key="key">--}}
{{--                                                        <div :id="'accordion' + key" class="w-100">--}}
{{--                                                            <div class="card text-white bg-secondary">--}}
{{--                                                                <div class="card-header py-1 bg-secondary d-flex justify-content-between"--}}
{{--                                                                     :id="'heading' + key" data-toggle="collapse"--}}
{{--                                                                     :data-target="'#collapse' + key" aria-expanded="true"--}}
{{--                                                                     :aria-controls="'collapse' + key">--}}
{{--                                                                    <small class="mb-0 cursor">--}}
{{--                                                                        {{ result.name }}--}}
{{--                                                                    </small>--}}
{{--                                                                    <span class="badge badge-success badge-pill">--}}
{{--                                            {{ result.score  }}--}}
{{--                                        </span>--}}
{{--                                                                </div>--}}

{{--                                                                <div :id="'collapse' + key" class="collapse show"--}}
{{--                                                                     :aria-labelledby="'heading' + key"--}}
{{--                                                                     :data-parent="'#accordion' + key">--}}
{{--                                                                    <div class="card-body p-0">--}}
{{--                                                                        <ul class="list-group text-dark" style="max-height: 380px; overflow:auto;">--}}
{{--                                                                            <li v-for="(answer, key) in result.answers" :key="key" class="list-group-item d-flex justify-content-between align-items-center p-1">--}}
{{--                                                                                <div class="font-weight-light f-13">--}}
{{--                                                                                <!-- <span class="font-weight-bold">--}}
{{--                                                                {{ answer.question }}--}}
{{--                                                                                    </span> -->--}}
{{--                                                                                    <span v-if="(/\.(gif|jpg|jpeg|tiff|png)$/i).test(answer.img_link)">--}}
{{--                                                                <img  class="image mt-1 rounded img-thumbnail" width="100px" :src="'/'+ answer.img_link" alt="">--}}
{{--                                                            </span>--}}
{{--                                                                                    <span class="font-weight-light font-italic" v-else>--}}
{{--                                                                {{ answer.user.name + ' - ' + answer.selected }}--}}
{{--                                                            </span>--}}
{{--                                                                                    <i v-if="answer.isCorrect == 1" class="fa fa-check text-success" aria-hidden="true" ></i>--}}
{{--                                                                                    <i v-else class="fa fa-times text-danger" aria-hidden="true" ></i>--}}

{{--                                                                                </div>--}}

{{--                                                                            </li>--}}

{{--                                                                        </ul>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}

{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            @endif
{{--                        <challenge :id="{{ $id }}"--}}
{{--                                   :uid="{{ $uid }}"--}}
{{--                                   :questions="{{ $questions }}"--}}
{{--                                   :user="{{ $user }}"--}}
{{--                                   :gmsg="{{ $gmsg }}"--}}
{{--                        ></challenge>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
