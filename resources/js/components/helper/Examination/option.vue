<template>
        <div class="animate__animated animate__zoomIn animate__faster d-flex flex-wrap"
             :class="{'row justify-content-center justify-item-center': imageOption(options)}"
        >

    <div v-for="(option, index) in options" class="col-md-6 px-1"
         :class="[option.flag == 'img' ? 'col-6' : ' col-12' ]"
    >
        <div class="list-group" v-if="option.flag != 'img'"
        >
    <span @click="clickSelect(index, option)"
          class="list-group-item list-group-item-action cursor my-1"
          :class="[`element-animation${index + 1}`, {selected:qoption.selected == index}]"
          v-html="tbe(option.bd_option, option.option, user.lang)" >

    </span>
        </div>
        <div
            v-else
            @click="clickSelect(index, option)"
            class="cursor my-1"
        >
            <img  class="imageOption mt-1 rounded img-thumbnail" :src="'/'+ option.img_link" alt="">
            <div v-if="qoption.selected == index" class="Tick d-flex justify-content-center align-items-center">
<!--                <i class="fa fa-check text-success" aria-hidden="true"></i>-->
                <img :src="'/img/icons/tick.png'" width="100px" height="100px">
            </div>
        </div>

    </div>
    </div>
</template>

<script>
export default {
    props: ['options', 'user', 'question'],
    data(){
        return {
            qoption:{
                selected: null,
                id: null,
                option: null,
                correct: null,
                question: this.question,
                correctOption: null,
                img_link: null,
                correct_img_link: null
            },
        }
    },
    methods:{
        clickSelect(index, option){
            if(this.qoption.selected == index){
                this.qoption.selected = null
                this.qoption.id = option.question_id
                this.qoption.option= null
                this.qoption.img_link= null
                this.qoption.correct= null
                this.qoption.correctOption= null
            } else{
                this.qoption.selected = index
                this.qoption.id = option.question_id
                this.qoption.option = this.tbe(option.bd_option,option.option,this.user.lang)
                this.qoption.img_link = option.img_link
                this.qoption.correct_img_link = option.flag == 'img' ?  (option.correct == 0 ? this.options.find(o => o.correct == 1).img_link : null) : null
                this.qoption.correct = option.correct
                this.qoption.correctOption = option.correct == 0  ? this.tbe(this.options.find(o => o.correct == 1).bd_option , this.options.find(o => o.correct == 1).option, this.user.lang) : null
            }
            this.$emit('answer', this.qoption)
            // console.log(this.isPredict())
        },
        tbe(b, e, l) {
            if(b !== null && e !== null){
                if(l === 'bd') {
                    return b;
                }
                return e;
            }
            else if(b !== null && e === null) {
                return b;
            }
            else if(b === null && e !== null) {
                return e;
            }
            return b;
        },
        imageOption(objArray){
            const data = objArray.some(a => a.flag == 'img')
            // const data = objArray.find(a => a.flag == 'img');
            return data
        },
    }
}
</script>

<style scoped>
.Tick{
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    background-color: gray;
    opacity: .7;
}
</style>
