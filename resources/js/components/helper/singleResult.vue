<template>
	<div class="result">
<!--        <div class="card bg-dark text-white">-->
<!--          <img class="card-img" :src="addImage()">-->
<!--        </div>-->
<!--    <div class="d-flex px-2" v-if="!!requestHostUser && uid == user.id">-->
<!--      <div class="alert alert-success page-alert text-center" id="alert-1">-->
<!--&lt;!&ndash;        <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>&ndash;&gt;-->
<!--        <strong>{{ requestHostUser.name }}</strong> requested to host the quiz.-->
<!--        <hr>-->
<!--        <button class="btn btn-sm btn-success" @click="$emit('makeHost', requestHostUser.id, 'accept')">Accept</button>-->
<!--        <button class="btn btn-sm btn-danger" @click="$emit('makeHost', requestHostUser.id, 'deny')">Deny</button>-->
<!--      </div>-->
<!--    </div>-->
        <div class="card mt-1" style="width: 24rem;" v-if="showResult">
<!--            <div class="d-flex justify-content-between p-2" v-if="uid == user.id">-->
<!--                <button type="button" class="btn btn-primary" @click="$emit('playAgain', true)">Play again</button>-->
<!--                <button type="button" class="btn btn-secondary" @click="$emit('newQuiz', makeUid)">New quiz</button>-->
<!--                <button type="button" class="btn" :class="[isDisabledHost() ? 'btn-secondary disabled' : 'btn-success']" @click="$emit('makeHost', makeUid)">Make host</button>-->
<!--            </div>-->

<!--          <div class="d-flex justify-content-between p-2" v-else>-->
<!--&lt;!&ndash;            <button type="button" class="btn btn-primary" @click="$emit('playAgain', true)">Play again</button>&ndash;&gt;-->
<!--&lt;!&ndash;            <button type="button" class="btn btn-secondary" @click="$emit('newQuiz', makeUid)">New quiz</button>&ndash;&gt;-->
<!--            <button type="button" class="btn " :class="[isDisabled() ? 'btn-secondary disabled' : 'btn-success']" @click="$emit('makeHost', makeUid)" >-->
<!--              {{ isDisabled() ? 'Request Pending' : 'Make host' }}</button>-->
<!--          </div>-->

            <div class="card-header">Results</div>
            <div class="card-body">
<!--                <img class="card-img img-responsive" :src="addImage()">-->
                <ul class="list-group">
                    <li class="list-group-item" v-for="(v, i) in results" :key="i">
<!--                        {{ v.name + ' : ' + v.score }}-->
                        <span v-html="getMedel(i)"></span>
                        {{v.name}}
                      <span v-if="v.id == user.id" class="ml-1 badge badge-info">You</span>
<!--                      <span v-if="requestHostUser" class="ml-1 badge badge-danger">{{ v.id == requestHostUser.id ? 'Requested' : '' }}</span>-->
                        <span class="badge badge-primary float-right mt-1 text-white">{{ v.score }}</span>
                    </li>
                </ul>
<!--                <ul class="list-group ">-->
<!--                    <li class="list-group-item user-list"-->
<!--                        v-for="(res, index) in results" :key="res.id"-->
<!--                        :class="{active : res.id == user.id}"-->
<!--                    >-->
<!--                        <span v-html="getMedel(index)"></span>-->
<!--                        {{ res.name }} <span class="badge badge-dark float-right mt-1">{{ res.score}}</span>-->
<!--                    </li>-->
<!--                </ul>-->
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <button @click="back" class="btn btn-sm btn-success">Dashboard</button>
                    <button class="btn btn-sm btn-info" @click="showDetail" v-if="uid !== user.id">Show your result</button>
                </div>
<!--                <a href="/#about" class="btn btn-sm btn-secondary text-center">Game List</a>-->
            </div>
        </div>
        <div class="card mt-1" style="width: 24rem;" v-else>
            <div class="card-header">Result Detail</div>
            <div class="card-body overflow-auto" style="height: 500px;">
<!--                {{ resultDetailData}}-->
                <!--                <img class="card-img img-responsive" :src="addImage()">-->
<!--                <ul class="list-group">-->
<!--                    <li class="list-group-item" v-for="(v, i) in results" :key="i">-->
<!--                        <span v-html="getMedel(i)"></span>-->
<!--                        {{v.name}}<span class="badge badge-primary float-right mt-1 text-white">{{ v.score }}</span>-->

