<template>
	<div class="waiting">
	    <div class="card" style="width: 24rem; ">
	        <div class="card-header text-center">
	            <h4 class="ml-1 text-primary">
                    Please insert your name & mobile
                </h4>
	        </div>
	        <div class="card-body" style="max-height:90vh; min-height:50vh; overflow:auto">
                <div class="d-flex justify-content-between">
                    <input type="text" v-model="newUser.name" class="form-control" placeholder="Your Name" autofocus>
                </div>
                <div class="d-flex justify-content-between mt-2 ">
<!--                    <input type="phone" v-model="newUser.mobile" class="form-control" placeholder="Mobile No.">-->
                    <vue-tel-input
                        v-model="newUser.mobile"
                        @validate="validate"
                        class="form-control" />
                </div>
                <div class="d-flex justify-content-center"
                     v-if="newUser.name.length > 2 && newUser.valid">
                    <a @click="$emit('insertUser', newUser)"
                       class="btn btn-sm btn-success mt-4 pull-right"
                    > JOIN </a>
                </div>
	        </div>
	    </div>

	</div>

</template>


<script>
// import { VueTelInput } from 'vue-tel-input';
const VueTelInput = () =>
    Promise.all([
        import(/* webpackChunkName: "chunk-vue-tel-input" */ 'vue-tel-input'),
        import(/* webpackChunkName: "chunk-vue-tel-input" */ 'vue-tel-input/dist/vue-tel-input.css'),
    ]).then(([{ VueTelInput }]) => VueTelInput);


export default{
	props:['user', 'uid', 'users', 'time'],
    components: {
        VueTelInput,
    },
    data() {
        return {
            newUser: {
                name:'',
                mobile: '',
                valid: false
            },
            days: '',
            hours: '',
            minutes: '',
            seconds: '',
            schedule: '',
            timer: null,
            value: '',
            dropdownOptions: {
                disabled: true,
            }
        };
    },
    methods:{
        validate(phoneObject) {
            this.newUser.valid = phoneObject.valid
            // console.log('phoneObject', phoneObject);
        },
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
    }

};

</script>
<style src="vue-tel-input/dist/vue-tel-input.css"></style>

