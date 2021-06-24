<template>
	<div class="waiting">
	    <div class="card" style="width: 24rem; ">
	        <div class="card-header" v-if="user.id != uid">
	            <span  class="ml-1 text-primary">{{tbe('দয়া করে অপেক্ষা করুন, কুইজ মাস্টার শীঘ্রই গেমটি শুরু করবে ..','Please wait, the Quiz Master will start the game soon..',user.lang)}}</span>
	        </div>
	        <div class="card-body" style="max-height:90vh; overflow:auto">
<!--                <h1 class="animate__animated animate__bounce">An animated element</h1>-->

                <h3 class="p-2">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    {{ tbe('অংশগ্রহণকারী দল','Participant Group',user.lang) }}
                </h3>
<!--                <div class="list-group">-->
<!--                    <span  class="list-group-item list-group-item-action" aria-current="true" v-for="(team,index) in teams" :key="index">-->
<!--                        <div class="d-flex w-100 justify-content-between">-->
<!--                            <h5 class="mb-1">{{team.name}}</h5>-->
<!--&lt;!&ndash;                            <small>3 days ago</small>&ndash;&gt;-->
<!--                        </div>-->
<!--                        <p class="mb-1"><span class="badge badge-info mr-1 text-white" v-for="user in getTeamUsers(team.id)" :key="user.id" v-if="!!user">{{ user.name }}</span></p>-->
<!--&lt;!&ndash;                        <small>And some small print.</small>&ndash;&gt;-->
<!--                    </span>-->

<!--                </div>-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2" :class="cardColor()" v-for="(team,index) in teamsNewdata" :key="index">
<!--                            <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">-->
                            <div class="card-body">
                                <div class="news-title">
                                    <h2 class=" title-small">{{team.name}} <span class="text-danger float-right" style="cursor:pointer" @click="deleteTeam(team.id)" v-if="user.id == uid">X</span></h2>
                                </div>
                                <p class="card-text"><span class="badge badge-info" v-for="user in getTeamUsers(team.id)" :key="user.id" v-if="!!user">{{ user.name }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

	            <!-- <a @click="$emit('gameReset')" v-if="user.id == uid" class="btn btn-sm btn-outline-danger mt-4">RESET</a> -->
	            <div class="d-flex justify-content-between">
                    <a @click="$emit('gameStart')" v-if="user.id == uid" class="btn btn-sm btn-outline-success mt-4 pull-right">{{ tbe('শুরু করুন','START',user.lang) }}</a>
                    <a @click="open_team_modal" v-if="user.id == uid" class="btn btn-sm btn-outline-info mt-4 pull-right">{{ tbe('দল যুক্ত করুন','Add Team',user.lang) }}</a>
<!--                    <a class="btn btn-sm btn-outline-danger mt-4 " v-html="schedule">-->
<!--                    </a>-->

                </div>
	        </div>
	       <!--  <div class="card-footer">
	            <div v-if="user.id == uid" class="sharethis-inline-share-buttons"></div>
	        </div> -->
	    </div>

<!--        modal-->

        <div class="modal animate__animated animate__backInUp" tabindex="-1" data-backdrop="false" role="dialog" id="team_modal">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ tbe('দল যুক্ত করুন','ADD TEAM',user.lang) }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span id="btn_cls" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6">
                                <input type="text" class="form-control" min="1" max="10" v-model="teamData.team_english" :placeholder=" tbe('ইংরেজিতে লিখুন','Type in English',user.lang) " >
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <input type="text" class="form-control" min="1" max="10" v-model="teamData.team_bangla"  :placeholder=" tbe('বাংলায় লিখুন','Type in Bangla',user.lang) " >
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="addemitTeam" >{{ tbe('দল যুক্ত করুন','ADD TEAM',user.lang) }}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ tbe('বাতিল করুন','Cancel',user.lang) }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal animate__animated animate__backInLeft" tabindex="-1" data-backdrop="false" role="dialog" id="deleteModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ tbe('দল ডিলিট করুন','DELETE TEAM',user.lang) }}</h5>
                    </div>
                    <div class="modal-body">
                        <p>{{tbe('তুমি কি নিশ্চিত? আপনি এটিকে ফিরিয়ে দিতে পারবেন না !',"Are you sure? You won't be able to revert this!",user.lang)}}</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="deleteSubmit" >{{ tbe('দল ডিলিট করুন','DELETE TEAM',user.lang) }}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ tbe('বাতিল করুন','CANCEL',user.lang) }}</button>
                    </div>
                </div>
            </div>
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
            teamUsers: this.team_users,
            colors:['border-primary','border-secondary','border-success','border-danger','border-warning','border-info','border-dark'],
            teamData:{
                team_english:'',
                team_bangla:'',
            },
            teamsNewdata:this.teams,
            showDelete:true,
            teamId:null,
        };
    },
    methods:{

        open_team_modal(){

            $('#team_modal').modal('show');
        },
        addemitTeam(){
            $('#team_modal').modal('hide');
            this.$emit('addTeam',this.teamData);

                this.teamData.team_english='';
                this.teamData.team_bangla='';
        },
        // animate:
        deleteTeam(id){
            this.teamId = id,
            $('#deleteModal').modal('show');
        },
        deleteSubmit(){
            $('#deleteModal').modal('hide');
            this.$emit('deleteTeam',this.teamId);
            this.teamId = null
        },
        cardColor: function (index) {
            return this.colors[Math.floor(Math.random() * this.colors.length)];
        },
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
    },
    created: function(){
	    // this.swa()
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
    .ds-btn li{ list-style:none; padding:10px; }
    #team_modal {
        background: linear-gradient(to right, #0083B0, #00B4DB);
    }

    #btn_cls {
        font-size: 30px;
        position: absolute;
        right: -7px;
        top: -3px;
        background: white;
        border: 1px solid;
        border-radius: 50%;
        width: 35px;
        /* z-index: 999999; */
    }

</style>
