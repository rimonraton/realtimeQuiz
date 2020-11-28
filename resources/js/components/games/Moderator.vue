<template>
    <div class="container">
        <div class="winner" v-if="winner_screen">
            <div v-if="user_ranking == 0">
                <h1 class="text-center">Congratulation ! </h1>
                <h3><b>{{ user.name }}</b>, you won this game.</h3>
            </div>
            <div v-else-if="user_ranking == 1">
                <h1 class="text-center">Well Played ! </h1>
                <h3><b>{{ user.name }}</b>, you got second place</h3>
            </div>
            <div v-else>
                <h3 class="text-center"><b>{{ user.name }}</b>, you need more concentration </h3>
            </div>
            <button @click="winner_screen = 0" class="btn btn-sm btn-secondary">Close</button>
            
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="modal-dialog">
                        <div class="modal-content" v-for="question in questions" v-if="question.id == current" >
                            <div class="modal-header" style="justify-content:flex-start">
                                <div class="col-xs-1 my-1 element-animation0">
                                    <span class="bg-success text-white rounded-circle" id="qid">{{ qid + 1 }}</span>
                                </div>
                                <div class="col-xs-11">
                                    <h6 class="pl-1 element-animation0"> {{ ToText(question.question_text) }}</h6>
                                </div>
                                
                            </div>
                            <div class="modal-body">
                                <div class="col-md-8 offset-md-2 element-animation1" v-if="question.more_info_link">
                                    <img class="image w-100 mb-2 rounded" :src="question.more_info_link" style="max-height:40vh">
                                </div>
                                
                                <ul class="list-group" v-for="(option, index) in question.options">
                                    <li @click="clickSelect(index, option)" 
                                        class="list-group-item list-group-item-action cursor my-1"
                                        :class="[`element-animation${index + 1}`, {selected:qoption.selected == index}]">
                                        {{ ToText(option.option) }}
                                    </li>
                                   <!--  <li 
                                        @click="checkAnswer(question.id, option.option, option.correct)" 
                                        class="list-group-item list-group-item-action cursor my-1"
                                        :class="`element-animation${index + 1} ` {selected:selected == index}">
                                        {{ ToText(option.option) }}
                                    </li> -->
                                </ul> 
                            </div>
                            <div class="modal-footer text-muted">
                                <button class="btn btn-success float-right rounded-pill element-animation5" 
                                    :class="{disabled:qoption.selected == null}"
                                    @click="submitAnswer">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="col-md-6" >
                <div class="card text-white bg-secondary my-4">
                  <div class="card-header text-center card-title"> 
                    <strong>Information</strong>
                    <a @click="reloadPage" class="btn btn-sm btn-warning float-right" >Reset</a>
                  </div>
                    <div class="card-body">
                        <ul class="list-group text-dark">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Time Taken 
                            <span class="badge badge-light badge-pill">
                                {{ minutes }}: {{ (seconds > 9) ? seconds : ('0' + seconds)  }} 
                            </span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Correct
                            <span class="badge badge-success badge-pill">{{ correct }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Wrong
                            <span class="badge badge-danger badge-pill">{{ wrong }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center p-0">
                            <div id="accordion" class="w-100">
                                <div class="card text-white bg-secondary">
                                    <div class="card-header py-1 bg-secondary" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <small class="mb-0 cursor">
                                          Result Details
                                      </small>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body p-0">
                                        <ul class="list-group text-dark" style="max-height: 380px; overflow:auto;">
                                            <li v-for="result in results" :key="result.id" class="list-group-item d-flex justify-content-between align-items-center p-1">
                                                <div class="font-weight-light f-13">
                                                    <span class="font-weight-bold">
                                                        {{ ToText(result.question) }}
                                                    </span>
                                                    <p v-if="result.isCorrect">
                                                     <span class="font-weight-light font-italic"> {{ ToText(result.selected) }}</span>
                                                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                                                    </p>
                                                    <p v-else>
                                                        <span class="font-weight-light font-italic">
                                                            {{ ToText(result.selected) }}
                                                        </span>
                                                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                                        <br>

                                                        <span class="font-weight-light font-italic"> {{ ToText(result.answer) }}</span>
                                                        <i class="fa fa-check text-success" aria-hidden="true"></i>

                                                    </p>

                                                </div>
                                                 <span class="badge badge-light badge-pill">
                                                    {{ result.time  }} 
                                                </span>
                                            </li>
                                          
                                        </ul>
                                      </div>
                                    </div>
                                </div>
                              
                            </div>
                          </li>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                        <a class="btn btn-sm btn-warning float-right" @click="nextQuestion">NEXT QUESTION</a>
                    </div> 
                </div>
                <div class="card my-4" v-for="question in questions" v-if="question.id == current" >
                    <pie-chart :ans='answer()' :qoptions='question.options'></pie-chart>
                </div>
            </div>
            
           

        </div>
    </div>
</template>

<script>
    
import PieChart from '../helper/PieChart'
    export default {
        props : ['id', 'user', 'questions'],

        components: { PieChart },

        data() {
            return {
                qoption:{
                    selected: null,
                    id: null,
                    option: null,
                    correct: null,
                },
                ans: [2,5,1,3],
                
                results: [],
                current: 0,
                qid: 0,
                winner_screen: false,
                score: 0,
                gamedata:{},
                timer:null,
                minutes:0,
                seconds:0,
                correct:0,
                wrong:0,
                answer_seconds:0,
                answer_minutes:0,
                mc:0,
            };
        },

        mounted() {
            console.log('timer start')

            this.current = this.questions[this.qid].id

            // let confetti = document.createElement('script')
            // confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js')
            // document.head.appendChild(confetti)

            // this.startTimer()
            
        },

        methods: {
            ToText(HTML){
              var input = HTML;
              return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,'').replace(/<[^>]+?>/g,'').replace(/\s+/g,' ').replace(/ /g,' ').replace(/>/g,' ').replace(/&nbsp;/g,'');  
            },

            answer(){
                return [1,3];
            },
            
            checkAnswer(q, a, rw){
                this.right_wrong = rw
                this.gamedata.['id'] = this.qid + 1
                this.gamedata.['question'] = this.questions[this.qid].question_text
                this.gamedata.['answer'] = this.getCorrectAnswertext()
                this.gamedata.['selected'] = a
                this.gamedata.['isCorrect'] = rw
                this.gamedata.['time'] = this.answer_minutes +':'+ this.answer_seconds 
                rw ==1 ? this.correct ++ : this.wrong ++
                
                let clone = {...this.gamedata}
                this.results.push(clone)
                this.answer_minutes = 0
                this.answer_seconds = 0

                if(this.qid+1 == this.questions.length){
                    clearInterval(this.timer);
                        this.winner()
                        return
                }

                this.qid ++
                this.current = this.questions[this.qid].id
            },

            nextQuestion(){
                
                this.answer_minutes = 0
                this.answer_seconds = 0

                if(this.qid+1 == this.questions.length){
                    clearInterval(this.timer);
                        this.winner()
                        return
                }

                this.qid ++
                this.current = this.questions[this.qid].id
            },
            submitAnswer(){
                if(this.qoption.selected == null){
                    alert('Please select an option first!')
                    return;
                }

                this.checkAnswer(this.qoption.id, this.qoption.option, this.qoption.correct);
            },

            getCorrectAnswertext(){
                return this.questions[this.qid].options.find(o => o.correct == 1).option
            },

            winner(){
                this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
                this.winner_screen = 1
                if(this.wrong == 0 ){
                    confetti({
                        zIndex:999999,
                        particleCount: 200,
                        spread: 120,
                        origin: { y: 0.6 }
                    });
                }
            },
            startTimer(){
                console.log('timer start')
                this.timer = 
                    setInterval(() => {
                        this.seconds ++
                        if(this.seconds >59) {
                            this.seconds = 0
                            this.minutes ++
                        }

                        this.answer_seconds ++
                        if(this.answer_seconds >59) {
                            this.answer_seconds = 0
                            this.answer_minutes ++
                        }
                        
                    }, 1000);
            },
            reloadPage(){
                window.location.reload()
            },
            clickSelect(index, option){
                if(this.qoption.selected == index){
                    this.qoption.selected = null
                    this.qoption.id = option.question_id
                    this.qoption.option= null
                    this.qoption.correct= null
                }else{
                    this.qoption.selected = index
                    this.qoption.id = option.question_id
                    this.qoption.option= option.option
                    this.qoption.correct= option.correct
                }

            }
        }
        

    };

</script>


<style type="text/css" scoped="">
    .cursor{
        cursor: pointer;
    }
    .list-group-item p {
        margin: 0 !important;
    }
    .loading, .result, .winner {
        position: fixed;
        z-index: 9999;
        top: 0;
        width: 100vw;
        height: 100vh;
        background: white;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /*background-image: linear-gradient(-225deg, #7DE2FC 0%, #B9B6E5 100%);*/
    }
    .q_num {
        position: absolute;
        right: 5px;
        width: 100%;
        top: 0px;
    }
    .fade-leave-active, .fade-enter-active {
      transition: 0.3s ease-out;
    }
    
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;

    }
    .f-13{
        font-size: 13px;
    }
    .selected{
        background: #38c172;
        color: white;
        font-weight: bold;
    }


