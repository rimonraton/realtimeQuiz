<template>
    <div class="container mt-n2">
        <div class="progress mb-3" v-if="uid == user.id">
            <div class="progress-bar"
                 v-for="(team, i) in answered_group"
                 :class="[ i % 2 == 0 ? 'bg-danger' : 'bg-success' ]"
                 :style="setProgress">
                {{ team.name }}
            </div>
        </div>
        <div class="winner" v-if="screen.winner">
            <div v-if="resultPosition() == 0">
                <h1 class="text-center">Congratulation ! </h1>
                <h3><b>{{ user.name }}</b> won this game.</h3>
            </div>
            <div v-else-if="resultPosition() == 1">
                <h1 class="text-center">Well Played ! </h1>
                <h3><b>{{ user.name }}</b> got second place</h3>
            </div>
            <div v-else>
                <h3 class="text-center"><b>{{ user.name }}</b> need more concentration </h3>
            </div>
            <button @click="screen.winner = 0" class="btn btn-sm btn-secondary">Close</button>

        </div>
        <waiting :teams="teams" :teamUser="teamUser" :uid='uid' :users='users' :user='user' :time='id.schedule'
                 @kickingUser="kickUser($event)"
                 @gameStart="gameStart"
                 @gameReset="gameReset"
                 v-if="screen.waiting"
                 @addTeam="addTeam($event)"
                 @deleteTeam="deleteTeam($event)">
        </waiting>
        <team-member :teams="teams" :user="user" @joinTeam="joinTeam($event)"
                     v-if="screen.team == 1 && user.id != uid">
        </team-member>
        <group-result
            :results='results'
            :groupName='team.name'
            :lastQuestion='(qid + 1) == questions.length'
            :user="user"
            v-if="screen.result">
        </group-result>
        <team-result :results="results" :uid="uid" :user="user" v-if="screen.teamresult" :teamPosition="position" :teamuser="getUserTeam()"></team-result>

        <div class="row justify-content-center" v-if="user.id == uid">
            <div class="col-md-7">
                <questions :questions="questions" :qid="qid" :topics="topics" :user="user" @addQuestion="addQuestion($event)"></questions>
            </div>

            <div class="col-md-5">
                <div class="form-group mt-1">
                    <input type="number" class="form-control"  placeholder="Enter Time in Seconds" v-model="question_time">
                </div>
                <div class="card text-white bg-secondary">
                    <div class="card-header card-title d-flex justify-content-between">
                        <a @click="reloadPage" class="btn btn-sm btn-danger" >{{tbe('রিসেট','Reset',user.lang)}}</a>
                        <!-- <strong>Information</strong> -->
                        <a class="btn btn-sm btn-info" v-if="!isLastQuestion" @click="teamResult">{{ tbe('খেলা শেষ করুন','Game Finish',user.lang) }}</a>

                        <a class="btn btn-sm btn-warning" v-if="isLastQuestion" @click="nextQuestion">{{ tbe('পরবর্তী প্রশ্ন','NEXT QUESTION',user.lang) }}</a>
                    </div>
                    <div class="card-body" v-if="results.length > 0">
                        <h3 class="p-2">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                            {{ tbe('লিডার বোর্ড','Leader Board',user.lang) }}
                        </h3>
                        <ul class="list-group text-dark">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-0" v-for="(result, key) in results" :key="key">
                                <div :id="'accordion' + key" class="w-100">
                                    <div class="card text-white bg-secondary">
                                        <div class="card-header py-1 bg-secondary d-flex justify-content-between"
                                             :id="'heading' + key" data-toggle="collapse"
                                             :data-target="'#collapse' + key" aria-expanded="true"
                                             :aria-controls="'collapse' + key">
                                            <small class="mb-0 cursor">
                                                {{ result.name }}
                                            </small>
                                            <span class="badge badge-success badge-pill">
                                            {{ result.score  }}
                                        </span>
                                        </div>

                                        <div :id="'collapse' + key" class="collapse show"
                                             :aria-labelledby="'heading' + key"
                                             :data-parent="'#accordion' + key">
                                            <div class="card-body p-0">
                                                <ul class="list-group text-dark" style="max-height: 380px; overflow:auto;">
                                                    <li v-for="(answer, key) in result.answers" :key="key" class="list-group-item d-flex justify-content-between align-items-center p-1">
                                                        <div class="font-weight-light f-13">
                                                            <!-- <span class="font-weight-bold">
                                                                {{ answer.question }}
                                                            </span> -->
                                                            <span class="font-weight-light font-italic">
                                                        {{ answer.user.name + ' - ' + answer.selected }}
                                                    </span>
                                                            <i v-if="answer.isCorrect == 1" class="fa fa-check text-success" aria-hidden="true" ></i>
                                                            <i v-else class="fa fa-times text-danger" aria-hidden="true" ></i>

                                                        </div>

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
            </div>
        </div>
        <div class="row justify-content-center" v-if="user.id != uid">
            <div class="col-md-8">
                <div class="progress mb-3" v-if="qt.time > 0">
                    <div class="progress-bar progress-bar-striped"
                         :style="progressWidth"
                         :class="progressClass"
                    > {{ Math.floor(progress_count) }}
                    </div>
                </div>
                <div class="container-fluid px-0">
                    <!-- <div class="modal-dialog"> -->
                    <div class="modal-content" v-for="question in questions" v-if="question.id == current" >
                        <div class="modal-header" style="justify-content:flex-start">
                            <div class="col-xs-1 my-1 element-animation0">
                                <span class="bg-success text-white rounded-circle" id="qid">{{ user.lang=='gb'?qid + 1:q2bNumber(qid + 1) }}</span>
                            </div>
                            <div class="col-xs-11">
                                <h6 class="pl-1 element-animation0">
                                    {{ tbe(question.bd_question_text, question.question_text, user.lang) }}
                                </h6>
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
                                    {{ tbe(option.bd_option, option.option, user.lang) }}
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer text-muted d-flex justify-content-between">
                            <button class="btn btn-secondary rounded-pill element-animation5"
                                    :class="{disabled: !qoption.selected }"
                                    @click="predictAnswer">
                                {{tbe('ভবিষ্যদ্বাণী দিন','Predict',user.lang)}}
                            </button>
                            <button class="btn btn-success float-right rounded-pill element-animation5"
                                    :class="{disabled:qoption.selected == null}"
                                    @click="submitAnswer">
                                {{ tbe('সাবমিট করুন','Submit',user.lang) }}
                            </button>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-md-4" >
                <div class="card mb-4" v-for="question in questions" v-if="question.id == current && groupPredict()" >
                    <span class="text-center"> <strong>{{tbe('দলের ভবিষ্যদ্বাণী','Team Prediction',user.lang)}}</strong></span>
                    <pie-chart :chart-data="datacollection"></pie-chart>
                </div>

                <div class="card my-2" v-for="ug in userGroup" v-if="ug.group != 'undefined'">
                    <div class="card-header py-1 text-primary">{{ ug.group }} group member</div>
                    <div class="card-body p-0">
                        <ul class="list-group" v-for="member in ug.members" >
                            <li class="list-group-item py-1"
                                :class="{'text-success': member.id == user.id}"
                            >
                                {{ member.name }}
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!--modal-->

    </div>
