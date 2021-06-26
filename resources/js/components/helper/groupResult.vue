<template>
    <div class="result">
        <div class="card w-50 m-auto">
          <div class="card-body">
            <h5 class="card-title text-center">{{ tbe('ফলাফল','Results',user.lang) }}</h5>
            <ul class="list-group text-dark">
              <li class="list-group-item d-flex justify-content-between align-items-center p-0" v-for="(result, key) in results" :key="key">
                <div :id="'accordion' + key" class="w-100">
                    <div class="card text-white bg-secondary">
                        <div class="card-header py-1 bg-secondary d-flex justify-content-between"
                            :id="'heading' + key" data-toggle="collapse"
                            :data-target="'#collapse' + (result.name == groupName? key:'')" aria-expanded="true"
                            :aria-controls="'collapse' + key">
                            <small class="mb-0 cursor">
                                {{ result.name }}
                            </small>
                            <span class="badge badge-success badge-pill">
                                {{ result.score  }}
                            </span>
                        </div>

                        <div :id="'collapse' + key" class="collapse" :class="{show: result.name == groupName}"
                            :aria-labelledby="'heading' + key"
                            :data-parent="'#accordion' + key">
                          <div class="card-body p-0">
                            <ul class="list-group text-dark" style="max-height: 380px; overflow:auto;">
                                <li v-for="(answer, key) in result.answers" :key="key" class="list-group-item d-flex justify-content-between align-items-center p-1">
                                    <div class="font-weight-light f-13">
                                        <!-- <span class="font-weight-bold">
                                            {{ answer.question }}
                                        </span> -->
                                        <span class="font-weight-light font-italic">
                                            {{ answer.user.name + ' - ' + answer.selected }}
                                        </span>
                            <i v-if="answer.isCorrect==1" class="fa fa-check text-success" aria-hidden="true" ></i>
                            <i v-else class="fa fa-times text-danger" aria-hidden="true" ></i>

                                    </div>

                                </li>

                            </ul>
                          </div>
                        </div>
                    </div>

                </div>
              </li>
            </ul>
          </div>
          <img class="card-img-bottom" :src="addImage()">
        </div>
    </div>

</template>

<script>
export default{
	props:['results', 'lastQuestion', 'groupName','user'],

    methods:{
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
    	addImage(){
            let random = Math.floor(Math.random() * 4)+1;
            return `/images/gp/${random}.jpg`;
        },
    }

};

</script>
<style>

</style>
