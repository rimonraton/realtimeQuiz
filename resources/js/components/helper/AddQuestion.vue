<template>
    <div class="text-center">
      <a class="btn btn-outline-primary" @click="showModal">
        {{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}
      </a>
      <div class="modal" tabindex="-1" data-backdrop="false" role="dialog" id="qmodal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                {{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="btn_cls_q">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="form-group col-md-8 col-sm-6">
                  <select class="custom-select" required v-model="formData.topics">
                    <option value="0">
                      {{ tbe('দয়া করে বিষয় নির্বাচন করুন','Please Select Topic',user.lang) }}
                    </option>
                    <option :value="topic.id" v-for="(topic,index) in topics" :key="index">
                      {{topic.name}}
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                  <input
                      type="number"
                      class="form-control"
                      min="1" max="10"
                      :placeholder=" tbe('প্রশ্নের সংখ্যা','Number of Questions',user.lang) "
                      v-model="formData.q_number">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" @click="addQuestion">
                {{ tbe('প্রশ্ন যুক্ত করুন','ADD QUESTION',user.lang) }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                {{ tbe('বাতিল করুন','Cancel',user.lang) }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import {quizHelpers} from "../mixins/quizHelpers";

export default {
  props: ['topics','user'],
  mixins: [quizHelpers],

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
    addQuestion(){
      $('#qmodal').modal('hide');
      this.$emit('addQuestion',this.formData)
      this.formData.topics = 0
      this.formData.q_number = null
    },
    showModal(){
      $('#qmodal').modal('show');
      // this.isModalVisible = true
    },
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

</style>
