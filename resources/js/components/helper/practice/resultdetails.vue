<template>
    <div id="accordion" class="w-100">
        <div class="card">
            <div class="card-header py-1 " id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <small class="mb-0 cursor">

                {{ tbe('ফলাফল', 'Result Details', lang) }}
              </small>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body p-0">
                <ul class="list-group text-dark" style="max-height: 380px; overflow:auto;">
                    <li v-for="result in results.slice().reverse()" :key="result.id" class="list-group-item d-flex justify-content-between align-items-center p-1">
                        <div class="font-weight-light f-13">
                            <span class="font-weight-bold" v-html="result.question"></span>
                            <p v-if="result.isCorrect !=0">
                                <span>  {{tbe('আপনার উত্তরটি সঠিক হয়েছেঃ ', 'Your answer is correct: ', lang)}}</span>
                             <span class="font-weight-light font-italic" v-if="isImg(result.selected)">
                                 <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ result.selected" style="max-height:10vh" alt="">
                             </span>
                             <span class="font-weight-light font-italic" v-html="result.selected" v-else></span>
                                <i class="fa fa-check text-success" aria-hidden="true"></i>
                            </p>
                            <p v-else>
                                <span> {{tbe('আপনার দেয়া উত্তরঃ ', 'Your answer: ', lang)}} </span>
                                <span class="font-weight-light font-italic" v-if="isImg(result.selected)">
                                    <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ result.selected" style="max-height:10vh" alt="">
                                </span>
                                <span class="font-weight-light font-italic" v-html="result.selected" v-else></span>
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                <br>
                                <span>{{tbe('সঠিক উত্তরঃ ','Correct answer: ', lang)}}</span>
                                <span class="font-weight-light font-italic" v-if="isImg(result.answer)">
                                     <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ result.answer" style="max-height:10vh" alt="">
                                </span>
                                <span class="font-weight-light font-italic" v-html="result.answer" v-else></span>
                                <i class="fa fa-check text-success" aria-hidden="true"></i>
                            </p>

                        </div>
                         <span class="badge badge-light badge-pill">
                            {{ result.time  }}
                        </span>
                    </li>

                </ul>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between" v-if="ws==1">
                <button @click="back" class="btn btn-sm btn-success">New Quiz</button>
                <div class="btn-group mr-2" role="group" aria-label="Right Wrong">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Correct Answer">{{correct}}</button>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Wrong Answer">{{wrong}}</button>
                </div>

                <button @click="reloadPage" class="btn btn-sm btn-secondary">Replay</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['results', 'ws', 'correct', 'wrong', 'lang'],

        methods: {
            reloadPage(){
                window.location.reload()
            },
            back(){
              window.location.replace("/Practice");
                // window.history.back()
            },
            isImg(link){
                return link.match(/\.(jpeg|jpg|gif|png)$/) != null
                // let data = link.split('.')
                // console.log(data.length > 1)
                // return data.length > 1
            },
          tbe(b, e, l) {
            return l === 'bd' ? (!!b ? b : e) : (!!e ? e : b)
          }
        }

    };
</script>

<style>
#accordion{
    max-width: 500px !important;
}

</style>
