<template>
    <div>
        <div class="container">
            <div class="winner" v-if="screen.examSubmit">
<!--                <h2 class="text-center">Quiz Game Over</h2>-->
                <h3>
                    {{user.lang == 'gb' ? 'Your test has been submitted' : 'আপনার পরীক্ষা জমা হয়েছে'}}
                </h3>
                <a class="btn btn-outline-primary btn-sm" :href="'/exams'">
                    {{user.lang == 'gb' ? 'Finish' : 'শেষ করুন'}}
                </a>
            </div>
        </div>
	    <div class="row justify-content-center" v-if="screen.exam">
        <div class="col-md-8" >
            <div class="d-md-none">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-between">
                            <div class="text-center">
                                <span class="heading">{{ user.lang == 'gb' ? timer.hours : q2bNumber(timer.hours) }}</span>
                                <br>
                                <span class="description">{{ user.lang == 'gb' ? (timer.hours > 1 ? 'Hours' : 'Hour') : 'ঘণ্টা' }}</span>
                            </div>
                            <div class="text-center">
                                <span class="heading">{{  user.lang == 'gb' ? timer.minutes :  q2bNumber(timer.minutes)}}</span>
                                <br>
                                <span class="description">{{ user.lang == 'gb' ? (timer.minutes > 1 ? 'Minutes' : 'Minute') : 'মিনিট' }}</span>
                            </div>
                            <div class="text-center">
                                <span class="heading">{{ user.lang == 'gb' ? timer.seconds : q2bNumber(timer.seconds) }}</span>
                                <br>
                                <span class="description">{{ user.lang == 'gb' ? (timer.seconds > 1 ? 'Seconds' : 'Second') : 'সেকেন্ড' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card my-2" >
                    <div class="card-header">
                        {{ user.lang == 'gb' ? 'You did not answer the questions' : ' আপনি উক্ত প্রশ্নগুলোর উত্তর করেন নি' }}
                    </div>
                    <div class="card-body">
                        <question-button :questiondata="questions" :results="results" @scrollToElement="scrollToElement" :user="user"></question-button>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between py-1">
                <span> {{ user.lang == 'gb' ? 'Exam Name' : 'পরীক্ষার নাম' }} : {{ tbe(qid.exam_bn,qid.exam_en,user.lang) }}</span>
                <span> {{ user.lang == 'gb' ? 'Total Time' : 'মোট সময়' }} : {{ totalTime() }}</span>
                <span> {{ user.lang == 'gb' ? 'Total Mark' : 'মোট মার্ক' }} : {{ user.lang == 'gb' ? questions.length * qid.each_question_mark : q2bNumber(questions.length * qid.each_question_mark)}}</span>
            </div>
            <div class="text-center py-1">
                <span> {{ user.lang == 'gb' ? '[0' + qid.each_question_mark + ' mark will be given for each correct answer and ' + negativeMark() + ' mark will be deducted for each wrong answer.]' : '[প্রতিটি শুদ্ধ উত্তরের জন্য ০' + q2bNumber(qid.each_question_mark) + ' নম্বর পাবেন এবং প্রতিটি ভুল উত্তরের জন্য ' + q2bNumber(negativeMark()) + ' নম্বর কর্তন হবে ।]' }}</span>
            </div>
            <div class="container-fluid p-0 overflow-auto" style="max-height:500px;">
                <div :id="'accordion' + index" class="w-100 mb-2" v-for="(question, index) in questiondata">
                    <div class="card text-white" :id="'question_element' + question.id">
                        <div class="card-header p-1 cursor text-dark"
                             :id="'heading'+ index"
                             data-toggle="collapse"
                             :data-target="'#collapse'+ index"
                             aria-expanded="true"
                             :aria-controls="'collapse'+ index">
                            <span class="text-dark rounded-circle" :class="{qid: index == qid}">{{ !fileType(question.fileType)? user.lang=='gb'?index + 1:q2bNumber(index + 1): '' }}</span>
                            {{ fileType(question.fileType) ? fileText(question.fileType, user.lang):tbe(question.bd_question_text,question.question_text,user.lang) }}
                        </div>
                        <div :id="'collapse'+ index" :class="{show: index == qid}" :aria-labelledby="'heading'+ index" :data-parent="'#accordion' + index">
                            <div class="card-body">
                                <div class="" v-if="question.fileType=='image'||question.fileType=='video'||question.fileType=='audio'">
                                    <img v-if="question.fileType == 'image'" class="image w-100 mt-1 rounded img-thumbnail"
                                         :src="'/' + question.question_file_link" style="max-height:70vh" alt="">
                                    <video
                                        v-if="question.fileType == 'video'"
                                        class="image w-100 mt-1 rounded img-thumbnail" controls>
                                        <source :src="'/'+ question.question_file_link" type="video/mp4">
                                    </video>
                                    <div class="audio" v-if="question.fileType == 'audio'">
                                        <audio controls>
                                            <source :src="'/'+ question.question_file_link" type="audio/mpeg">
                                        </audio>
                                    </div>
                                    <span class="text-dark rounded-circle" :class="{qid: index == qid}">{{ user.lang=='gb'?index + 1:q2bNumber(index + 1) }}</span>
                                    {{ tbe(question.bd_question_text, question.question_text, user.lang) }}
                                    <!--		                <img class="image w-100 mb-2 rounded" :src="question.more_info_link" style="max-height:40vh">-->
                                </div>
                                <!--		            <ul class="list-group text-dark">-->
                                <!--		                <li v-for="(option, index) in question.options" :key="option.id" class="list-group-item d-flex justify-content-between align-items-center p-1">-->
                                <!--		                    <small>-->
                                <!--		                        {{ tbe(option.bd_option,option.option,user.lang) }}-->
                                <!--		                    </small>-->
                                <!--		                    <span v-if="option.correct ==1">-->
                                <!--		                        <i class="fa fa-check text-success" aria-hidden="true"></i>-->
                                <!--		                    </span>-->
                                <!--		                </li>-->

                                <!--		            </ul>-->
                                <!--                      <div :class="{'row justify-content-center justify-item-center': imageOption(question.options)}">-->
                                <!--                          <div v-for="(option, index) in question.options" :key="option.id" class="col-md-6 px-1" :class="[option.flag == 'img' ? 'col-6' : ' col-12' ]">-->
                                <!--                              <ul class="list-group" v-if="option.flag != 'img'">-->
                                <!--                                  <li  class="list-group-item d-flex justify-content-between align-items-center p-1">-->
                                <!--                                      <small class="text-black-50">-->
                                <!--                                          {{ tbe(option.bd_option,option.option,user.lang) }}-->
                                <!--                                      </small>-->
                                <!--                                      <span v-if="option.correct ==1">-->
                                <!--                                        <i class="fa fa-check text-success" aria-hidden="true"></i>-->
                                <!--                                      </span>-->
                                <!--                                  </li>-->
                                <!--                              </ul>-->
                                <!--                              <div v-else class="cursor my-1">-->
                                <!--                                  <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">-->
                                <!--                                  <span v-if="option.correct ==1" class="imgTick">-->
                                <!--                                      <i class="fa fa-check text-success" aria-hidden="true"></i>-->
                                <!--                                  </span>-->
                                <!--                              </div>-->
                                <!--                          </div>-->
                                <!--                      </div>-->
                                <option-component
                                    :options="question.options"
                                    :question="tbe(question.bd_question_text, question.question_text, user.lang)"
                                    :user="user"
                                    @answer="answer"
                                ></option-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center py-2">
                <span class="btn btn-sm btn-info rounded border" @click="submited">{{ tbe('আপনার পরীক্ষা জমা দিন','Submit Your Exam',user.lang) }}</span>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="card my-4 d-sm-none d-md-block" >
                <div class="card-header">
                    {{ user.lang == 'gb' ? 'Exam Time Remaining' : 'পরীক্ষার সময় বাকি' }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-between">
                                <div class="text-center">
                                    <span class="heading">{{ user.lang == 'gb' ? timer.hours : q2bNumber(timer.hours) }}</span>
                                    <br>
                                    <span class="description">{{ user.lang == 'gb' ? (timer.hours > 1 ? 'Hours' : 'Hour') : 'ঘণ্টা' }}</span>
                                </div>
                                <div class="text-center">
                                    <span class="heading">{{  user.lang == 'gb' ? timer.minutes :  q2bNumber(timer.minutes)}}</span>
                                    <br>
                                    <span class="description">{{ user.lang == 'gb' ? (timer.minutes > 1 ? 'Minutes' : 'Minute') : 'মিনিট' }}</span>
                                </div>
                                <div class="text-center">
                                    <span class="heading">{{ user.lang == 'gb' ? timer.seconds : q2bNumber(timer.seconds) }}</span>
                                    <br>
                                    <span class="description">{{ user.lang == 'gb' ? (timer.seconds > 1 ? 'Seconds' : 'Second') : 'সেকেন্ড' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <transition-group name="slide-up" class="list-group" tag="ul" appear>-->
<!--                        <li class="list-group-item user-list"-->
<!--                            v-for="(res, index) in results" :key="res.id"-->
<!--                            :class="{active : res.id == user.id}"-->
<!--                        >-->
<!--                            <span v-html="getMedel(index)"></span>-->
<!--                            {{ res.name }} <span class="badge badge-dark float-right mt-1">{{ res.score}}</span>-->
<!--                        </li>-->
<!--                    </transition-group>-->
                </div>
            </div>
            <div class="card my-4 d-sm-none d-md-block" >
                <div class="card-header">
                    {{ user.lang == 'gb' ? 'You did not answer the questions' : ' আপনি উক্ত প্রশ্নগুলোর উত্তর করেন নি' }}
                </div>
                <div class="card-body">
                    <question-button :questiondata="questions" :results="results" @scrollToElement="scrollToElement" :user="user"></question-button>
                </div>
            </div>
        </div>
<!--        <div class="text-center">-->
<!--            <a class="btn btn-sm col-sm-6 btn-success" @click="showModal">{{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}</a>-->

<!--        </div>-->
<!--        <div class="modal" tabindex="-1" data-backdrop="false" role="dialog" id="qmodal">-->
<!--            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <h5 class="modal-title">{{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}</h5>-->
<!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                            <span aria-hidden="true" id="btn_cls_q">&times;</span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <div class="modal-body">-->
<!--                        <div class="row">-->
<!--                            <div class="form-group col-md-8 col-sm-6">-->
<!--                                <select class="custom-select" required v-model="formData.topics">-->
<!--                                    <option value="0">{{ tbe('দয়া করে বিষয় নির্বাচন করুন','Please Select Topic',user.lang) }}</option>-->
<!--                                    <option :value="topic.id" v-for="(topic,index) in topics" :key="index">{{topic.name}}</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-4 col-sm-6">-->
<!--                                <input type="number" class="form-control" min="1" max="10"  :placeholder=" tbe('প্রশ্নের সংখ্যা','Number of Questions',user.lang) " v-model="formData.q_number">-->
<!--                            </div>-->
<!--                        </div>-->

<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-primary" @click="onnoFunc">{{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}</button>-->
<!--                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ tbe('বাতিল করুন','Cancel',user.lang) }}</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
	    </div>
    </div>
</template>

<script>
	import OptionComponent from "../helper/Examination/option";
	import QuestionButton from "../helper/Examination/QuestionButton";
    export default {
        components: {OptionComponent, QuestionButton},
        props: ['questions', 'qid','topics','user', 'examTime'],
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
            scrollToElement(id) {
                console.log('id....',id);
                // this.$refs["question_element" + id].scrollIntoView({ behavior: "smooth" });
                // let el = document.getElementById('question_element'+ id);
                // el.scrollTop = el.innerHeight;
                const element = document.getElementById("question_element" + id);
                element.scrollIntoView({ behavior: 'smooth' });
            },
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
                let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
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
            },
            submited(){
                const txt = this.user.lang == 'gb' ?'Are you sure submit to your exam!': 'আপনি কি নিশ্চিত, আপনার পরীক্ষা জমা দেয়ার জন্য!'
                const title = this.user.lang == 'gb' ?'Are you sure?': 'আপনি কি নিশ্চিত?'
                const yes = this.user.lang == 'gb' ?'Yes': 'হ্যাঁ'
                const no = this.user.lang == 'gb' ?'No': 'না'
                this.$swal({
                    title: title,
                    text: txt,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: yes,
                    cancelButtonText: no,
                }).then((result) => {
                    if (result.value) {
                        this.submitExam()
                    }
                });
            },
            negativeMark(){
                return this.qid.negative_mark > 0 ? (this.qid.each_question_mark * this.qid.negative_mark)/100 : 0
            }
		},
        created(){
            this.countDownTimer()
            this.$watch('countDown', (newValue) => {
                if (newValue == 0) {
                    this.submitExam()
                }
            })
        },
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
</style>