#qid {
  padding: 10px 16px;
  -moz-border-radius: 50px;
  -webkit-border-radius: 50px;
  border-radius: 20px;
}




.element-animation0 {
    animation: animationFrames ease .6s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease .6s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease .6s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation1 {
    animation: animationFrames ease .8s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease .8s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease .8s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation2 {
    animation: animationFrames ease 1s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease 1s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease 1s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation3 {
    animation: animationFrames ease 1.2s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease 1.2s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease 1.2s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation4 {
    animation: animationFrames ease 1.4s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease 1.4s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease 1.4s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation5 {
    animation: animationFrames ease 1.6s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease 1.6s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease 1.6s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
@keyframes animationFrames {
    0% {
        opacity: 0;
        transform: translate(-1500px,0px)
    }

    60% {
        opacity: 1;
        transform: translate(30px,0px)
    }

    80% {
        transform: translate(-10px,0px)
    }

    100% {
        opacity: 1;
        transform: translate(0px,0px)
    }
}

@-webkit-keyframes animationFrames {
    0% {
        opacity: 0;
        -webkit-transform: translate(-1500px,0px)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate(30px,0px)
    }

    80% {
        -webkit-transform: translate(-10px,0px)
    }

    100% {
        opacity: 1;
        -webkit-transform: translate(0px,0px)
    }
}

@-ms-keyframes animationFrames {
    0% {
        opacity: 0;
        -ms-transform: translate(-1500px,0px)
    }

    60% {
        opacity: 1;
        -ms-transform: translate(30px,0px)
    }
    80% {
        -ms-transform: translate(-10px,0px)
    }

    100% {
        opacity: 1;
        -ms-transform: translate(0px,0px)
    }
}


</style>
