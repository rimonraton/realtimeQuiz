<template>
    <div>
        <div class="progress-circle"
             :style="{background: getBackground }"
        >
            <div class="number" >
                {{ information }}
            </div>

        </div>
<!--        <button @click="increase">++</button>-->
    </div>
</template>

<script>
export default{
	props:['progress', 'color', 'info'],
    data() {
        return {
            progres: this.progress,
            information: this.info
        };
    },
    methods: {
        increase() {
            this.progres ++
            this.information ++
        }
    },
    computed: {
        getBackground() {
            return `conic-gradient(${this.color} ${this.progres}%, transparent ${this.progres}%)`;
        },
    }
};

</script>
<style>
    .progress-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        font-size: 2rem;
        //background: conic-gradient(red 25%, transparent 25%);
        display: flex;
        transition: ease-in;
    }

    .progress-circle .number {
        background: #e3e3e3;
        width: 90%;
        height: 90%;
        border-radius: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        color: black;
        transition: ease-in;
    }

</style>
