<template>
	<div class="waiting">
	    <div class="card" style="min-width: 24rem">
        <div id="shareBtn" class="show_share shareBtnDiv" v-show="share">
          <iframe id="shareFrame" :src="getShareLink" frameborder="0" class="iframe-size"></iframe>
        </div>
        <div class="d-flex justify-content-between card-header text-center">
          <span class="btn btn-sm btn-danger align-self-start" @click="back">
            Back
          </span>
          <span v-if="!isHost" class="ml-1 text-primary">
            Please wait, the Quiz Host will start the game soon.
          </span>
          <span v-else class="ml-1 text-primary">
            <i v-if="users.length" class="fa fa-users fa-2x" aria-hidden="true"> {{users.length}}</i>
          </span>
          <div v-if="user.id === uid">
            <button
                class="btn btn-sm align-self-start"
                :class="[qr ? 'btn-dark' : 'btn-outline-secondary']"
                @click="qr = !qr" >
              {{qr? 'Close QR' : 'QR'}}s
            </button>
            <button
                class="btn btn-sm btn-outline-info"
                @click="share = !share" >
              Share
            </button>
          </div>
        </div>
        <div class="card-body todos" style="max-height:90vh; overflow:auto">
<!--  <img v-if="qr" :src="getQr" alt="QR Code" class="img-thumbnail">-->
          <div id="reader" width="300px"></div>
          <qrcode-vue :value="value" :size="size" level="H" v-if="qr" class="text-center" />
          <transition-group tag="ul" name="list">
              <li class="list-group-item rounded-lg"
                  v-for="u in users" :key="u.id"
                  :class="{ 'border border-success text-success' : u.id == user.id}"
                  >
                  <img :src="getAvatar(u.avatar)" :alt="getAvatarAlt(u.name)" class="circle mr-2">
                  <span class="ml-5">{{ u.name }} <span v-if="u.id == user.id">(You)</span></span>
                  <span v-if="u.id == uid" class="ml-1 badge badge-danger">Host</span>

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
          </transition-group>
            <!-- <a @click="$emit('gameReset')" v-if="user.id == uid" class="btn btn-sm btn-outline-danger mt-4">RESET</a> -->
            <div v-if="user.id == uid" class="d-flex justify-content-between">
                <div class="mt-4">
                    <div style="position: relative">
                        <span style="position: absolute; left: 32px; font-size: 11px; padding-top: 7px; color: gray">Seconds</span>
                        <input v-model="defaultTime" type="number" style="width: 100px;">
                    </div>
                </div>
                <a @click="$emit('gameStart', defaultTime)"
                   class="btn btn-sm btn-outline-success mt-4 pull-right">
                  START
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
import QrcodeVue from 'qrcode.vue'
import info from '../helper/moderator/info.vue'

export default{
	props:['user', 'uid', 'users', 'time', 'challenge', 'defTime'],
    components: {
      QrcodeVue, info
    },
    data() {
        return {
            days: '',
            hours: '',
            minutes: '',
            seconds: '',
            schedule: '',
            timer: null,
            qr: false,
            share: false,
            size: 300,
            defaultTime: this.defTime,
            value: window.location.toString()
        };
    },
    methods:{
      back(){
        window.history.back()
        //window.location = '/game/practice/challenge';
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
    },
    computed: {
        // getQr(){
        //     return 'https://api.qrserver.com/v1/create-qr-code/?size=430x430&data='+window.location;
        // },
        getShareLink(){
            return window.location +'/share'
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
  .activeItem{
      z-index: 2;
      color: #20c899;
      border-color: #3490dc;
      border-radius: 5px;
  }

  .iframe-size{
    width: 90vw;
    height: 90vh;
    left: 3vw;
  }
  .show_share {
    position: absolute;
    right: 0;
    height: 40px;
    width: 300px;
    overflow: hidden;
    transition: .5s linear;
    opacity: 1;
    top: -45px;
  }

  .todos {
    position: relative;
  }

  .todos ul {
    position: relative;
  }
  .todos li {
    display: block;
    margin-bottom: 5px;
  }

  .list-move {
    transition: all 0.4s ease;
  }
  .list-enter-from {
    opacity: 0;
    transform: scale(0.5);
  }
  .list-enter-to {
    opacity: 1;
    transform: scale(1.2);
  }
  .list-enter-active {
    transition: all 0.4s ease;
  }
  .list-leave-from {
    opacity: 1;
    transform: scale(.8);
  }
  .list-leave-to {
    opacity: 0;
    transform: scale(0.5);
  }
  .list-leave-active {
    transition: all 0.4s ease;
    position: absolute;
  }
</style>