<!--                    </li>-->
<!--                </ul>-->
                <div v-for="(result, i) in resultDetailData" :key="'resD'+i">
                    <div :id="'accordion'+ i" class="w-100 mb-2">
                        <div class="card text-white">
                            <div :id="'heading' + i" data-toggle="collapse" :data-target="'#collapse'+ i" aria-expanded="true" :aria-controls="'collapse' + i" class="card-header p-1 cursor" :class="[result.isCorrect > 0 ? 'bg-success' : 'bg-danger']">
                                <span class="text-white rounded-circle">{{i+1}}</span>
                                {{result.question}}
                            </div>
                            <div :id="'collapse' + i" :aria-labelledby="'heading'+ i" :data-parent="'#accordion' + i" class="collapse show" style="">
                                <div class="card-body">
                                    <div class="px-1">

<!--                                        {{ checkURL(result.selected) }}-->

                                        <div class="list-group" v-if="result.isCorrect > 0">
                                          <span class="list-group-item list-group-item-action my-1" v-if="checkURL(result.selected)">
                                               <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ result.selected" alt="">
                                              (your answer is correct)
                                              <i aria-hidden="true" class="fa fa-check text-success"></i>
                                          </span>
                                            <span class="list-group-item list-group-item-action my-1" v-else>
                                              {{result.selected}} (your answer is correct)
                                              <i aria-hidden="true" class="fa fa-check text-success"></i>
                                          </span>
                                        </div>
                                        <div class="list-group" v-else>
                                          <span class="list-group-item list-group-item-action my-1" v-if="checkURL(result.selected)">
                                             <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ result.selected" alt="">
                                              (your answer)
                                              <i aria-hidden="true" class="fa fa-times text-danger"></i>
                                          </span>
                                            <span class="list-group-item list-group-item-action my-1" v-else>
                                              {{result.selected}} (your answer)
                                              <i aria-hidden="true" class="fa fa-times text-danger"></i>
                                          </span>
                                            <div class="list-group" v-if="checkURL(result.answer)">
                                                <span class="list-group-item list-group-item-action my-1">
                                                    <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ result.answer" alt="">
                                                    (correct answer)
                                                    <i aria-hidden="true" class="fa fa-check text-success"></i>
                                                </span>
                                            </div>
                                            <div class="list-group" v-else>
                                                <span class="list-group-item list-group-item-action my-1">
                                                    {{result.answer}} (correct answer)
                                                    <i aria-hidden="true" class="fa fa-check text-success"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                    <button @click="showDetail" class="btn btn-sm btn-success">Close</button>
                <!--<a href="/#about" class="btn btn-sm btn-secondary text-center">Game List</a>-->
            </div>
        </div>
    </div>

</template>

<script>
export default{
	props:['results', 'lastQuestion', 'resultDetail', 'user', 'uid'],
    data(){
	    return{
            showResult:true,
            resultDetailData: null,
            // makeUid: this.user.id,

        }
    },
    mounted() {
	    // console.log('session data', sessionStorage.SingleGameUser)
	    console.log('result data', this.resultDetailData)
    },
    methods:{
      isDisabledHost(){
        return this.uid == this.makeUid
      },
      isDisabled() {
        // you can  check your form is filled or not here.
        return this.requestHostUser != null
        // return this.requestHostUser != null ? (this.user.id == this.requestHostUser.id) : false
      },
        checkURL(url) {
            return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
        },
        selectUid(id){
            console.log('id data..', id)
            if(this.uid == this.user.id) {
              this.makeUid = id
            }
        },
        showDetail(){
            if (this.resultDetailData != null){
                this.showResult = !this.showResult
            } else{
                this.resultDetailData = this.resultDetail.filter((user) => {
                   return  user.uid == this.user.id
                })
                this.showResult = !this.showResult
            }
        },
    	addImage(){
            let random = Math.floor(Math.random() * 4)+1;
            return `/images/gp/${random}.jpg`;
        },
        back(){
            // window.history.back()
            window.location = '/challenge';
        },
        getMedel(index){
            if(index == 0) return '<span class="badge badge-success m-1">1<sup>st</sup></span> <i class="fas fa-award fa-lg ml-1" style="color: gold"></i>'
            if(index == 1) return '<span class="badge badge-primary m-1">2<sup>nd</sup></span><i class="fas fa-award ml-1" style="color: silver"></i>'
            if(index == 2) return '<span class="badge badge-info m-1">3<sup>rd</sup></span><i class="fas fa-award fa-sm ml-1" style="color: #CD7F32"></i>'
            if (index > 2) return `<span class="badge badge-secondary m-1">${index + 1}</span>`;
        }
    }

};

</script>
<style>

</style>
