<template>
	<div class="waiting">
	    <div class="card" style="width: 24rem; ">
	        <div class="card-header">
	            <span v-if="user.id != uid" class="ml-1 text-primary">{{user.team_id}} Please wait, the Quiz Host will start the game soon..</span>
	        </div>
	        <div class="card-body" style="max-height:90vh; overflow:auto">
                <h3 class="p-2">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    Participant Group
                </h3>
                <div class="list-group">
                    <span  class="list-group-item list-group-item-action" aria-current="true" v-for="(team,index) in teams" :key="index">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{team.name}}</h5>
<!--                            <small>3 days ago</small>-->
                        </div>
                        <p class="mb-1"><span class="badge badge-info mr-1 text-white" v-for="user in getTeamUsers(team.id)" :key="user.id" v-if="!!user">{{ user.name }}</span></p>
<!--                        <small>And some small print.</small>-->
                    </span>

                </div>


	            <!-- <a @click="$emit('gameReset')" v-if="user.id == uid" class="btn btn-sm btn-outline-danger mt-4">RESET</a> -->
	            <div class="d-flex justify-content-between">
                    <a @click="$emit('gameStart')" v-if="user.id == uid" class="btn btn-sm btn-outline-success mt-4 pull-right">START</a>
<!--                    <a class="btn btn-sm btn-outline-danger mt-4 " v-html="schedule">-->
<!--                    </a>-->

                </div>
	        </div>
	       <!--  <div class="card-footer">
	            <div v-if="user.id == uid" class="sharethis-inline-share-buttons"></div>
	        </div> -->
	    </div>

	</div>

</template>

<script>
export default{
	props:['user', 'uid', 'users', 'time', 'teamUser', 'teams'],
    data() {
        return {
            days: '',
            hours: '',
            minutes: '',
            seconds: '',
            schedule: '',
            timer: null,
            teamUsers: this.team_users

        };
    },
    methods:{
        getTeamUsers(team){
            let users = this.users.map(u => {
                if(u.gid === team) return u;
            });
            if(typeof(users !== 'undefined')) return users
            return [];
        },
    	kickingUser(id){
    		this.$emit("kickingUser", id);
        },
        getTeamMember(team_id){
            this.users.map(user => {
                if(user.team_id == team_id){
                    return `${user.name}`;
                }
            })
        },

        getAvatar(link){
    	    if(link) return link;
            return '/img/avatar.png';
        },
        getAvatarAlt(name){
            return name.substring(0, 2);
        },

        getFlag(country){
        	return 'https://flagcdn.com/40x30/'+country+'.png';
        },
        scheduledTimer(){
            let countDownDate = new Date(this.time).getTime();
            this.timer = setInterval(() => {
                let now = new Date().getTime();
                let distance = countDownDate - now;
                this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                this.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                this.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                this.seconds = Math.floor((distance % (1000 * 60)) / 1000);
                this.schedule = this.days + "d " + this.hours + "h " + this.minutes + "m " + this.seconds + "s ";
                if (distance < 0) {
                    clearInterval(this.timer);
                    this.schedule = '<i class="fas fa-check"></i>';
                }

            }, 1000);
        }
    },
    created: function(){
        this.scheduledTimer()
        console.log('scheduledTimer started')
    },


};

</script>
<style>
	.circle{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        position: absolute;
        top: 4px;
        left: 15px;
        font-size: 1.5rem;
        background: gray;
        color: white;

    }
    .flag{
		position: absolute;
		right: 15px;
		top: 8px;
    }
    .close{
    	position: absolute;
    	top: -5px;
    	right: 0px;
    	color: red;
    }
</style>
