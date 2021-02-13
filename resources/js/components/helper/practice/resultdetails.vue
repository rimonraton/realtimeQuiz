<template>
    <div id="accordion" class="w-100">
        <div class="card">
            <div class="card-header py-1 " id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <small class="mb-0 cursor">
                  Result Details
              </small>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body p-0">
                <ul class="list-group text-dark" style="max-height: 380px; overflow:auto;">
                    <li v-for="result in results" :key="result.id" class="list-group-item d-flex justify-content-between align-items-center p-1">
                        <div class="font-weight-light f-13">
                            <span class="font-weight-bold" v-html="result.question"></span>
                            <p v-if="result.isCorrect !=0">
                             <span class="font-weight-light font-italic" v-html="result.selected"></span>
                                <i class="fa fa-check text-success" aria-hidden="true"></i>
                            </p>
                            <p v-else>
                                <span class="font-weight-light font-italic" v-html="result.selected"></span>
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                <br>

                                <span class="font-weight-light font-italic" v-html="result.answer"></span>
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
            <div class="card-footer" v-if="ws==1">
                <button @click="back" class="btn btn-sm btn-success">New Quiz</button>
                <button @click="reloadPage" class="btn btn-sm btn-secondary float-right">Replay</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['results', 'ws'],

        methods: {
            reloadPage(){
                window.location.reload()
            },
            back(){
                window.history.back()
            },
        }

    };
</script>

<style>
#accordion{
    max-width: 500px !important;
}
    
</style>