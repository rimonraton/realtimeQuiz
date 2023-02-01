<template>
    <div class="container">
        <div class="row justify-content-center" v-if="results.length == questiondata.length">

            <div class="m-1 ">
                <div class="btn border border-secondary">
                    {{ user.lang == 'gb' ? 'You answered all the questions' : 'আপনি সকল প্রশ্নগুলোর উত্তর করেছেন' }}
                </div>
            </div>
        </div>
        <div class="row justify-content-center" v-else>
            <div v-for="(question, index) in questiondata" :key="index">
                <!--                <button v-if="questionAttemptOrNot(question.id)" type="button" class="btn border border-secondary" @click="$emit('scrollToElement', question.id)" :class="questionAttemptOrNot(question.id) ? 'btn-primary' : ''">Q {{index + 1}}</button>-->
                <button v-if="!questionAttemptOrNot(question.id)" type="button" class="btn border border-secondary text-white bg-danger m-1" @click="$emit('scrollToElement', question.id)" :class="questionAttemptOrNot(question.id) ? 'btn-primary' : ''">Q {{index + 1}}</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['questiondata', 'results', 'user'],
    methods: {
        questionAttemptOrNot(id){
          return this.results.some(rid => rid.id == id)
        }
    }
}
</script>

<style scoped>

</style>
