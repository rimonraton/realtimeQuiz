<template>
    <div class="container mt-n2">
        <div class="progress mb-3" v-if="uid == user.id">
            <div class="progress-bar"
                 v-for="(group, i) in answered_group"
                 :class="[ i % 2 == 0 ? 'bg-danger' : 'bg-success' ]"
                 :style="setProgress">
                {{ group.group }}
            </div>
        </div>
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

<!--        <group-result-->
<!--            :results='results'-->
<!--            :groupName='user.group.name'-->
<!--            :lastQuestion='(qid + 1) == questions.length'-->
<!--            v-if="screen.result">-->
<!--        </group-result>-->
        <waiting
            :uid='uid' :users='users' :user='user'
            time='2024-01-29 12:00:00'
            challenge="challenge"
            :defTime="30"
            @kickingUser="kickUser($event)"
            @gameStart="gameStart"
            @gameReset="gameReset"
            v-if="screen.waiting">
        </waiting>
        <div class="row justify-content-center" v-if="user.id == uid">
            <div class="col-md-7">
                <questions-component
                    :questions="questions"
                    :qid="qid"
                    :user="user"
                />
            </div>

            <div class="col-md-5">
                <div class="card my-4" v-if="results.length>0">
                    <div class="card-header">
                        Score Board
                    </div>
                    <div class="card-body">
                        <transition-group name="slide-up" class="list-group" tag="ul" appear>
                            <li class="list-group-item user-list"
                                v-for="(res, index) in results" :key="`res_${index}`"
                                :class="{active : res.id == user.id}"
                            >
                                <span v-html="getMedel(index)"></span>
                                {{ res.name }} <span class="badge badge-dark float-right mt-1">{{ res.score }}</span>
                            </li>
                        </transition-group>
                    </div>
                </div>
                <div class="card text-white bg-secondary">
                    <div class="card-header card-title d-flex justify-content-between">
                        <a @click="reloadPage" class="btn btn-sm btn-warning">Reset</a>
                        <!-- <strong>Information</strong> -->
                        <a class="btn btn-sm btn-warning" @click="nextQuestion">NEXT QUESTION</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group text-dark">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-0"
                                v-for="(result, key) in results" :key="key">
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
                                            {{ result.score }}
                                        </span>
                                        </div>

                                        <div :id="'collapse' + key" class="collapse show"
                                             :aria-labelledby="'heading' + key"
                                             :data-parent="'#accordion' + key">
                                            <div class="card-body p-0">
                                                <ul class="list-group text-dark"
                                                    style="max-height: 380px; overflow:auto;">
                                                    <li v-for="(answer, key) in result.answers" :key="key"
                                                        class="list-group-item d-flex justify-content-between align-items-center p-1">
                                                        <div class="font-weight-light f-13">
                                                            <!-- <span class="font-weight-bold">
                                                                {{ answer.question }}
                                                            </span> -->
                                                            <span class="font-weight-light font-italic">
                                                        {{ answer.user.name + ' - ' + answer.selected }}
                                                    </span>
                                                            <i v-if="answer.isCorrect == 1"
                                                               class="fa fa-check text-success" aria-hidden="true"></i>
                                                            <i v-else class="fa fa-times text-danger"
                                                               aria-hidden="true"></i>

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

                <div class="leaderboard mt-4">
                    <div class=" mt-4">
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
        </div>
        <div class="row justify-content-center" v-else>
            <div class="col-md-8">
                <div class="container-fluid px-0">
                    <!-- <div class="modal-dialog"> -->
                    <div class="modal-content" v-for="question in questions" v-if="question.id == current">
                        <div class="modal-header" style="justify-content:flex-start">
                            <div class="col-xs-1 my-1 element-animation0">
                                <span class="bg-success text-white rounded-circle" id="qid">{{ qid + 1 }}</span>
                            </div>
                            <div class="col-xs-11">
                                <h6 class="pl-1 element-animation0">
                                    {{ tbe(question.bd_question_text, question.question_text, user.lang) }}
                                </h6>
                            </div>

                        </div>
                        <div class="modal-body">
                            <div class="col-md-8 offset-md-2 element-animation1" v-if="question.more_info_link">
                                <img class="image w-100 mb-2 rounded" :src="question.more_info_link"
                                     style="max-height:40vh">
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
            <div class="col-md-4">
                <div class="card mb-4" v-for="question in questions" v-if="question.id == current && groupPredict()">
                    <span class="text-center"> <strong>Group Prediction</strong></span>
                    <pie-chart :chart-data="datacollection"></pie-chart>
                </div>

                <div class="card my-2" v-for="ug in userGroup" v-if="ug.group != 'undefined'">
                    <div class="card-header py-1 text-primary">{{ ug.group }} group member</div>
                    <div class="card-body p-0">
                        <ul class="list-group" v-for="member in ug.members">
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
    </div>
</template>

