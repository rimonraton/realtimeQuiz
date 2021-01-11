<template>
    <div id="accordion">
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
                            <span class="font-weight-bold">
                                {{ ToText(result.question) }}
                            </span>
                            <p v-if="result.isCorrect">
                             <span class="font-weight-light font-italic"> {{ ToText(result.selected) }}</span>
                                <i class="fa fa-check text-success" aria-hidden="true"></i>
                            </p>
                            <p v-else>
                                <span class="font-weight-light font-italic">
                                    {{ ToText(result.selected) }}
                                </span>
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                <br>

                                <span class="font-weight-light font-italic"> {{ ToText(result.answer) }}</span>
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
        </div>
    </div>
</template>

<script>
    export default {
        props: ['results'],

        methods: {
            ToText(HTML){
              var input = HTML;
              return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,'').replace(/<[^>]+?>/g,'').replace(/\s+/g,' ').replace(/ /g,' ').replace(/>/g,' ').replace(/&nbsp;/g,'').replace(/&lsquo;/g,'').replace(/&rsquo;/g,'');  
            },
        }

    };
</script>

<style>
    
</style>