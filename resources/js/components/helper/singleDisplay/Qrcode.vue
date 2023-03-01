<template>
	<div class="waiting">
	    <div class="card">
	        <div class="card-header text-center">
	            <h4 class="ml-1 text-primary">
                    Scan this QR-Code
                </h4>
	        </div>
	        <div class="card-body px-3 text-center" >
                <img :src="getQr" alt="QR Code" class="img-thumbnail">
	        </div>
	    </div>

	</div>

</template>

<script>
export default{
    computed: {
        getQr(){
            return 'https://api.qrserver.com/v1/create-qr-code/?size=430x430&data='+window.location;
        },
    },
    data() {
        return {
            name:'',
        };
    },
    methods:{

    },

};

</script>
<style>

</style>
