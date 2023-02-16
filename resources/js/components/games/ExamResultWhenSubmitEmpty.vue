<template>
    <div>
<!--        <div class="container">-->
<!--            <div class="winner" v-if="screen.examSubmit">-->
<!--&lt;!&ndash;                <h2 class="text-center">Quiz Game Over</h2>&ndash;&gt;-->
<!--                <h3>Your exam is submitted. </h3>-->
<!--                <a class="btn btn-outline-primary btn-sm" :href="'/show-result/' + qid.id + '/' + user.id">Show Result</a>-->
<!--            </div>-->
<!--        </div>-->

        <div class="row justify-content-center">
                    <div class="border border-2 p-2 rounded-lg text-center">
                        <div>{{ user.lang == 'gb' ? 'Result' : 'ফলাফল' }} :  {{user.lang == 'gb' ? 'Total Number' : 'মোট নম্বর'}} - {{user.lang == 'gb' ? 0 : q2bNumber(0)}}</div>
                        <br>
                        <div>
                            <a class="btn btn-outline-primary btn-sm" :href="'/exams'">{{ tbe('ফিরে যান','Go Back',user.lang) }}</a>
                        </div>
                    </div>
            </div>

<!--	<div class="row justify-content-center" v-if="questions.length > 0">-->
<!--        <div class="col-md-8" >-->
<!--&lt;!&ndash;            <div class="d-flex justify-content-between py-2">&ndash;&gt;-->
<!--&lt;!&ndash;               <span> {{ user.lang == 'gb' ? 'Exam Name' : 'পরীক্ষার নাম' }} : {{ tbe(qid.exam_bn,qid.exam_en,user.lang) }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;               <span> {{ user.lang == 'gb' ? 'Total Time' : 'মোট সময়' }} : {{ totalTime() }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;               <span> {{ user.lang == 'gb' ? 'Total Mark' : 'মোট মার্ক' }} : {{ user.lang == 'gb' ? questions.length : q2bNumber(questions.length)}}</span>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--		    <div :id="'accordion' + index" class="w-100 mb-2" v-for="(question, index) in questions">-->
<!--		    <div class="card text-white" >-->
<!--		        <div class="card-header p-1 cursor bg-danger"-->
<!--		            :id="'heading'+ index"-->
<!--		            data-toggle="collapse"-->
<!--		            :data-target="'#collapse'+ index"-->
<!--		            aria-expanded="true"-->
<!--		            :aria-controls="'collapse'+ index">-->
<!--		            <span class="text-white rounded-circle">-->
<!--&lt;!&ndash;                        {{ !fileType(question.fileType)? user.lang=='gb'?index + 1:q2bNumber(index + 1): '' }}&ndash;&gt;-->
<!--                        {{  user.lang=='gb' ? index + 1 : q2bNumber(index + 1) }}-->
<!--                    </span>-->
<!--&lt;!&ndash;		              {{ fileType(question.fileType) ? fileText(question.fileType, user.lang):tbe(question.bd_question_text,question.question_text,user.lang) }}&ndash;&gt;-->
<!--                    {{ tbe(question.bd_question_text,question.question_text,user.lang)}}-->
<!--		        </div>-->
<!--		        <div :id="'collapse'+ index" class="show" :aria-labelledby="'heading'+ index" :data-parent="'#accordion' + index">-->
<!--		          <div class="card-body">-->
<!--&lt;!&ndash;		            <div class="" v-if="question.fileType=='image'||question.fileType=='video'||question.fileType=='audio'">&ndash;&gt;-->
<!--&lt;!&ndash;                        <img v-if="question.fileType == 'image'" class="image w-100 mt-1 rounded img-thumbnail"&ndash;&gt;-->
<!--&lt;!&ndash;                             :src="'/' + question.question_file_link" style="max-height:70vh" alt="">&ndash;&gt;-->
<!--&lt;!&ndash;                        <video&ndash;&gt;-->
<!--&lt;!&ndash;                            v-if="question.fileType == 'video'"&ndash;&gt;-->
<!--&lt;!&ndash;                            class="image w-100 mt-1 rounded img-thumbnail" controls>&ndash;&gt;-->
<!--&lt;!&ndash;                            <source :src="'/'+ question.question_file_link" type="video/mp4">&ndash;&gt;-->
<!--&lt;!&ndash;                        </video>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="audio" v-if="question.fileType == 'audio'">&ndash;&gt;-->
<!--&lt;!&ndash;                            <audio controls>&ndash;&gt;-->
<!--&lt;!&ndash;                                <source :src="'/'+ question.question_file_link" type="audio/mpeg">&ndash;&gt;-->
<!--&lt;!&ndash;                            </audio>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="text-white rounded-circle" :class="{qid: index == qid}">{{ user.lang=='gb'?index + 1:q2bNumber(index + 1) }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;                        {{ tbe(question.bd_question_text, question.question_text, user.lang) }}&ndash;&gt;-->
<!--&lt;!&ndash;		            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      <option-component&ndash;&gt;-->
<!--&lt;!&ndash;                          :options="question.options"&ndash;&gt;-->
<!--&lt;!&ndash;                          :question="tbe(question.bd_question_text, question.question_text, user.lang)"&ndash;&gt;-->
<!--&lt;!&ndash;                          :user="user"&ndash;&gt;-->
<!--&lt;!&ndash;                          @answer="answer"&ndash;&gt;-->
<!--&lt;!&ndash;                      ></option-component>&ndash;&gt;-->


<!--&lt;!&ndash;                      note&ndash;&gt;-->
<!--&lt;!&ndash;                      v-if="option.flag != 'img'"&ndash;&gt;-->

<!--                      <div class="px-1" v-for="op in question.options">-->
<!--                          <div v-if="op.flag == 'img'" class="cursor my-1">-->
<!--                              <div class="d-flex">-->
<!--                                  <div v-if="op.correct == 1">-->
<!--                                      <p class="text-dark">(Correct answer)-->
<!--                                          <i class="fa fa-check text-success" aria-hidden="true" ></i>-->
<!--                                      </p>-->
<!--                                      <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ op.img_link" alt="">-->
<!--                                  </div>-->
<!--                              </div>-->
<!--&lt;!&ndash;                              <div v-if="qoption.selected == index" class="Tick d-flex justify-content-center align-items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                  &lt;!&ndash;                <i class="fa fa-check text-success" aria-hidden="true"></i>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                  <img :src="'/img/icons/tick.png'" width="100px" height="100px">&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--                          </div>-->
<!--                          <div class="list-group" v-else>-->
<!--                              <div class="list-group" v-if="op.correct == 1">-->
<!--                                <span class="list-group-item list-group-item-action my-1">-->
<!--                                    {{ tbe(op.bd_option,op.option,user.lang)}} (correct answer)-->
<!--                                    <i class="fa fa-check text-success" aria-hidden="true"></i>-->
<!--                                </span>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </div>-->
<!--		          </div>-->
<!--		        </div>-->
<!--		    </div>-->
<!--		</div>-->
<!--            <div class="d-flex justify-content-center py-2">-->
<!--                <a class="btn btn-sm btn-info rounded border" :href="'/exams'">{{ tbe('ফিরে যান','Go Back',user.lang) }}</a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-md-4" >-->
<!--            <div class="card my-4 d-sm-none d-md-block" >-->
<!--                <div class="card-header">-->
<!--                    {{ user.lang == 'gb' ? 'Result' : 'ফলাফল' }}-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <p>Correct Answer: 0</p>-->
<!--                    <p>Wrong Answer: 0</p>-->
<!--&lt;!&ndash;                    <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="col">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="card-profile-stats d-flex justify-content-between">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="text-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span class="heading">{{ user.lang == 'gb' ? timer.hours : q2bNumber(timer.hours) }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <br>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span class="description">{{ user.lang == 'gb' ? (timer.hours > 1 ? 'Hours' : 'Hour') : 'ঘণ্টা' }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="text-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span class="heading">{{  user.lang == 'gb' ? timer.minutes :  q2bNumber(timer.minutes)}}</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <br>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span class="description">{{ user.lang == 'gb' ? (timer.minutes > 1 ? 'Minutes' : 'Minute') : 'মিনিট' }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="text-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span class="heading">{{ user.lang == 'gb' ? timer.seconds : q2bNumber(timer.seconds) }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <br>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span class="description">{{ user.lang == 'gb' ? (timer.seconds > 1 ? 'Seconds' : 'Second') : 'সেকেন্ড' }}</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--	</div>-->
    </div>
</template>

<script>
	import OptionComponent from "../helper/Examination/option";
    export default {
        components: {OptionComponent},
        props: ['questions', 'exam', 'user'],
        data(){
		    return{
                screen:{
                    exam: true,
                    examSubmit: false
                },
                formData:{
                    topics:0,
                    q_number:null,
                },
                questiondata:this.questions,
                countDown: this.examTime,
                timer: {
                    hours: 0,
                    minutes:0,
                    seconds:0,
                },
                results: []
            }
        },
		methods: {
            countDownTimer () {
                if (this.countDown > 0) {
                    setTimeout(() => {
                        this.countDown -= 1
                        this.timer.minutes = Math.floor(this.countDown/60)
                        this.timer.seconds = Math.floor(this.countDown % 60)
                        this.timer.hours = this.countDown > 3600 ? Math.floor(this.countDown /3600) : 0
                        this.countDownTimer()
                    }, 1000)
                }
            },
		    onnoFunc(){
		        $('#qmodal').modal('hide');
                this.$emit('addQuestion',this.formData)
                this.clear()
            },
            clear(){
		        this.formData ={
                    topics:0,
                    q_number:null,
                }
            },
            q2bNumber(numb) {
                let numbString = numb.toString();
                let bn = ''
                let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯', '.': '.'};
                [...numbString].forEach(n => bn += eb[n])
                return bn
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
            showModal(){
                $('#qmodal').modal('show');
                this.isModalVisible = true
            },
			ToText(input){
              return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,'').replace(/<[^>]+?>/g,'').replace(/\s+/g,' ').replace(/ /g,' ').replace(/>/g,' ').replace(/&nbsp;/g,'').replace(/&rsquo;/g,'');
            },
            imageOption(objArray){
                const data = objArray.some(a => a.flag == 'img')
                // const data = objArray.find(a => a.flag == 'img');
                return data
            },
            fileType(fileT){
		        if (fileT == 'image' || fileT == 'video'||fileT == 'audio'){
		            return true
                }
		        return false
            },
            fileText(file, lang){
		        if(lang == 'gb') {
		           return file == 'image'? 'This is image question': file == 'video' ? 'This is video question': 'This is audio question'
                }
                return file == 'image'? 'এটি ইমেজ প্রশ্ন': file == 'video' ? 'এটি ভিডিও প্রশ্ন': 'এটি অডিও প্রশ্ন'
            },
            // totalTime(){
            //     const hours = this.examTime > 3600 ? Math.floor(this.examTime/3600) : 0
            //     const minutes = Math.floor(this.examTime/60)
            //     const seconds = Math.floor(this.examTime % 60)
            //     if(this.user.lang == 'gb') {
            //         return hours + 'h' +' '+ minutes + 'm' +' '+ seconds + 's'
            //     }
            //     return this.q2bNumber(hours) + 'ঘণ্টা' +' '+ this.q2bNumber(minutes) + 'মিনিট' +' '+ this.q2bNumber(seconds) + 'সেকেন্ড'
            // }
            totalTime(){
                let hasHours
                let hasMinutes
                let hasSeconds
                const hours = this.examTime > 3600 ? Math.floor(this.examTime/3600) : 0
                const minutes = Math.floor(this.examTime/60)
                const seconds = Math.floor(this.examTime % 60)
                // console.log(hours, minutes, seconds , 'times...')
                if(this.user.lang == 'gb') {
                    // return hours + this.hourOrHours(hours) + ' ' + minutes + this.minuteOrMinutes(minutes) + ' ' + seconds + this.secondOrSeconds(seconds)
                    if(hours) {
                        hasHours = hours + this.hourOrHours(hours)
                    }
                    if (minutes) {
                        hasMinutes = minutes + this.minuteOrMinutes(minutes)
                    }
                    if (seconds) {
                        hasSeconds = seconds + this.secondOrSeconds(seconds)
                    }
                    return ( hasHours == undefined ? '' : hasHours ) + ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
                } else {
                    if(hours) {
                        hasHours = this.q2bNumber(hours) + ' ঘণ্টা'
                    }
                    if (minutes) {
                        hasMinutes = this.q2bNumber(minutes) + ' মিনিট'
                    }
                    if (seconds) {
                        hasSeconds = this.q2bNumber(seconds) + ' সেকেন্ড'
                    }
                    return ( hasHours == undefined ? '' : hasHours ) + ( hasMinutes == undefined ? '' : hasMinutes ) + ( hasSeconds == undefined ? '' : hasSeconds )
                }
            },
            hourOrHours(data){
                if (data > 1) {
                    return ' hours'
                }
                return ' hour'
            },
            minuteOrMinutes(data){
                if (data > 1) {
                    return ' minutes'
                }
                return ' minute'
            },
            secondOrSeconds(data){
                if (data > 1) {
                    return ' seconds'
                }
                return ' second'
            },
            answer(data){
                if(this.results.length > 0) {
                    const found = this.results.some(el => el.id === data.id);
                    if(found) {
                        const itemToRemoveIndex = this.results.findIndex(function(item) {
                            return item.id === data.id;
                        });
                        if(data.selected == null){
                            if(itemToRemoveIndex !== -1){
                                this.results.splice(itemToRemoveIndex, 1);
                            }
                        } else {
                            this.results[itemToRemoveIndex] = data
                        }
                    } else {
                        this.results.push(data)
                    }

                } else {
                    this.results.push(data)
                }
                console.log(this.results, 'results')



                // proceed to remove an item only if it exists.
                // if(itemToRemoveIndex !== -1){
                //     myArray.splice(itemToRemoveIndex, 1);
                // }
                // this.results.push(data)
            },
            submitExam(){
                const resultValue = {
                    'user_id': this.user.id,
                    'examination_id': this.qid.id,
                    'results': this.results
                }
                axios.post('/api/save-results', resultValue).then((res) => {
                    console.log(res, 'response from server')
                    this.screen.exam = false
                    this.screen.examSubmit = true
                })
                console.log(this.results)
            },
            totalMark(){
                console.log(this.exam)
                const ca = JSON.parse(this.exam.results[0].result).filter(item => item.correct ==  1).length
                const wa = JSON.parse(this.exam.results[0].result).filter(item => item.correct ==  0).length
                const nm = this.exam.negative_mark > 0 ? (this.exam.each_question_mark * this.exam.negative_mark)/100 : 0
                const sub_total_mark = ca * this.exam.each_question_mark
                const for_wrong_answer_negative_sub_total_mark = wa * nm
                const total = sub_total_mark - for_wrong_answer_negative_sub_total_mark
                return total > 0 ? total : 0
            }
		},
        created(){
            this.countDownTimer()
            console.log('created')
        }
	};
</script>
<style>
#qmodal {
    background: linear-gradient(to right, #0083B0, #00B4DB);
}
#btn_cls_q {
    font-size: 30px;
    position: absolute;
    right: -7px;
    top: -3px;
    background: white;
    border: 1px solid;
    border-radius: 50%;
    width: 35px;
    /* z-index: 999999; */
}
.imgTick{
    position: absolute;
    right: 24px;
    top: 15px;
}
.imageOption {
    height: 100px;
    width: 100%;
}
@media screen and (min-width: 480px) {
    .imageOption {
        height: 170px;
        width: 100%;
    }
}
.imageDiv{
    width: 300px;
}
</style>
