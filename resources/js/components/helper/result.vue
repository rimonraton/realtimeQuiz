<template>
	<div class="result">
<!--        <div class="card bg-dark text-white">-->
<!--          <img class="card-img" :src="addImage()">-->
<!--        </div>-->
        <div class="card mt-1" style="width: 24rem;">
            <div class="card-header">Results</div>
            <div class="card-body">
                <img class="card-img img-responsive" :src="addImage()">
                <ul class="list-group">
                    <li class="list-group-item" v-for="(v, i) in results" :key="i">
                        {{ v.name + ' : ' + v.score }}
                    </li>
                </ul>
            </div>
            <div class="card-footer" v-if="lastQuestion">
                <button @click="back" class="btn btn-sm btn-success">New Quiz</button>
<!--                <a href="/#about" class="btn btn-sm btn-secondary text-center">Game List</a>-->
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
        back(){
            // window.history.back()
            window.location = '/game/mode/challenge';
        },
    }

};

</script>
<style>

</style>
