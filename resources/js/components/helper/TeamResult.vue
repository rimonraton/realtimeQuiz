<template>
	<div class="result">
<!--        <div class="card bg-dark text-white">-->
<!--          <img class="card-img" :src="addImage()">-->
<!--        </div>-->
        <div class="card mt-1" style="width: 24rem;">
            <div class="card-header">Results</div>
            <div class="card-body">
<!--                <img class="card-img img-responsive" :src="addImage()">-->
                <ul class="list-group">
                    <li class="list-group-item" v-for="(v, i) in results" :key="i">
<!--                        {{ v.name + ' : ' + v.score }}-->
                        <span v-html="getMedel(i)"></span>
                        {{v.name}}<span class="badge badge-primary float-right mt-1 text-white">{{ v.score}}</span>

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
                <button @click="back" class="btn btn-sm btn-success">Dashboard</button>
<!--                <a href="/#about" class="btn btn-sm btn-secondary text-center">Game List</a>-->
            </div>
        </div>
    </div>

</template>

<script>
export default{
	props:['results'],

    methods:{

        back(){
            // window.history.back()
            window.location = '/team_quiz';
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
