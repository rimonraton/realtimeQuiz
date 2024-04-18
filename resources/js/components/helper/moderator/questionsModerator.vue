<template>
    <div class="div">
        <div class="card border-0" v-for="question in questions" v-show="question.id == current">
            <div class="card-body p-0 p-md-3">
                <div class="question-div">
                    <p class="question">
                    <span class="qn shadow mr-2 mr-md-4">
                        q2bNumber(qn)
                    </span>
                        সবচেয়ে বেশি চা জন্মে কোন জেলায়?
                    </p>
                </div>
                <div class="options">
                    <div class="option">
                        <div class="one"></div>
                        <p>মৌলভীবাজারে</p>
                    </div>
                    <div class="option">
                        <div class="two"></div>
                        <p class="">পঞ্চগড়ে</p>
                    </div>
                    <div class="option">
                        <div class="three"></div>
                        <p class="">হবিগঞ্জে</p>
                    </div>
                    <div class="option">
                        <div class="four"></div>
                        <p class="">সিলেটে</p>
                    </div>
                </div>

                <div class="text-right pr-2">
                    <a class="btn btn-outline-success pull-right"
                       @click="$emit('nextQuestion')" >
                        {{ tbe('পরবর্তী প্রশ্ন','NEXT QUESTION',user.lang) }}
                        test
                    </a>
                </div>
            </div>
        </div>

        <div class="card my-4" v-for="question in questions" v-show="question.id == current">
            <div class="card-body animate__animated animate__backInRight animate__faster">
            <span class="q_num text-right text-muted">
                {{ qne2b(qid, questions.length, user.lang) }}
            </span>
                <img v-if="question.fileType == 'image'"
                     class="image w-100 mt-1 rounded img-thumbnail"
                     :src="'/' + question.question_file_link"
                     style="max-height:70vh" alt="">
                <div>
                    <div v-if="endAVWait">
                        <video
                            v-if="question.fileType == 'video'"
                            :src="'/'+ question.question_file_link"
                            @error="audioVideoError()"
                            @ended="onEnd()"
                            @play="onStart()"
                            class="image w-100 mt-1 rounded img-thumbnail"
                            controls="controls" playsinline autoplay>
                            <!--                                    <source :src="'/'+ question.question_file_link" @error="audioVideoError()" type="video/mp4">-->
                        </video>
                        <div class="audio" v-if="question.fileType == 'audio'">
                            <audio
                                :src="'/'+ question.question_file_link"
                                @error="audioVideoError()"
                                @ended="onEnd()"
                                @play="onStart()" controls autoplay />
                            <div id="ar"></div>
                        </div>
                    </div>
                    <div v-else>
                        <div v-if="currentQuestionType == 'audio'">
                            <h1>Audio Question... </h1>
                        </div>
                        <div v-if="currentQuestionType == 'video'">
                            <h1>Video Question... </h1>
                        </div>
                    </div>
                    <div v-show="av">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center question-title">
                                    <h3 class="text-danger">Q.</h3>
                                    <h5 class="mt-1 ml-2">
                                        {{ tbe(question.bd_question_text, question.question_text, user.lang) }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div v-if="sqo" class="animate__animated animate__zoomIn animate__faster d-flex flex-wrap" :class="{'row justify-content-center justify-item-center': imageOption(question['options'])}">
                            <div v-if="question.short_answer > 0" class="col-md-12 mt-4">
                                <!--                                    Fill in the blank -->
                                <form @submit.prevent="smtAnswer(question.id, question.options, shortAnswer)">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type Your Answer" v-model="shortAnswer">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" :disabled="shortAnswer != null ? false : true" type="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div v-else v-for="(option, i) in question.options" class="col-md-6 px-1" :class="[option.flag == 'img' ? 'col-6' : 'col-12' ]">
                                <div class="list-group" v-if="option.flag != 'img'" :class="getOptionClass(i, challenge.option_view_time)">
                                        <span @click.once="checkAnswer(question.id, tbe(option.bd_option, option.option, user.lang), option.correct)" class="list-group-item list-group-item-action cursor my-1" v-html="tbe(option.bd_option, option.option, user.lang)">
                                        </span>
                                </div>
                                <div v-else @click="checkAnswer(question.id, option.img_link, option.correct)" class="cursor my-1 " :class="getOptionClass(i, challenge.option_view_time)">
                                    <img class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

	import {quizHelpers} from "../../mixins/quizHelpers";

    export default {
        mixins: [quizHelpers],
		props: ['questions', 'qid', 'gameActive', 'user'],

		methods: {

		}
	};
</script>
<style>

.question-div {
    display: flex;
    font-size: 1.3rem;
    border-bottom: 1px solid #FFC300;
}

.qn {
    background: #FFC300;
    border-radius: 50%;
    min-width: 50px;
    min-height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.question {
    padding: 5px;
    min-height: 50px;
    width: 100%;
    display: flex;
    align-items: center;
}

.options {
    margin: 20px 70px;
}

.option {
    border: 1px solid whitesmoke;
    margin-bottom: 10px;
    position: relative;
    min-height: 3.3rem;
    border-radius: 15px;
    overflow: hidden;
}

.option p {
    padding: 15px;
    margin: 0px;
    position: absolute;
}

.option div {
    height: 100%;
    position: absolute;

}

.one {
    background: #f6b93b;
    width: 30%;
}

.two {
    background: #e55039;
    width: 50%;
}

.three {
    background: #4a69bd;
    width: 0px;
}

.four {
    background: #079992;
    width: 20%;
}

@media screen and (max-width: 480px) {
    .options {
        margin: 10px !important;
    }

    .question-div {
        font-size: 1rem !important;
    }

    .question {
        padding: 2px !important;
    }
}
</style>
