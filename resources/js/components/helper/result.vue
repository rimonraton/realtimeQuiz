<template>
	<div class="result">
        <div class="card bg-dark text-white">
          <img class="card-img" :src="addImage()">
        </div>
        <div class="card" style="width: 24rem;">
            <div class="card-header">Results</div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item" v-for="(v, i) in results" :key="i">
                        {{ v.name + ' : ' + v.score }}
                    </li>
                </ul>
                <div id="counter" class="mt-5" v-if="counter">
                    <h1 class="text-center" style="color:#1BAA8F; height: 4rem;">
                        {{ counter }}
                    </h1>
                </div>
                <h1></h1>
            </div>
            <div class="card-footer" v-if="lastQuestion">
                <a href="http://quiz.erendevu.net/" class="btn btn-sm btn-secondary text-center">Game List</a>
            </div>
        </div>
    </div>
	
</template>

<script>
export default{
	props:['results', 'lastQuestion'],

    methods:{
    	addImage(){
            let random = Math.floor(Math.random() * 4)+1;
            return `/images/gp/${random}.jpg`;
        },
    }

};
	
</script>
<style>

</style>