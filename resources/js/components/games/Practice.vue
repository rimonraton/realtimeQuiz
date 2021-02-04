<template>
    <div class="container">
        <div class="winner" v-if="winner_screen">
            <h2 class="text-center">Quiz Game Over</h2>
            <h3><b>{{ pm.perform_message }} </b></h3>
            <resultdetails :results='results' :ws="winner_screen" />

        </div>

        <div class="row justify-content-center">
            <div class="col-md-7" >
                <div class="card my-4" v-for="question in questions" v-if="question.id == current" >
                <transition name="fade" mode="out-in">
                    <div class="card-body" :key="qid">
                        <span class="q_num text-right text-muted">Question {{ qid + 1 }} of {{ questions.length }}</span>

                        <img v-if="question.more_info_link" class="image w-100 mt-1 rounded" :src="question.more_info_link" style="max-height:70vh">

                        <p class="my-1 font-bold" v-html="question.question_text"></p> 
                        <!-- <p class="my-1 font-bold">{{ ToText(question.question_text) }} </p>  -->

                        <ul class="list-group" v-for="option in question.options">
                            <li @click="checkAnswer(question.id, option.option, option.correct)" 
                                class="list-group-item list-group-item-action cursor my-1" v-html="option.option">
                            </li>
                        </ul> 

                    </div>

                </transition>                 
                </div>
            </div>
            <div class="col-md-5">
                <div class="card my-4">
                  <div class="card-header text-center card-title py-1"> 
                    <strong>Information</strong>
                    <div class="btn btn-sm btn-warning float-right"
                        v-if="qid > 0"
                         @click="reloadPage">Reset</div>
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
                      <li v-if="qid > 0" class="list-group-item d-flex justify-content-between align-items-center p-0">
                        <resultdetails :results='results' :ws="winner_screen" />
                      </li>
                    </ul>

                    
                  </div>
                </div>

            </div>
           

        </div>
    </div>
</template>

<script>

    import resultdetails from '../helper/practice/resultdetails'
    

    export default {
        props : ['id', 'user', 'questions', 'gmsg'],
        components: { resultdetails },

        data() {
            return {
                results: [],
                current: 0,
                qid: 0,
                winner_screen: false,
                gamedata:{},
                timer:null,
                minutes:0,
                seconds:0,
                correct:0,
                wrong:0,
                answer_seconds:0,
                answer_minutes:0,
                mc:0,
                pm:''
            };
        },

        mounted() {
            console.log('timer start')

            this.current = this.questions[this.qid].id

            let confetti = document.createElement('script')
            confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js')
            document.head.appendChild(confetti)

            this.startTimer()
            
        },

        methods: {
            ToText(HTML){
              var input = HTML;
              return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,'').replace(/<[^>]+?>/g,'').replace(/\s+/g,' ').replace(/ /g,' ').replace(/>/g,' ').replace(/&nbsp;/g,'').replace(/&lsquo;/g,'').replace(/&rsquo;/g,'');  
            },
            startTimer(){
                console.log('timer start')
                this.timer = setInterval(() => {
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
            checkAnswer(q, a, rw){
                this.right_wrong = rw
                this.gamedata.['id'] = this.qid + 1
                this.gamedata.['question'] = this.questions[this.qid].question_text
                this.gamedata.['answer'] = this.getCorrectAnswertext()
                this.gamedata.['selected'] = a
                this.gamedata.['isCorrect'] = rw
                this.gamedata.['time'] = this.answer_minutes +':'+ this.answer_seconds 
                rw == 1 ? this.correct ++ : this.wrong ++
                
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

            getCorrectAnswertext(){
                return this.questions[this.qid].options.find(o => o.correct == 1).option
            },

            winner(){
                var perform = this.correct / this.questions.length * 100

                this.pm = this.gmsg.filter(g => g.perform_status >= perform)
                                    .reduce(function(prev, curr) {
                                     return prev.perform_status < curr.perform_status ? prev : curr;
                                 });
                this.winner_screen = 1
                if(perform == 100 ){
                    confetti({
                        zIndex:999999, particleCount: 200, spread: 120, origin: { y: 0.6 }
                    });
                }
                if(perform >= 75 ){
                    var colors = ['#bb0000', '#0AE84E'];

                    confetti({ 
                        zIndex:999999, particleCount: 100, angle: 60, spread: 55, origin: { x: 0 }, colors: colors
                    });
                    confetti({
                        zIndex:999999, particleCount: 100, angle: 120, spread: 55, origin: { x: 1 }, colors: colors
                    });
                }
            },
            reloadPage(){
                window.location.reload()
            },
        }
        

    };

</script>

