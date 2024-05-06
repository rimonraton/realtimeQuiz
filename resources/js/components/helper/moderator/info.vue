<template>
  <div class="row">
    <div class="col-md">
      <div class="d-flex justify-content-center align-items-center">
        <div class="progress-circle" :style="{background: getBackground }">
          <div class="number">
                <span v-if="answered > 0">
                    {{ users + '/' + answered }}
                </span>
          </div>
        </div>
      </div>
      <div v-if="users == answered">
        <ul class="list-group">
          <li
            class="d-flex justify-content-between align-items-center list-group-item"
            :class="getClass(index)"
            v-for="(result, index) in results">
            <img
              v-if="result.flag === 'img'"
              class="image rounded img-thumbnail"
              :src="'/' + result.option" style="width:100px" alt="">
            <span v-else>{{ result.option }}</span>
            <span class="badge badge-pill" :class="[result.option === correct ? 'badge-success' : 'badge-primary']">
              <i v-if="result.option === correct"  class="fas fa-check"></i>
              {{ result.score }}
<!--              {{ Math.floor((result.score / users) * 100) +'%' }}-->
            </span>

          </li>
        </ul>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  props: ['progress', 'color', 'users', 'answered', 'results', 'correct'],
  data() {
    return {}
  },
  methods: {
    getClass(index) {
      let bgClas = 'list-group-item-success'
      switch (index) {
        case 0:
          bgClas = 'list-group-item-primary'
          break;
        case 1:
          bgClas = 'list-group-item-success'
          break;
        case 2:
          bgClas = 'list-group-item-warning'
          break;
        default:
          bgClas = 'list-group-item-info'
      }
      return bgClas
    }
  },

  computed: {
    getBackground() {
      return `conic-gradient(${this.color} ${100 - this.progress}%, transparent ${100 - this.progress}%)`;
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
//background: conic-gradient(red 25%, transparent 25%); display: flex;
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