</template>

<script>
import PieChart from '../helper/PieChart'
import questions from '../helper/moderator/questions'
import groupResult from '../helper/groupResult'
import waiting from '../helper/moderator/waiting'
import TeamMember from '../helper/TeamMember'
import TeamResult from '../helper/TeamResult'


export default {
    props : ['id', 'uid', 'user', 'questions','teams','gmsg','topics'],

    components: { PieChart, questions, groupResult,waiting,TeamMember,TeamResult },

    data() {
        return {
            qt:{
                ms: 0,
                time:60,
                timer:null
            },
            question_time:60,
            counter: 2,
            answered_user_data: [],
            answered_group:[],
            users: [],
            datacollection: null,
            progress:{},
            progress_count:100,
            qoption:{
                selected: null,
                id: null,
                option: null,
                correct: null,
            },
            prediction: [],
            current: 0,
            qid: 0,
            results: [],
            gamedata:{},
            pie_data: [],
            screen:{
                waiting: 1,
                loading: 1,
                result: 0,
                winner: 0,
                team:1,
                teamresult:0,
            },
            teamUser:[],
            team: null,
            isModalVisible: false,
            existing_qid:[],
            q_lenght:this.questions.length,
            team_ranking:null,
            perform:null,
            position:null,
        };
    },

    mounted() {
       // console.log('Hello' + this.resultPosition());
        // window.onblur = alert('blurd')

        let confetti = document.createElement('script')
        confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js')
        document.head.appendChild(confetti)

        this.current = this.questions[this.qid].id

        this.fillPie()


        Echo.join(`team.${this.id}.${this.uid}`)
            .here((users) => {
                this.users = users.filter(u => u.id != this.uid)
            })
            .joining((user) => {
                if(user.id != this.uid)
                    this.users.push(user);
                console.log(`${user.name} join`);

                if(this.game_start)
                    this.kickUser(user.id)
            })
            .leaving((user) => {
                this.users = this.users.filter(u => u.id != user.id);
                console.log(`${user.name} leaving`);
            });

        this.current = this.questions[this.qid].id


    },


    created(){
        Echo.channel(this.channel)

            .listen('TeamResult', (data) => {
                console.log('TeamResult..........')
                this.screen.teamresult = 1;
                if (this.resultPosition() == 0){
                    confetti({
                        zIndex:999999,
                        particleCount: 200,
                        spread: 120,
                        origin: { y: 0.6 }
                    });
                }

                // data.questions.map(q=>this.questions.push(q))
                // this.QuestionTimer() // Set and Start QuestionTimer

            })
            .listen('DeleteTeamEvent', (data) => {
                console.log('DeleteTeamEvent..........')
                console.log(data);
                const index = this.teams.findIndex(e => {
                    return data.id === e.id;
                });
                this.teams.splice(index,1);

                // data.questions.map(q=>this.questions.push(q))
                // this.QuestionTimer() // Set and Start QuestionTimer

            })
            .listen('AddTeamEvent', (data) => {
                console.log('AddTeamEvent..........')
                console.log(data);
                this.teams.push(data.newTeam);

                // data.questions.map(q=>this.questions.push(q))
                // this.QuestionTimer() // Set and Start QuestionTimer

            })
            .listen('AddQuestionEvent', (data) => {
                console.log('AddQuestionEvent..........')
                console.log(data);
                data.questions.map(q=>this.questions.push(q))
                // this.QuestionTimer() // Set and Start QuestionTimer

            })
            .listen('GameTeamModeratorStartEvent', (data) => {
                console.log('GameTeamModeratorStartEvent.............')
                this.game_start = 1 // Game Start from Game Owner...
                this.screen.waiting = 0
                this.user.lang = data.lang
                this.QuestionTimer() // Set and Start QuestionTimer

            })
            .listen('NextQuestionEvent', (data) => {
                console.log('NextQuestionEvent.............',data)
                this.qid = data.qid
                this.current = this.questions[this.qid].id // Next Question from Moderator...
                this.pie_data = []
                this.prediction = []
                this.qoption.selected = null
                this.screen.result = 0
                this.fillPie()
                if(data.qtime > 0){
                    this.TimerInit()
                    this.qt.time = data.qtime;
                    this.QuestionTimer()
                }

            })
            .listen('AnswerPredictEvent', (data) => {
                console.log('AnswerPredictEvent.............')
                console.log(data)
                if(data.user.gid == this.user.gid){
                    this.prediction.push(data)
                    this.getPredict()
                    this.fillPie()
                }
            })
            .listen('QuestionClickedEvent', (data) => {
                console.log('QuestionClickedEvent.............')
                this.answered_user_data.push(data)
                this.answered_user ++
                this.loadingScreen()
            })
            .listen('GroupAnsSubEvent', (req) => {
                console.log(['GroupAnsSubEvent....', req.data])
                this.answered_user_data.push(req.data)
                this.getResult()
                console.log([req.data,  this.user, this.user.id, this.uid])

                if(req.data.user.gid == this.user.gid && this.user.id != this.uid){
                    this.screen.result = 1
                }
                if(this.user.id == this.uid){
                    this.answered_group.push(req.data.team)
                }
                if(req.data.user.gid == this.user.gid) {
                    this.TimerInit();
                }

            })
            .listen('PageReloadEvent', (data) => {
                console.log('PageReloadEvent.............')
                window.location.reload()

            })
            .listen('TeamJoin', (data) => {
                console.log(['Team Join.............',data])
                this.teamUser.push({team: data.team, users: data.user});
                this.users.map(u=> {
                    if(u.id === data.user.id){
                        u.gid = data.team;
                    }
                })
                //this.teams.find(team => team.id === data.team).users.push({user:data.user});
            });

    },


    methods: {
        // winner_msg(){
        //     this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
        //     let user_score = this.results[this.user_ranking].score
        //     this.perform = Math.round((user_score / ((this.qid +1) * 100)) * 100)
        //     this.pm = this.gmsg.filter(gm => gm.perform_status >= this.perform)
        //         .reduce(function (prev, curr) {
        //             return prev.perform_status < curr.perform_status ? prev : curr;
        //         });
        // },

        resultPosition(){
             this.position = this.results.findIndex(r=>  r.name == this.getUserTeam() );
             return this.position;
        },
        getUserTeam(){
            if(this.uid == this.user.id){
                return null;
            }
            let team = this.teams.find(t=>t.id == this.user.gid)
            console.log('team..' + team);
            return team.name;
        },
        teamResult(){
            let ids = this.users.map(u => u.id)
            console.log(ids);
            axios.post(`/api/teamResult`,{channel:this.channel,qid:this.id,host:this.uid,users:ids,results:this.results}).then(this.screen.teamresult = 1)
        },

        deleteTeam(id){

            console.log(id);

            const index = this.teams.findIndex(e => {
                return id === e.id;
            });
            console.log('deleted');
            axios.post(`/api/deleteTeam`, {channel: this.channel,id: id}).then(res => {
                console.log(res.data);
                this.teams.splice(index,1);
            })

        },
        addTeam(teamData){
            axios.post(`/api/addTeam`, {channel: this.channel,teamData: teamData,qid:this.id,user_id:this.uid}).then(res => {
                this.teams.push(res.data);
            })
        },
        addQuestion(formData){
           let ext_qids = this.questions.map(q=> {
               return q.id
           });
            axios.post(`/api/addQuestion`, {channel: this.channel,formdata:formData,existing_qids:ext_qids}).then(res => {
                res.data.map(q=>this.questions.push(q))
                // this.questions.map(q=>this.existing_qid.push(q.id))
                console.log(res.data)
                this.q_lenght = this.questions.length;
                // this.questions.push(res.data);
                // $('#qmodal').modal('hide');
            })
        },
        getTeamUsers(team){
            let users = this.users.map(u => {
                if(u.gid === team) return u;
            });
            if(typeof(users !== 'undefined')) return users
            return [];
        },
        gameStart: function () {
            axios.post(`/api/gameTeamModeratorStart`, {channel: this.channel,lang:this.user.lang}).then(res =>  console.log(res.data))
            this.game_start = 1
            this.screen.waiting = 0
            // if(this.qt.time > 0){
            //     this.TimerInit()
            //     this.QuestionTimer()
            // }
            //this.QuestionTimer()
        },
        gameReset(){
            this.questionInit()
            this.screen.waiting = 1
            this.answered_user_data = []
            this.results = []
            this.qid = 0
            this.gamedata = {}
            this.score = []
            this.user_ranking = null
            this.game_start = 0
            this.current = this.questions[this.qid].id
        },

        nextQuestion(){
            console.log('NextQuestion Clicked')
            if(this.qid + 1 == this.questions.length){
                clearInterval(this.timer);
                this.winner()
                return
            }

            this.qid ++
            this.current = this.questions[this.qid].id
            this.fillPie()
            this.answered_group = []

            let next = { channel: this.channel, qid: this.qid,qtime:this.question_time }

            axios.post(`/api/nextQuestion`, next)


        },
        submitAnswer(){
            console.log(this.qoption);
            if(this.qoption.selected == null){
                alert('Please select an option first!')
                return;
            }
            console.log('data'+this.qoption.bd_option);
            this.checkAnswer(this.qoption.id,this.qoption.option, this.qoption.correct);
            this.qoption.selected = null
            this.qoption.id = null
            this.qoption.option = null
            this.qoption.correct = null
            this.screen.result = 1
            this.TimerInit()
        },

        checkAnswer(q, a, rw){
            this.gamedata.['id'] = this.qid + 1
            this.gamedata.['question'] = this.ToText(this.tbe(this.questions[this.qid].bd_question_text,this.questions[this.qid].question_text,this.user.lang))
            this.gamedata.['answer'] = this.ToText(this.getCorrectAnswertext())
            this.gamedata.['selected'] = this.ToText(a)
            this.gamedata.['isCorrect'] = rw
            this.gamedata.['user'] = this.user
            this.gamedata.['channel'] = this.channel
            this.gamedata.['team'] = this.team
            let clone = {...this.gamedata}
            console.log(clone);
            this.answered_user_data.push(clone)
            axios.post(`/api/submitAnswerGroup`, {data:clone}).then( response => this.getResult() )

        },

        QuestionTimer(){
            let pdec = 100 / (10 * this.qt.time);
            console.log('QuestionTimer started')
            this.qt.timer =
                setInterval(() => {
                    if(this.qt.time == 0){
                        this.qoption.selected = -1;
                        this.qoption.option ='Not Answered';
                        this.qoption.correct = 0;
                        this.submitAnswer()
                        this.qoption.selected = null
                        console.log('time ses');
                        this.TimerInit()
                    }
                    else{
                        this.qt.ms ++
                        this.progress_count -= pdec

                        if(this.qt.ms == 10){
                            this.qt.time --
                            this.qt.ms=0
                        }

                    }

                }, 100);
        },
        TimerInit(){
            clearInterval(this.timer)
            clearInterval(this.qt.timer)
            this.qt.ms = 0
            this.qt.time = 0
            this.progress_count = 100

        },
        countDown(){
            console.log('countDown')
            if(this.counter == 0){

                this.questionInit()

                if(this.qid+1 == this.questions.length){
                    this.winner()
                    this.counter =0
                    return
                }

                this.qid ++
                this.current = this.questions[this.qid].id

                this.QuestionTimer()
            }
            this.counter --
        },

        getResult(){
            this.results = _(this.answered_user_data).groupBy('team.name')
                .map((answers, name) => ({
                    name: name,
                    score: _.sumBy(answers, item => Number(item.isCorrect)),
                    answers: _.orderBy(answers, ['id'],['desc'])
                }))
                .sortBy('score')
                .reverse()
                .value()
            console.log(JSON.stringify(this.results))

        },
        q2bNumber(numb) {
            let numbString = numb.toString();
            let bn = ''
            let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
            [...numbString].forEach(n => bn += eb[n])
            return bn
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
            return this.prediction.find(p => p.user.group_id === this.user.group_id)
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
                var c = counts[this.ToText(this.tbe(o.bd_option,o.option,this.user.lang))]
                if(c === undefined)
                    return 0
                return c
            })

        },


        getCorrectAnswertext(){
            if (this.user.lang=='gb'){
                return this.questions[this.qid].options.find(o => o.correct == 1).option
            }
            return this.questions[this.qid].options.find(o => o.correct == 1).bd_option

        },

        winner(){
            this.user_ranking = this.results.findIndex(w => w.name == this.user.id)
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

        reloadPage(){
            axios.post(`/api/pageReload`, {channel: this.channel})
                .then((response) =>{
                    console.log(['page reload event log ', response])
                    window.location.reload()
                })
        },
        clickSelect(index, option){
            console.log([index, option])
            if(this.qoption.selected == index){
                this.qoption.selected = null
                this.qoption.id = option.question_id
                this.qoption.option= null
                this.qoption.correct= null
            }else{
                this.qoption.selected = index
                this.qoption.id = option.question_id
                this.qoption.option= this.tbe(option.bd_option,option.option,this.user.lang)
                this.qoption.correct= option.correct
            }
            // console.log(this.isPredict())

        },


        fillPie() {
            this.datacollection = {
                labels: this.questions[this.qid].options.map(o => { return this.ToText(this.tbe(o.bd_option,o.option,this.user.lang)) }),
                datasets: [{
                    borderWidth: 1,
                    borderColor: ['#7fdbda', '#ade498', '#ede682', '#febf63'],
                    backgroundColor: [ '#7fdbda', '#ade498', '#ede682', '#febf63'],
                    data: this.pie_data,
                }]
            }
        },

        ToText(input){
            if(!!input){
                return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,'').replace(/<[^>]+?>/g,'').replace(/\s+/g,' ').replace(/ /g,' ').replace(/>/g,' ').replace(/&nbsp;/g,'').replace(/&rsquo;/g,'');
            }
        },
        tbe(b, e, l) {
            if(b !== null && e !== null){
                if(l === 'bd') {
                    return b;
                }
                return e;
            }
            else if(b !== null && e === null) {
                return b;
            }
            else if(b === null && e !== null) {
                return e;
            }
            return b;
        },

        answer(){
            return this.ans;
        },
        joinTeam(id){
            let obj = {channel: this.channel, team: id, user:this.user}
            this.teamUser.push({team: id, users:this.user});
            this.team = this.teams.find(team => team.id == id);
            this.user.gid = id;
            this.users.map(u=> {
                if(u.id === this.user.id){
                    u.gid = id;
                }
            })
            axios.post(`/api/jointeam`, obj).then(res => this.screen.team = 0)
        },

    },

    computed: {

        isLastQuestion(){
           return  this.q_lenght > this.qid + 1;
        },
        channel(){
            return `team.${this.id}.${this.uid}`
        },
        userGroup(){
            return _(this.users)
                .groupBy('group.name')
                .map((value, key) => ({ group: key, members: value }))
                .value()
        },
        setProgress(){
            return {'width': 100 / this.userGroup.length  + '%', }
        },
        progressClass(){
            return this.progress_count > 66? 'bg-success': this.progress_count > 33? 'bg-info': 'bg-danger'
        },
        progressWidth(){
            return {'width':this.progress_count + '%', }
        }

    }


};

</script>
