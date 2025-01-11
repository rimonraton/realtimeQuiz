<template>
   <div class="pt-3">
     <a :href="url"
        class="btn btn-lg bg-danger text-white">
       Exit
     </a>
   </div>

</template>

<script>

import {ref} from "vue";

export default{
  props:['backLink'],
  computed: {
    url() {
      return `${this.backLink}`;
    }
  }
};

</script>
