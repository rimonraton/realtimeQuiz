<template>
    <div class="progress">
        <div class="progress-bar progress-bar-striped"
             :style="progressWidth"
             :class="progressClass"
        >
            {{ progress }}
        </div>
    </div>
</template>

<script>
import {quizHelpers} from "../mixins/quizHelpers";

export default {
    props: ['progress'],
    mixins: [quizHelpers]
};

</script>

