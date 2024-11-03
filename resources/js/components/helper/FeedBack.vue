<template>
 <div class="text-right pt-3">
   <!--Modal Launch Button-->
   <div v-if="success" class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Thanks for being awesome! </strong> We have received your feedback and would like to thank you for writing to us.
   </div>
   <button v-if="feedback === 0"
     type="button" class="btn btn-lg openmodal" data-toggle="modal" data-target="#myModal">
     Feedback
   </button>
     <!--Division for Modal-->
     <div id="myModal" class="modal fade text-left" role="dialog">

       <!--Modal-->
       <div class="modal-dialog">

         <!--Modal Content-->
         <div class="modal-content">

           <!-- Modal Header-->
           <div class="modal-header">
             <h3>Feedback Request</h3>

             <!--Close/Cross Button-->
             <button type="button" class="close" id="closeModal" data-dismiss="modal" style="color: white;">&times;</button>
           </div>

           <!-- Modal Body-->
           <div class="modal-body text-center">
             <i class="far fa-file-alt fa-4x mb-3 mb-md-1 animated rotateIn icon1"></i>
             <h3>Your opinion matters</h3>
             <h5>Help us improve our product? <strong>Give us your Rating.</strong></h5>
             <hr class="m-0">
           </div>

           <!-- Radio Buttons for Rating-->
           <div class="ml-5 mb-3 mb-md-1">
             <div class="form-check mb-3 mb-md-1 ">
               <input class="form-check-input" type="radio" name="exampleRadios" id="op1" value="Very good" v-model="ratting">
               <label class="form-check-label" for="op1">
                 Very good
               </label>
             </div>
             <div class="form-check mb-3 mb-md-1">
               <input class="form-check-input" type="radio" name="exampleRadios" id="op2" value="Good" v-model="ratting">
               <label class="form-check-label" for="op2">
                 Good
               </label>
             </div>
             <div class="form-check mb-3 mb-md-1">
               <input class="form-check-input" type="radio" name="exampleRadios" id="op3" value="Mediocre" v-model="ratting">
               <label class="form-check-label" for="op3">
                 Mediocre
               </label>
             </div>
             <div class="form-check mb-3 mb-md-1">
               <input class="form-check-input" type="radio" name="exampleRadios" id="op4" value="Bad" v-model="ratting">
               <label class="form-check-label" for="op4">
                 Bad
               </label>
             </div>
             <div class="form-check mb-3 mb-md-1">
               <input class="form-check-input" type="radio" name="exampleRadios" id="op5" value="Very Bad" v-model="ratting">
               <label class="form-check-label" for="op5">
                 Very Bad
               </label>
             </div>
           </div>
           <!--Text Message-->
           <div class="text-center mt-2">
             <h4>What could we improve? </h4>
           </div>
           <textarea type="textarea" placeholder="Your Message" rows="4" class="form-control" v-model="message"></textarea>


           <!-- Modal Footer-->
           <div class="modal-footer">
             <a href="" class="btn btn-success" @click.prevent="sendFeedback">
               Send
               <i class="fa fa-paper-plane"></i>
             </a>
             <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
           </div>

         </div>

       </div>

     </div>
 </div>
</template>

<script>

import {ref} from "vue";

export default{
  props:['user'],
  data() {
    return {
      ratting: ref(''),
      message: ref(''),
      success: false,
      feedback : 0
    };
  },

  methods:{
    sendFeedback() {
      this.message = this.message.trim()
      const data = {user_id: this.user.id, ratting: this.ratting, message: this.message}
      console.log(data)
      if(this.ratting !== '' && this.ratting !== null) {
        this.message = ''
        this.ratting = ''
        axios.post(`/feedback`, data)
          .then(res => {
            console.log(res.data)
            this.feedback = 1
            localStorage.setItem('feedback', '1')
            this.success = true
            document.getElementById('closeModal').click();
            setTimeout(() => {
              this.success = false
            }, 15000)
          })
      }
    },
  },
  mounted() {
    if (localStorage.feedback) {
      this.feedback = localStorage.feedback;
    }
  },

};

</script>
<style scoped>

.modal-header{
  color: white;
  background-color: #00A988;
}

input[type=radio] {
  width: 1.5em !important;
  height: 1.5em !important;
  accent-color: green !important;
}
.form-check-label {
  padding-left: 20px !important;
  font-size: 1.5em !important;
}

textarea{
  box-shadow: none !important;
  -webkit-appearance:none;
  outline:0px !important;
  margin: 3%;
  width: 94%;
}

.openmodal{
  color: white;
  background-color: #00A988;
  border-color: #00A988;
}

.icon1{
  color: #00A988;

}

a{
  margin: auto;
}

input{
  color: #007bff;

}


@media(max-width: 576px){

}
</style>
