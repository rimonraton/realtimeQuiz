<template>
    <div class="random" :style="{ background: randomBackground() }">
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="bg-transparent p-5 rounded border">
                <h1 class="text-white">Random Color Screen with Message</h1>
                <transition-group name="slide-up" class="list-group" tag="ul" appear>
                  <li class="list-group-item user-list"
                      v-for="(res, index) in results" :key="res.id"
                      :class="{active : res.id == user.id}"
                  >
                    <span v-html="getMedel(index)"></span>
                    {{ res.name }} <span class="badge badge-dark float-right mt-1">{{ res.score }}</span>
                  </li>
                </transition-group>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</template>

<script>
import {quizHelpers} from "../../mixins/quizHelpers";

export default{
  mixins: [quizHelpers],
  props: ['results', 'user', ],

  data() {
    return {
      background: [
        ['#cb2d3e', '-webkit-linear-gradient(to right, #ef473a, #cb2d3e)', 'linear-gradient(to right, #ef473a, #cb2d3e)'],
        ['#000428', '-webkit-linear-gradient(to right, #004e92, #000428)', 'linear-gradient(to right, #004e92, #000428)'],
        ['#2980b9', '-webkit-linear-gradient(to right, #2c3e50, #2980b9)', 'linear-gradient(to right, #2c3e50, #2980b9)'],
        ['#4DA0B0', '-webkit-linear-gradient(to right, #D39D38, #4DA0B0)', 'linear-gradient(to right, #D39D38, #4DA0B0)'],
        ['#1e3c72', '-webkit-linear-gradient(to right, #2a5298, #1e3c72)', 'linear-gradient(to right, #2a5298, #1e3c72)'],
        ['#c2e59c', '-webkit-linear-gradient(to right, #64b3f4, #c2e59c)', 'linear-gradient(to right, #64b3f4, #c2e59c)'],
        ['#8E0E00', '-webkit-linear-gradient(to right, #1F1C18, #8E0E00)', 'linear-gradient(to right, #1F1C18, #8E0E00)'],
        ['#76b852', '-webkit-linear-gradient(to right, #8DC26F, #76b852)', 'linear-gradient(to right, #8DC26F, #76b852)'],
        ['#005C97', '-webkit-linear-gradient(to right, #363795, #005C97)', 'linear-gradient(to right, #363795, #005C97)'],
        ['#6441A5', '-webkit-linear-gradient(to right, #2a0845, #6441A5)', 'linear-gradient(to right, #2a0845, #6441A5)' ],
        ['#780206', '-webkit-linear-gradient(to right, #061161, #780206)', 'linear-gradient(to right, #061161, #780206)' ],
        ['#FEAC5E', '-webkit-linear-gradient(to right, #4BC0C8, #C779D0, #FEAC5E)', 'linear-gradient(to right, #4BC0C8, #C779D0, #FEAC5E)'],

      ],
    };
  },

methods: {
    randomBackground() {
      console.log(this.background.length)
      let color = Math.floor(Math.random() * this.background.length);
      return this.background[color];
    }
  }

};

</script>
<style>
.random {
  position: fixed;
  width: 100vw;
  height: 100vh;
  left: 0;
  top: 0;
  z-index: 99999;
}


</style>
