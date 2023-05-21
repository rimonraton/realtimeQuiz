<template>
    <div>
        <div class="card chat" v-show="show">
            <div class="card-header msg_head">
                <div class="btn-group" role="group" style="position: absolute; right: 5px; top: 5px">
                    <button v-if="uid === user.id" type="button" class="btn btn-xs btn-dark px-1 py-0" @click="deleteMessage">
                        <i class="fa fa-trash-alt" ></i>
                    </button>
                    <button type="button" class="btn btn-xs btn-dark px-1 py-0" @click="show = !show; chat_count = 0">
                        <i class="fa fa-minus fa-lg" ></i>
                    </button>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="user_info">
                        <span>
                            {{ challenge.name }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body msg_card_body" >
                <div v-for="message in messages" :key="message.id" id="chatMessage">
                    <div class="d-flex justify-content-start mb-4" v-if="message.user.id !== user.id">
                        <div class="img_cont_msg">
                            <img
                                :src="getAvatar(message.user.avatar)"
                                :alt="getAvatarAlt(message.user.name)"
                                class="rounded-circle user_img_msg"
                                v-if="hasAvatar(message.user.avatar)"
                            >

                            <div v-else class="rounded-circle user_img_msg">
                                {{ getAvatarAlt(message.user.name) }}
                            </div>
                        </div>
                        <div class="msg_cotainer">
                            {{ message.message }}
                            <span class="msg_time">{{ message.time }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4" v-else>
                        <div class="msg_cotainer_send">
                            {{ message.message }}
                            <span class="msg_time_send">{{ message.time ? message.time : '' }}</span>
                        </div>
                        <div class="img_cont_msg">
                            <img
                                :src="getAvatar(message.user.avatar)"
                                :alt="getAvatarAlt(message.user.name)"
                                class="rounded-circle user_img_msg"
                                v-if="hasAvatar(message.user.avatar)"
                            >

                            <div v-else class="rounded-circle user_img_msg">
                                {{ getAvatarAlt(message.user.name) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="input-group">
                    <textarea
                        ref="type_msg"
                        id="type_msg"
                        v-model="message"
                        @keyup.enter="sendMessage"
                        class="form-control type_msg attach_btn"
                        placeholder="Type your message...">
                    </textarea>
                    <div class="input-group-append">
                        <span class="input-group-text send_btn" @click="sendMessage">
                            <i class="fas fa-location-arrow"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-min" v-show="!show">
            <div v-if="chat_count > 0"
                 class="chat-count rounded-circle d-flex justify-content-center align-items-center"
                 @click="showChat"
            >
                {{chat_count}}
            </div>
            <i class="far fa-comments fa-5x" @click="showChat"></i>
        </div>
    </div>
</template>

<script>

export default{
    props:['user', 'uid', 'channel', 'challenge'],
    data() {
        return {
            message: null,
            messages: [],
            show: false,
            chat_count: 0
        };
    },
    created(){
        console.log('challenge created')
        Echo.channel(this.channel)
            .listen('SendMessageEvent', (data) => {
                this.messages.push(data)
                console.log('SendMessageEvent.............', data)
                this.scrollToElement()
                this.chat_count++
            })
            .listen('DeleteMessageEvent', (data) => {
                this.messages = {}
                console.log('DeleteMessageEvent.............', data)
            });
    },
    mounted() {
        this.getMessage()
        this.scrollToElement()
    },
    methods:{
        showChat() {
            this.show = !this.show
            this.chat_count = 0
            let input = this.$refs.type_msg
            console.log('input message', input)
            input.focus()
        },
        scrollToElement() {
            let el = document.getElementsByClassName('msg_card_body')
            if (el) {
                setTimeout(() => {
                    el[0].scrollTop = el[0].scrollHeight
                }, 100)
            }
        },
        getMessage() {
            axios.post(`/api/getMessage`, {channel: this.channel})
                .then(res => {
                    console.log('Get Chat message',res.data)
                    this.messages = res.data
                })
        },

        getAvatar(link){
            if(link) return link;
            return '/img/avatar.png';
        },
        hasAvatar(link) {
            if(link) return true;
            return false
        },
        getAvatarAlt(name){
            return name.substring(0, 2);
        },
        sendMessage() {
            this.message = this.message.trim()
            const data = {channel: this.channel, user: this.user, message: this.message, time: this.currentTime()}
            this.messages.push({...data})
            if(this.message !== '' && this.message !== null) {
                this.message = ''
                axios.post(`/api/sendMessage`, data)
                    .then(res => {
                        this.scrollToElement()
                    })
            }
        },
        deleteMessage() {
            axios.post(`/api/deleteMessage/${this.channel}`)
                .then(res => {
                    this.messages = []
                })
        },

        currentTime() {
            const d = new Date();
            const weekday = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
            return weekday[d.getDay()] + ' ' + d.toLocaleString([], {
                hour: '2-digit',
                minute: '2-digit'
            })
        }
    },

};

</script>
<style scoped>
.chat-count {
    background: red;
    width: 30px;
    height: 30px;
    position: absolute;
    color: white;
    top: -16px;
    right: 0px;
}
.chat-min{
    position: fixed;
    bottom: 20px;
    right: 20px;
    cursor: pointer;
    z-index: 99999;
}
.chat{
    width: 24rem;
    position: fixed;
    right: 20px;
    bottom: 20px;
    z-index: 99999
}
.card{
    height: 500px;
    border-radius: 15px !important;
    background-color: rgba(0,0,0,0.8) !important;
}

.msg_card_body{
    padding: 8px;
    overflow-y: auto;
}
.card-header{
    border-radius: 15px 15px 0 0 !important;
    border-bottom: 0 !important;
}
.card-footer{
    border-radius: 0 0 15px 15px !important;
    border-top: 0 !important;
}
.type_msg{
    background-color: rgba(0,0,0,0.3) !important;
    border:0 !important;
    color:white !important;
    height: 60px !important;
    overflow-y: auto;
}
.type_msg:focus{
    box-shadow:none !important;
    outline:0px !important;
}
.attach_btn{
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0,0,0,0.3) !important;
    border:0 !important;
    color: white !important;
    cursor: pointer;
}
.send_btn{
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0,0,0,0.3) !important;
    border:0 !important;
    color: white !important;
    cursor: pointer;
}

.contacts li{
    width: 100% !important;
    padding: 5px 10px;
    margin-bottom: 15px !important;
}

.user_img_msg{
    height: 40px;
    width: 40px;
    background: gray;
    color: white;
    font-size: 1.2rem;
    padding: 5px;
}

.img_cont_msg{
    height: 40px;
    width: 40px;
}

.user_info{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
}
.user_info span{
    font-size: 20px;
    color: white;
}
.user_info p{
    font-size: 10px;
    color: rgba(255,255,255,0.6);
}

.msg_cotainer{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
    position: relative;
    min-width: 100px;
}
.msg_cotainer_send{
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
    position: relative;
    min-width: 100px;
}
.msg_time{
    position: absolute;
    left: 0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
}
.msg_time_send{
    position: absolute;
    right:0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
}
.msg_head{
    position: relative;
}

@media(max-width: 576px){
    .contacts_card{
        margin-bottom: 15px !important;
    }
    .fa-5x {
        font-size: 3em;
    }
}
</style>
