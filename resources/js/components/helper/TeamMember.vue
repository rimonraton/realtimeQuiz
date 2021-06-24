<template>
	<div class="waiting bg-team">
        <h2>{{ tbe('দয়া করে আপনার দল নির্বাচন করুন','Please Select Your Team',user.lang) }}</h2>
	    <div class="card mb-2 pointer" @click="$emit('joinTeam',team.id)" style="width: 24rem; " v-for="(team,index) in teams" :key="team.id">
	        <div class="card-body bg-secondary" style="max-height:90vh; overflow:auto">
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
            colors:['bg-info','bg-danger','bg-success','bg-dark','bg-primary','bg-secondary','bg-warning']

        };
    },
    methods:{
        cardColor: function () {
            return this.colors[Math.floor(Math.random() * this.colors.length)];
            // colors[Math.floor(Math.random() * colors.length)];
        },
        tbe(b, e, l) {
            if(b !== null && e !== null){
                console.log('no null question')
                if(l === 'bd') {
                    return b;
                }
                return e;
            }
            else if(b !== null && e === null) {
                console.log('Bangla not null');
                return b;
            }
            else if(b === null && e !== null) {
                console.log('English not null');
                return e;
            }
            return b;
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
