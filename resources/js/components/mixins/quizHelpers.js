import {isEmpty} from "lodash/lang";

export const quizHelpers = {
    data() {
        return {
        };
    },
    created() {
        // console.log('Mixin loaded')
    },
    mounted() {
        this.externalJS()
    },
    methods: {
        questionInit(time = 30){
            clearInterval(this.qt.timer)
            this.qt.timer = null
            clearInterval(this.timer)
            this.timer = null
            this.qt.ms = 0
            this.qt.time = time
            this.progress = 100
            // this.answered = 0
            this.counter = 2
            this.screen.waiting = 0
            this.screen.loading = 0
            this.screen.result = 0
            this.screen.winner = 0
            this.endAVWait = false
        },
        isEmpty(val) {
          return (val === undefined || val == null || val.length <= 0) ? true : false;
        },
        tbe(b, e, l) {
          if(isEmpty(b) && isEmpty(e)){
            return 'No options found!'
          }
          if(isEmpty(b) || isEmpty(e)){
            if(isEmpty(b)) return e;
            if(isEmpty(e)) return b;
          }

          if(l !== 'bd') {
            return e;
          }
          return b;
        },
        qne2b(q, qn, l) {
            if (l === 'gb') {
                return `${q + 1} of ${qn} `;
            }
            return `${this.q2bNumber(qn)} এর ${this.q2bNumber(q + 1)} `;
        },
        q2bNumber(numb) {
            let numbString = numb.toString();
            let bn = ''
            let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
            [...numbString].forEach(n => bn += eb[n])
            return bn
        },
        getUrl (path) {
            return location.origin +'/'+ path
        },
        getMedel(index){
            if(index == 0) return '<i class="fas fa-award fa-lg" style="color: gold"></i>'
            if(index == 1) return '<i class="fas fa-award" style="color: silver"></i>'
            if(index == 2) return '<i class="fas fa-award fa-sm" style="color: #CD7F32"></i>'
            return '';
        },
        waitingResult(){
            return 'waiting-result';
        },
        imageOption(objArray){
            return  objArray.some(a => a.flag == 'img')
        },
        onEnd(api) {
            if(api == 'apiCall') {
                axios.post(`/api/audioVideoEnd`, {channel: this.channel }).then(res => console.log('apiCallThen ..', res.data))
            }
            this.av = true
            this.showQuestionOptions('onEnd')
        },
        onStart() {
            this.av = false
        },
        audioVideoError() {
            // console.log('audioVideoError....')
            this.onEnd()
        },
        stop () {
            this.questionInit()
            console.log('stop()')
        },

        firstPlace: function() {
            confetti({
                zIndex: 999999, particleCount: 200, spread: 120, origin: {y: 0.6}
            });
            setTimeout(() => {
                confetti({
                    zIndex: 999999, particleCount: 200, spread: 120, origin: {y: 0.6}
                });
            }, 500)
        },
        secondPlace: function() {
            let colors = ['#bb0000', '#0AE84E'];

            confetti({
                zIndex: 999999, particleCount: 100, angle: 60, spread: 55, origin: {x: 0}, colors: colors
            });
            confetti({
                zIndex: 999999, particleCount: 100, angle: 120, spread: 55, origin: {x: 1}, colors: colors
            });
        },
        thirdPlace: function() {
            const defaults = {
                spread: 360,
                ticks: 50,
                gravity: 0,
                decay: 0.94,
                startVelocity: 30,
                shapes: ["star"],
                colors: ["FFE400", "FFBD00", "E89400", "FFCA6C", "FDFFB8"],
            };
            confetti({
                ...defaults,
                zIndex: 999999,
                particleCount: 400,
                scalar: 1.2,
                shapes: ["star"],
            });

            confetti({
                ...defaults,
                zIndex: 999999,
                particleCount: 100,
                scalar: 0.75,
                shapes: ["circle"],
            });
        },

        externalJS(){
            let confetti = document.createElement('script')
            confetti.setAttribute('src', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.0/dist/confetti.browser.min.js')
            document.head.appendChild(confetti)
        },
        isHost() {
            return this.uid === this.user.id
        },
    },
    computed: {
        channel(){
            let path = window.location.pathname.split('/')
            // console.log(path, 'path...........')
            return `${path[1]}.${path[2]}.${path[3]}`
        },

        progressClass(){
            return this.progress > 66? 'bg-success': this.progress > 33? 'bg-info': 'bg-danger'
        },
        progressWidth(){
            return {'width':this.progress + '%', }
        },
        currentQuestionType() {
            if(!this.questions) return
            return this.questions[this.qid].fileType
        },
        isLastQuestion() {
            if(!this.questions) return
            return this.questions.length > this.qid + 1;
        },

    }
}