<script>
import PieChart from '../helper/PieChart'
import questionsComponent from '../helper/moderator/questions'
import groupResult from '../helper/groupResult'
import {quizHelpers} from "../mixins/quizHelpers";
import waiting from "../helper/waiting.vue";


export default {
    mixins: [quizHelpers],
    props: ['id', 'uid', 'user', 'questions'],

    components: {waiting, PieChart, questionsComponent, groupResult},

    data() {
        return {
            qt: {
                ms: 0,
                defaultTime: 30,
                time: 30,
                timer: null
            },
            answered_user_data: [],
            answered_group: [],
            users: [],
            datacollection: null,
            progress: {},
            qoption: {
                selected: null,
                id: null,
                option: null,
                correct: null,
            },
            prediction: [],
            current: 0,
            qid: 0,
            results: [],
            gamedata: {},
            pie_data: [],
            screen: {
                waiting: 1,
                loading: 0,
                result: 0,
                winner: 0,
            },
            sqo: false
        };
    },

    mounted() {
        // window.onblur = alert('blurd')

        this.current = this.questions[this.qid].id

        this.fillPie()


        Echo.join(`team.${this.id}.${this.uid}`)
            .here((users) => {
                this.users = users.filter(u => u.id != this.uid)
            })
            .joining((user) => {
                if (user.id != this.uid)
                    this.users.push(user);
                console.log(`${user.name} join`);

                if (this.game_start)
                    this.kickUser(user.id)
            })
            .leaving((user) => {
                this.users = this.users.filter(u => u.id != user.id);
                console.log(`${user.name} leaving`);
            });

        this.current = this.questions[this.qid].id


    },


    created() {
        Echo.channel(this.channel)
            .listen('GameStartEvent', (data) => {
                console.log('GameStartEvent.............', data)
                this.game_start = 1 // Game Start from Game Owner...
                this.screen.waiting = 0
                //this.QuestionTimer() // Set and Start QuestionTimer

            })
            .listen('NextQuestionEvent', (data) => {
                console.log('NextQuestionEvent.............')
                this.qid = data.qid
                this.current = this.questions[this.qid].id // Next Question from Moderator...
                this.pie_data = []
                this.prediction = []
                this.qoption.selected = null
                this.screen.result = 0
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
                this.answered_user++
                this.loadingScreen()
            })
            .listen('GroupAnsSubEvent', (req) => {
                console.log('GroupAnsSubEvent....')

                this.answered_user_data.push(req.data)
                this.getResult()
                console.log([req.data, this.user, this.user.id, this.uid])

                if (req.data.user.gid == this.user.gid && this.user.id != this.uid) {
                    this.screen.result = 1
                }
                if (this.user.id == this.uid) {
                    this.answered_group.push(req.data)
                }

            })
            .listen('PageReloadEvent', (data) => {
                console.log('PageReloadEvent.............')
                window.location.reload()

            })
            .listen('KickUserEvent', (data) => {
                console.log('KickUserEvent.............')
                this.users = this.users.filter(u => u.id !== data.uid)
                if (this.user.id == data.uid) {
                    window.location.href = "/"
                }
            });

    },


    methods: {
        gameStart: function (defaultTime = 30) {
            console.log('gameStart...')
            this.sqo = true
            let ids = this.users.map(u => u.id)
            let gd = {
                channel: this.channel,
                gameStart: 1,
                uid: ids,
                id: 1,
                users: this.users,
                host_id: this.uid,
                defaultTime: defaultTime,
                mode: 'moderator'
            }
            this.qt.defaultTime = defaultTime
            this.qt.time = defaultTime
            // console.log(gd);
            axios.post(`/api/gameStart`, gd)
                .then(res => {
                    console.log('res', res.data)
                    this.game_start = 1
                    this.screen.waiting = 0
                    // this.showQuestionOptions(this.questions[0].fileType)
                })
            // this.QuestionTimer()
        },
        gameReset() {
            console.log('gameReset....')
            this.questionInit(this.qt.defaultTime)
            this.screen.waiting = 1
            this.screen.loading = 0
            this.screen.result = 0
            this.screen.resultWaiting = 0
            this.screen.winner = 0
            this.end_user = 0
            this.answered_user_data = []
            this.results = []
            this.qid = 0
            this.gamedata = {}
            this.score = []
            this.user_ranking = null
            this.game_start = 0
            this.current = this.questions[this.qid].id
            this.endAVWait = false
            this.preventClick = true
            this.gameEnded = false
        },
        nextQuestion() {
            console.log('NextQuestion Clicked')

            if (this.qid + 1 == this.questions.length) {
                clearInterval(this.timer);
                this.winner()
                return
            }

            this.qid++
            this.current = this.questions[this.qid].id
            this.fillPie()
            this.answered_group = []

            let next = {channel: this.channel, qid: this.qid}

            axios.post(`/api/nextQuestion`, next)

        },
        submitAnswer() {
            if (this.qoption.selected == null) {
                alert('Please select an option first!')
                return;
            }

            this.checkAnswer(this.qoption.id, this.qoption.option, this.qoption.correct);
            this.qoption.selected = null
            this.qoption.id = null
            this.qoption.option = null
            this.qoption.correct = null
            this.screen.result = 1

        },

        checkAnswer(q, a, rw) {
            this.gamedata['id'] = this.qid + 1
            this.gamedata['question'] = this.tbe(this.questions[this.qid].bd_question_text, this.questions[this.qid].question_text, this.user.lang)
            this.gamedata['answer'] = this.getCorrectAnswerText()
            this.gamedata['selected'] = a
            this.gamedata['isCorrect'] = rw
            this.gamedata['user'] = this.user
            this.gamedata['channel'] = this.channel
            this.gamedata['group'] = this.user.name
            let clone = {...this.gamedata}
            this.answered_user_data.push(clone)
            axios.post(`/api/submitAnswerGroup`, {data: clone}).then(response => {
                console.log(response.data)
                this.getResult()
            })

        },
        getResult() {
            this.results = _(this.answered_user_data).groupBy('group')
                .map((answers, name) => ({
                    name: name,
                    score: _.sumBy(answers, item => Number(item.isCorrect)),
                    answers: _.orderBy(answers, ['id'], ['desc'])
                }))
                .sortBy('score')
                .value()
            console.log(JSON.stringify(this.results))

        },

        predictAnswer() {

            let pre = {
                ans: this.ToText(this.qoption.option),
                user: this.user,
                channel: this.channel,
            }

            if (this.isPredict()) {

                this.prediction.push(pre)

                axios.post(`/api/answerPredict`, pre)

                this.getPredict()

                this.fillPie()
            }

        },
        isPredict() {
            return !this.prediction.find(p => p.user.id === this.user.id)
        },
        groupPredict() {
            return this.prediction.find(p => p.user.group_id === this.user.group_id)
        },

        getPredict() {
            var counts = {};
            let options = this.questions[this.qid].options
            this.prediction.forEach(p => {
                if (p.user.group_id === this.user.group_id) {
                    counts[p.ans] = (counts[p.ans] || 0) + 1;
                }
            });

            this.pie_data = options.map(o => {
                var c = counts[this.ToText(o.option)]
                if (c === undefined)
                    return 0
                return c
            })

        },

        getCorrectAnswerText() {
            const correctOption = this.questions[this.qid].options.find(o => o.correct == 1)
            if (correctOption.flag == 'img') {
                return correctOption.img_link
            } else {
                const correctEngOption = correctOption.option
                const correctBanOption = correctOption.bd_option
                return this.tbe(correctBanOption, correctEngOption, this.user.lang)
            }
        },

        winner() {
            this.user_ranking = this.results.findIndex(w => w.id == this.user.id)
            this.screen.winner = 1
            if (this.wrong == 0) {
                confetti({
                    zIndex: 999999,
                    particleCount: 200,
                    spread: 120,
                    origin: {y: 0.6}
                });
            }
        },

        reloadPage() {
            axios.post(`/api/pageReload`, {channel: this.channel})
                .then((response) => {
                    console.log(['page reload event log ', response])
                    window.location.reload()
                })
        },
        clickSelect(index, option) {
            console.log([index, option])
            if (this.qoption.selected == index) {
                this.qoption.selected = null
                this.qoption.id = option.question_id
                this.qoption.option = null
                this.qoption.correct = null
            } else {
                this.qoption.selected = index
                this.qoption.id = option.question_id
                this.qoption.option = option.option
                this.qoption.correct = option.correct
            }
            // console.log(this.isPredict())

        },

        kickUser(id) {
            if (id != this.uid) {
                this.users = this.users.filter(u => u.id !== id)
                let channelUser = {channel: this.channel, uid: id}
                axios.post(`/api/kickUser`, channelUser)
            }
        },

        fillPie() {
            this.datacollection = {
                labels: this.questions[this.qid].options.map(o => {
                    return this.ToText(o.option)
                }),
                datasets: [{
                    borderWidth: 1,
                    borderColor: ['#7fdbda', '#ade498', '#ede682', '#febf63'],
                    backgroundColor: ['#7fdbda', '#ade498', '#ede682', '#febf63'],
                    data: this.pie_data,
                }]
            }
        },

        ToText(input) {
            return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi, '').replace(/<[^>]+?>/g, '').replace(/\s+/g, ' ').replace(/ /g, ' ').replace(/>/g, ' ').replace(/&nbsp;/g, '').replace(/&rsquo;/g, '');
        },

        answer() {
            return this.ans;
        },

    },

    computed: {
        channel() {
            return `team.${this.id}.${this.uid}`
        },
        userGroup() {
            return _(this.users)
                .groupBy('group.name')
                .map((value, key) => ({group: key, members: value}))
                .value()
        },
        setProgress() {
            return {'width': 100 / this.userGroup.length + '%',}
        },

    }


};

</script>
