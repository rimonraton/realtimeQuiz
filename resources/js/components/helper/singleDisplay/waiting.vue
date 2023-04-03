<template>
	<div class="waiting">
	    <div class="card" style="min-width: 24rem">
	        <div class="card-header text-center">
	            <span v-if="user.id != uid" class="ml-1 text-primary">
                    Please wait, the Quiz Host will start the game soon..
                </span>
                <span v-else class="ml-1 text-primary">
                    User List
                </span>
	        </div>
	        <div class="card-body" >
                <img v-if="qr" :src="getQr" alt="QR Code" class="img-thumbnail">
                <div style="max-height:50vh; overflow:auto">
                    <ul class="list-group " v-if="uid === user.id">
                        <li class="list-group-item"
                            v-for="u in users" :key="u.id"
                            :class="{active : u.id == user.id}"
                        >
                            <img :src="getAvatar(u.avatar)" :alt="getAvatarAlt(u.name)" class="circle mr-2">
                            <span class="ml-5">{{ u.name }}</span>
                            <span class="ml-1 badge badge-info">{{ u.mobile }}</span>
                            <span v-if="u.id == uid" class="ml-1 badge badge-info">Host</span>

                            <span class="flag" >
	                    	<img :src="getFlag(u.country)">
	                    </span>
                            <button
                                v-if="(u.id != user.id) && (user.id == uid)"
                                @click="kickingUser(u.id)"
                                class="close">
                                <span title="Kick User">&times;</span>
                            </button>
                        </li>
                    </ul>
                    <ul class="list-group " v-else>
                        <li class="list-group-item active" v-if="user.name">
                            <img :src="getAvatar(user.avatar)" :alt="getAvatarAlt(user.name)" class="circle mr-2">
                            <span class="ml-5">{{ user.name }}</span>
                            <span class="ml-1 badge badge-info">{{ user.mobile }}</span>
                            <span class="flag" >
	                    	<img :src="getFlag(user.country)">
	                    </span>
                        </li>
                    </ul>
                </div>
	            <!-- <a @click="$emit('gameReset')" v-if="user.id == uid" class="btn btn-sm btn-outline-danger mt-4">RESET</a> -->
	            <div class="d-flex justify-content-between">
                    <a @click="$emit('gameStart')"
                       v-if="user.id == uid"
                       class="btn btn-sm btn-outline-success mt-4 pull-right">START
                    </a>
                    <a class="btn btn-sm btn-outline-success mt-4 " @click="qr = !qr" >
                        <i class="fa-solid text-dark fa-qrcode"></i>
<!--                        <i class="fas fa-check"></i>-->
                    </a>

                </div>
	        </div>
<!--             Uncomment share.js in app.blade.php file -->
<!--	       <div class="card-footer">-->
<!--	            <div v-if="user.id == uid" class="sharethis-inline-share-buttons" style="max-width: 24rem"></div>-->
<!--	        </div>-->
	    </div>

	</div>

</template>

<script>
export default{
	props:['user', 'uid', 'users', 'time'],
    data() {
        return {
            days: '',
            hours: '',
            minutes: '',
            seconds: '',
            schedule: '',
            timer: null,
            qr: false
        };
    },
    methods:{
    	kickingUser(id){
    		this.$emit("kickingUser", id);
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
        // console.log('scheduledTimer started')
    },
    computed: {
        getQr(){
            return 'https://api.qrserver.com/v1/create-qr-code/?size=430x430&data='+window.location;
        },
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
