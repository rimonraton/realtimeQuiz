<template>
    <div id="accordion" class="px-1">
        <div class="card border-primary" >
            <div class="card-header py-2 " id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <strong class="mb-0 cursor">
                {{ tbe('ফলাফল', 'Result Details', lang) }}
              </strong>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body p-0">
                <ul class="list-group text-dark" :style="getStyle()">
                    <li v-for="result in results.slice().reverse()" :key="result.id" class="list-group-item d-flex justify-content-between align-items-center p-1">
                        <div class="font-weight-light f-13">
                            <span class="font-weight-bold" v-html="result.question"></span>
                            <p v-if="result.isCorrect !=0">
                                <span>  {{tbe('আপনার উত্তরটি সঠিক হয়েছেঃ ', 'Your answer is correct: ', lang)}}</span>
                             <span class="font-weight-light font-italic" v-if="isImg(result.selected)">
                                 <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ result.selected" style="max-height:30px" alt="">
                             </span>
                             <span class="font-weight-light font-italic" v-html="result.selected" v-else></span>
                                <i class="fa fa-check text-success" aria-hidden="true"></i>
                            </p>
                            <p v-else>
                                <span> {{tbe('আপনার দেয়া উত্তরঃ ', 'Your answer: ', lang)}} </span>
                                <span class="font-weight-light font-italic" v-if="isImg(result.selected)">
                                    <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ result.selected" style="max-height:40px" alt="">
                                </span>
                                <span class="font-weight-light font-italic" v-html="result.selected" v-else></span>
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                <br>
                                <span>{{tbe('সঠিক উত্তরঃ ','Correct answer: ', lang)}}</span>
                                <span class="font-weight-light font-italic" v-if="isImg(result.answer)">
                                     <img  class="image mt-1 rounded img-thumbnail" :src="'/'+ result.answer" style="max-height:40px" alt="">
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
      <div class="my-5"></div>

    </div>
</template>

<script>
    export default {
        props: ['results', 'ws', 'correct', 'wrong', 'lang', 'vh'],

        methods: {
          getStyle(){
            let Hight = '50vh'
            if (this.vh) Hight = this.vh

            return {
              'max-height': Hight,
              overflow: 'auto'
            }
          },
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
