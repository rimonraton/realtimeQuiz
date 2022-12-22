<template>
	<div>
		<div :id="'accordion' + index" class="w-100 mb-2" v-for="(question, index) in questiondata">
		    <div class="card text-white" :class="index == qid ? 'bg-success' : 'bg-secondary'">
		        <div class="card-header p-1 cursor"
		            :class="index == qid ? 'bg-success' : 'bg-secondary'"
		            :id="'heading'+ index"
		            data-toggle="collapse"
		            :data-target="'#collapse'+ index"
		            aria-expanded="true"
		            :aria-controls="'collapse'+ index">
		            <span class="text-white rounded-circle" :class="{qid: index == qid}">{{ !fileType(question.fileType)? user.lang=='gb'?index + 1:q2bNumber(index + 1): '' }}</span>
		              {{ fileType(question.fileType) ? fileText(question.fileType, user.lang):tbe(question.bd_question_text,question.question_text,user.lang) }}
		        </div>

		        <div :id="'collapse'+ index" class="collapse" :class="{show: index == qid}" :aria-labelledby="'heading'+ index" :data-parent="'#accordion' + index">
		          <div class="card-body p-0">
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
                        <span class="text-white rounded-circle" :class="{qid: index == qid}">{{ user.lang=='gb'?index + 1:q2bNumber(index + 1) }}</span>
                        {{ tbe(question.bd_question_text,question.question_text,user.lang) }}
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
                      <div :class="{'row justify-content-center justify-item-center': imageOption(question.options)}">
                          <div v-for="(option, index) in question.options" :key="option.id" :class="{'col-6':option.flag == 'img'}">
                              <ul class="list-group" v-if="option.flag != 'img'">
                                  <li  class="list-group-item d-flex justify-content-between align-items-center p-1">
                                      <small class="text-black-50">
                                          {{ tbe(option.bd_option,option.option,user.lang) }}
                                      </small>
                                      <span v-if="option.correct ==1">
                                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                                      </span>
                                  </li>
                              </ul>
                              <div v-else class="cursor my-1">
                                  <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
                                  <span v-if="option.correct ==1" class="imgTick">
                                      <i class="fa fa-check text-success" aria-hidden="true"></i>
                                  </span>
                              </div>
                          </div>
                      </div>
		          </div>
		        </div>
		    </div>
		</div>
        <div class="text-center">
            <a class="btn btn-sm col-sm-6 btn-success" @click="showModal">{{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}</a>

        </div>


        <div class="modal" tabindex="-1" data-backdrop="false" role="dialog" id="qmodal">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" id="btn_cls_q">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-8 col-sm-6">
                                <select class="custom-select" required v-model="formData.topics">
                                    <option value="0">{{ tbe('দয়া করে বিষয় নির্বাচন করুন','Please Select Topic',user.lang) }}</option>
                                    <option :value="topic.id" v-for="(topic,index) in topics" :key="index">{{topic.name}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <input type="number" class="form-control" min="1" max="10"  :placeholder=" tbe('প্রশ্নের সংখ্যা','Number of Questions',user.lang) " v-model="formData.q_number">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="onnoFunc">{{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ tbe('বাতিল করুন','Cancel',user.lang) }}</button>
                    </div>
                </div>
            </div>
        </div>
	</div>


</template>

<script>
	export default {
		props: ['questions', 'qid','topics','user'],
        data(){
		    return{
                formData:{
                    topics:0,
                    q_number:null,
                },
                questiondata:this.questions,
            }
        },

		methods: {
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
                    console.log('no null question')
                    if(l === 'bd') {
                        return b;
                    }
                    return e;
                }
                else if(b !== null && e === null) {
                    console.log('Bangla not null');
                    return b;
                }
                else if(b === null && e !== null) {
                    console.log('English not null');
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
            }
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
</style>
