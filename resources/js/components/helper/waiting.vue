<template>
	<div class="waiting">
	    <div class="card" style="width: 24rem; ">
	        <div class="card-header">Player Joined. 
	            <code v-if="user.id != uid" class="ml-2">Please Wait until Game Start..</code>
	        </div>
	        <div class="card-body" style="max-height:90vh; overflow:auto">
	            <ul class="list-group ">
	                <li class="list-group-item"
	                    v-for="u in users" :key="u.id"
	                    :class="{active : u.id == user.id}"
	                    >
	                    <img :src="u.avatar" :alt="getAvatarAlt(u.name)" class="circle mr-2">
	                    <span class="ml-5">{{ u.name }}</span>
	                    <span class="flag" >
	                    	<img :src="getFlag(u.country)">
	                    </span>
	                    <button
	                    	v-if="( u.id != user.id) && (user.id == uid)"
	                    	@click="kickingUser(u.id)" 
	                    	class="close">
	                        <span title="Kick User">&times;</span>
	                    </button>
	                </li>
	            </ul>
	            <!-- <a @click="$emit('gameReset')" v-if="user.id == uid" class="btn btn-sm btn-outline-danger mt-4">RESET</a> -->
	            <a @click="$emit('gameStart')" v-if="user.id == uid" class="btn btn-sm btn-outline-success mt-4 pull-right">START</a>
	        </div>
	       <!--  <div class="card-footer">
	            <div v-if="user.id == uid" class="sharethis-inline-share-buttons"></div>
	        </div> -->
	    </div>

	</div>
	
</template>

<script>
export default{
	props:['user', 'uid', 'users'],

    methods:{
    	kickingUser(id){
    		this.$emit("kickingUser", id);
        },

        getAvatarAlt(name){
            return name.substring(0, 2);
        },

        getFlag(country){
        	return 'https://www.countryflags.io/'+country+'/flat/48.png';
        },
    }

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
		top: 0px;
    }
    .close{
    	position: absolute; 
    	top: -5px;	
    	right: 0px;	
    	color: red;
    }
</style>