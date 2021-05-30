<template>
	<div class="waiting bg-team">
        <h2>Please Select Your Team</h2>
	    <div class="card mb-2 pointer" @click="$emit('joinTeam',team.id)" style="width: 24rem; " v-for="(team,index) in teams" :key="team.id">
	        <div :class="cardColor(index)" class="card-body " style="max-height:90vh; overflow:auto">
                    <h1 class="text-center text-white">
                        {{team.name}}
                    </h1>
	        </div>
	    </div>
	</div>

</template>

<script>
export default{
	props:['teams','user'],
    data() {
        return {
            colors:['bg-info','bg-danger','bg-success','bg-dark','bg-primary']
        };
    },
    methods:{
        cardColor: function (index) {
            return this.colors[index];
        },

    }
};

</script>
<style>
.pointer{
    cursor: pointer;
}
.pointer :hover{
    background:grey !important;
}
</style>
