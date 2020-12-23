<template>
    <div class="container">
        <div class="winner" v-if="screen.winner">
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
            <button @click="screen.winner = 0" class="btn btn-sm btn-secondary">Close</button>
            
        </div>

        <result :results='results' :lastQuestion='(qid + 1) == questions.length'
                v-if="screen.result">                       
        </result>

        <div class="row justify-content-center" v-if="user.id == uid">
            <div class="col-md-7">
                <questions :questions="questions" :qid="qid" ></questions>
            </div>

            <div class="col-md-5">
                <div class="card text-white bg-secondary">
                  <div class="card-header card-title d-flex justify-content-between"> 
                    <a @click="reloadPage" class="btn btn-sm btn-warning" >Reset</a>
                    <!-- <strong>Information</strong> -->
                    <a class="btn btn-sm btn-warning" @click="nextQuestion">NEXT QUESTION</a>
                  </div>
                    <div class="card-body">
                        <ul class="list-group text-dark">
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
                </div>

                <div class="leaderboard mt-4">
                  <h3 class="text-white p-2">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    Leader Board
                  </h3>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <mark>Rasel Mia</mark>
                      <small class="text-white">8</small>
                    </li>
                    <li class="list-group-item">
                      <mark>Motaharul Islam</mark>
                      <small class="text-white">7</small>
                    </li>
                    <li class="list-group-item">
                      <mark>Mahmudul Hassan</mark>
                      <small class="text-white">6</small>
                    </li>
                    <li class="list-group-item">
                      <mark>Abul Bashar</mark>
                      <small class="text-white">5</small>
                    </li>
                    
                    <li class="list-group-item">
                      <mark>Zulfiker Ali</mark>
                      <small class="text-white">1</small>
                    </li>
                  </ul>
                </div>
                
            </div>
        </div>
        <div class="row justify-content-center" v-if="user.id != uid">
            <div class="col-md-8">
                <div class="container-fluid">
                    <!-- <div class="modal-dialog"> -->
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
                                </ul> 
                            </div>
                            <div class="modal-footer text-muted d-flex justify-content-between">
                                <button class="btn btn-secondary rounded-pill element-animation5" 
                                    :class="{disabled: !qoption.selected }"
                                    @click="predictAnswer">
                                    Group Predict
                                </button>
                                <button class="btn btn-success float-right rounded-pill element-animation5" 
                                    :class="{disabled:qoption.selected == null}"
                                    @click="submitAnswer">
                                    Submit
                                </button>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-md-4" >
                <div class="card mb-4" v-for="question in questions" v-if="question.id == current && groupPredict()" >
                    <span class="text-center"> <strong>Group Prediction</strong></span>
                    <pie-chart :chart-data="datacollection"></pie-chart>
                </div>

                <div class="card">
                    <div class="card-header">Group Member</div>
                    <div class="card-body p-0">
                        <ul class="list-group" v-for="gu in users">
                            <li class="list-group-item py-1" v-if="user.gid == gu.gid">{{ gu.name }}</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import PieChart from '../helper/PieChart'
    import questions from '../helper/moderator/questions'
    import result from '../helper/result'


    export default {
        props : ['id', 'uid', 'user', 'questions'],

        components: { PieChart, questions, result },

        data() {
            return {
                users: [],
                datacollection: null,
                qoption:{
                    selected: null,
                    id: null,
                    option: null,
                    correct: null,
                },

                prediction: [],
                
                results: [],
                current: 0,
                qid: 0,
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
                pie_data: [],
                screen:{
                    waiting: 0,
                    loading: 0,
                    result: 0,
                    winner: 0,
                },
            };
        },

        mounted() {
            console.log('timer start')

            this.current = this.questions[this.qid].id

            this.fillPie()


            Echo.join(`team.${this.id}.${this.uid}`)
                .here((users) => {
                    this.users = users;
                })
                .joining((user) => {
                    this.users.push(user);
                    console.log(`${user.name} join`);

                    if(this.game_start){
                        this.kickUser(user.id)
                    }
                })
                .leaving((user) => {
                    this.users = this.users.filter(u => u.id != user.id);
                    console.log(`${user.name} leaving`);
                });

            this.current = this.questions[this.qid].id


        },


        created(){
            Echo.channel(this.channel)
                .listen('GameStartEvent', (data) => {
                    console.log('GameStartEvent.............')
                    this.game_start = 1 // Game Start from Game Owner...
                    this.screen.waiting = 0
                    this.QuestionTimer() // Set and Start QuestionTimer

                })
                .listen('NextQuestionEvent', (data) => {
                    console.log('NextQuestionEvent.............')
                    this.qid = data.qid
                    this.current = this.questions[this.qid].id // Next Question from Moderator...
                    this.pie_data = []
                    this.prediction = []
                    this.qoption.selected = null
                    this.fillPie()

                })
                .listen('AnswerPredictEvent', (data) => {
                    console.log('AnswerPredictEvent.............')
                    this.prediction.push(data)
                    this.getPredict()
                    this.fillPie()
                })
                .listen('QuestionClickedEvent', (data) => {
                    console.log('QuestionClickedEvent.............')
                    this.answered_user_data.push(data)
                    this.answered_user ++
                    this.loadingScreen()
                })
                .listen('KickUserEvent', (data) => {
                    console.log('KickUserEvent.............')
                    this.users = this.users.filter( u => u.id !== data.uid )

                    if(this.user.id == data.uid){
                        window.location.href = "http://quiz.erendevu.net"
                    }
                    
                });

        },
       

        methods: {
            
            checkAnswer(q, a, rw){
                this.right_wrong = rw
                this.gamedata.['id'] = this.qid + 1
                this.gamedata.['question'] = this.ToText(this.questions[this.qid].question_text)
                this.gamedata.['answer'] = this.ToText(this.getCorrectAnswertext())
                this.gamedata.['selected'] = this.ToText(a)
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
                console.log('NextQuestion Clicked')
                
                this.answer_minutes = 0
                this.answer_seconds = 0

                if(this.qid+1 == this.questions.length){
                    clearInterval(this.timer);
                        this.winner()
                        return
                }

                this.qid ++
                this.current = this.questions[this.qid].id
                this.fillPie()

                let next = { channel: this.channel, qid: this.qid }

                axios.post(`/api/nextQuestion`, next)

            },
            submitAnswer(){
                if(this.qoption.selected == null){
                    alert('Please select an option first!')
                    return;
                }
                
                this.checkAnswer(this.qoption.id, this.qoption.option, this.qoption.correct);
                this.qoption.selected = null
                this.qoption.id = null
                this.qoption.option = null
                this.qoption.correct = null
                this.fillPie()
                this.screen.result = 1

            },

            predictAnswer(){

                let pre = { 
                    ans: this.ToText(this.qoption.option),
                    user:this.user,
                    channel: this.channel,
                }

                if (this.isPredict()){

                    this.prediction.push(pre)

                    axios.post(`/api/answerPredict`, pre)

                    this.getPredict()

                    this.fillPie()
                }

            },
            isPredict(){
                return !this.prediction.find(p => p.user.id === this.user.id)
            },
            groupPredict(){
                return this.prediction.find(p => p.user.gid === this.user.gid)
            },

            getPredict(){
                var counts = {};
                let options = this.questions[this.qid].options
                this.prediction.forEach(p => { 
                    if(p.user.gid === this.user.gid){
                        counts[p.ans] = (counts[p.ans] || 0)+1; 
                    }
                });

                this.pie_data = options.map(o => {
                    var c = counts[this.ToText(o.option)]
                    if(c === undefined)
                        return 0
                    return c 
                })

            },

            getCorrectAnswertext(){
                return this.questions[this.qid].options.find(o => o.correct == 1).option
            },

            winner(){
                this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
                this.screen.winner = 1
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
                console.log(this.isPredict())

            },

            fillPie() {
                this.datacollection = {
                    labels: this.questions[this.qid].options.map(o => { return this.ToText(o.option) }),
                    datasets: [{
                      borderWidth: 1,
                      borderColor: ['#7fdbda', '#ade498', '#ede682', '#febf63'],
                      backgroundColor: [ '#7fdbda', '#ade498', '#ede682', '#febf63'],
                      data: this.pie_data,
                    }]
                }
            },

            ToText(input){
              return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,'').replace(/<[^>]+?>/g,'').replace(/\s+/g,' ').replace(/ /g,' ').replace(/>/g,' ').replace(/&nbsp;/g,'').replace(/&rsquo;/g,'');  
            },

            answer(){
                return this.ans;
            },
            
        },

        computed: {
            channel(){
                return `team.${this.id}.${this.uid}`
            },
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

    .leaderboard {
      position: relative;
      background: -webkit-linear-gradient(top, #3a404d, #181c26);
      background: linear-gradient(to bottom, #3a404d, #181c26);
      border-radius: 10px;
      /*box-shadow: 0 7px 30px rgba(62, 9, 11, 0.3);*/
    }


    .leaderboard ul li {
      position: relative;
      z-index: 1;
      font-size: 14px;
      counter-increment: leaderboard;
      padding: 18px 10px 18px 50px;
      cursor: pointer;
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      -webkit-transform: translateZ(0) scale(1, 1);
              transform: translateZ(0) scale(1, 1);
    }
    .leaderboard ul li::before {
      content: counter(leaderboard);
      position: absolute;
      z-index: 2;
      top: 15px;
      left: 15px;
      width: 20px;
      height: 20px;
      line-height: 20px;
      color: #c24448;
      background: #fff;
      border-radius: 20px;
      text-align: center;
    }
    .leaderboard ul li mark {
      position: absolute;
      z-index: 2;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      padding: 18px 10px 18px 50px;
      margin: 0;
      background: none;
      color: #fff;
    }
    .leaderboard ul li mark::before, .leaderboard ul li mark::after {
      content: '';
      position: absolute;
      z-index: 1;
      bottom: -11px;
      left: -9px;
      border-top: 10px solid #c24448;
      border-left: 10px solid transparent;
      -webkit-transition: all .1s ease-in-out;
      transition: all .1s ease-in-out;
      opacity: 0;
    }
    .leaderboard ul li mark::after {
      left: auto;
      right: -9px;
      border-left: none;
      border-right: 10px solid transparent;
    }
    .leaderboard ul li small {
      position: relative;
      z-index: 2;
      display: block;
      text-align: right;
    }
    .leaderboard ul li::after {
      content: '';
      position: absolute;
      z-index: 1;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #fa6855;
      box-shadow: 0 3px 0 rgba(0, 0, 0, 0.08);
      -webkit-transition: all .3s ease-in-out;
      transition: all .3s ease-in-out;
      opacity: 0;
    }
    .leaderboard ul li:nth-child(1) {
      background: #fa6855;
    }
    .leaderboard ul li:nth-child(1)::after {
      background: #fa6855;
    }
    .leaderboard ul li:nth-child(2) {
      background: #e0574f;
    }
    .leaderboard ul li:nth-child(2)::after {
      background: #e0574f;
      box-shadow: 0 2px 0 rgba(0, 0, 0, 0.08);
    }
    .leaderboard ul li:nth-child(2) mark::before, .leaderboard ul li:nth-child(2) mark::after {
      border-top: 6px solid #ba4741;
      bottom: -7px;
    }
    .leaderboard ul li:nth-child(3) {
      background: #d7514d;
    }
    .leaderboard ul li:nth-child(3)::after {
      background: #d7514d;
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.11);
    }
    .leaderboard ul li:nth-child(3) mark::before, .leaderboard ul li:nth-child(3) mark::after {
      border-top: 2px solid #b0433f;
      bottom: -3px;
    }
    .leaderboard ul li:nth-child(4) {
      background: #cd4b4b;
    }
    .leaderboard ul li:nth-child(4)::after {
      background: #cd4b4b;
      box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15);
    }
    .leaderboard ul li:nth-child(4) mark::before, .leaderboard ul li:nth-child(4) mark::after {
      top: -7px;
      bottom: auto;
      border-top: none;
      border-bottom: 6px solid #a63d3d;
    }
    .leaderboard ul li:nth-child(5) {
      background: #c24448;
      border-radius: 0 0 10px 10px;
    }
    .leaderboard ul li:nth-child(5)::after {
      background: #c24448;
      box-shadow: 0 -2.5px 0 rgba(0, 0, 0, 0.12);
      border-radius: 0 0 10px 10px;
    }
    .leaderboard ul li:nth-child(5) mark::before, .leaderboard ul li:nth-child(5) mark::after {
      top: -9px;
      bottom: auto;
      border-top: none;
      border-bottom: 8px solid #993639;
    }
    .leaderboard ul li:hover {
      z-index: 2;
      overflow: visible;
    }
    .leaderboard ul li:hover::after {
      opacity: 1;
      -webkit-transform: scaleX(1.06) scaleY(1.03);
              transform: scaleX(1.06) scaleY(1.03);
    }
    .leaderboard ul li:hover mark::before, .leaderboard ul li:hover mark::after {
      opacity: 1;
      -webkit-transition: all .35s ease-in-out;
      transition: all .35s ease-in-out;
    }


</style>
