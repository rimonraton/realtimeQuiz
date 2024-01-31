export const quizHelpers = {
    created() {
        // console.log('Mixin loaded')
    },
    mounted() {
        this.externalJS()
    },
    methods: {
        questionInit(time = 30){
            clearInterval(this.timer)
            clearInterval(this.qt.timer)
            this.qt.ms = 0
            this.qt.time = time
            this.progress = 100
            this.answered = 0
            this.counter = 2
            this.screen.waiting = 0
            this.screen.loading = 0
            this.screen.result = 0
            this.screen.winner = 0
            this.endAVWait = false
        },
        tbe(b, e, l) {
            if(b !== null && e !== null){
                if(l === 'bd') return b;
                return e;
            }
            else if(b !== null && e === null) return b;
            else if(b === null && e !== null) return e;
            return b;
        },
        qne2b(q, qn, l) {
            if (l === 'gb') {
                return `Question ${q + 1} of ${qn} `;
            }
            return `প্রশ্ন ${this.q2bNumber(qn)} এর ${this.q2bNumber(q + 1)} `;
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
            console.log('audioVideoError....')
            this.onEnd()
        },
        stop () {
            this.questionInit()
            console.log('stop()')
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

    }
}
