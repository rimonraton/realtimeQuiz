require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.__ = str => _.get(window.i18n, str)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('game', require('./components/Game.vue').default);
// Vue.component('single-game', require('./components/SingleGame.vue'));

// import Practice from './components/games/Practice'
// import Challenge from './components/games/Challenge'
// import TeamQuiz from './components/games/TeamQuiz'
// import Moderator from './components/games/Moderator'
// import Team from './components/games/Team'
// import TeamModerator from './components/games/TeamModerator'
// import ExamQuestionTimeMode from './components/games/ExamQuestionTimeMode'
// import ExamTimeMode from './components/games/ExamTimeMode'
// import ExamResult from './components/games/ExamResult'
// import ExamResultWhenEmpty from './components/games/ExamResultWhenSubmitEmpty'
// import router from './router/Router.js';

import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
library.add(faUserSecret)
Vue.use(VueSweetalert2);

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el: '#app',
    components: {
        'Practice' : () => import('./components/games/Practice.vue'),
	    'Challenge': () => import('./components/games/Challenge.vue'),
        'SingleQuestion': () => import('./components/games/SingleQuestion.vue'),
        'UserName': () => import('./components/helper/singleDisplay/UserName.vue'),
        'Qrcode': () => import('./components/helper/singleDisplay/Qrcode.vue'),
	    'TeamQuiz': () => import('./components/games/TeamQuiz.vue'),
	    'Moderator': () => import('./components/games/Moderator.vue'),
	    'Team': () => import('./components/games/Team.vue'),
        'TeamModerator': () => import('./components/games/TeamModerator.vue'),
        'ExamQuestionTimeMode' : () => import('./components/games/ExamQuestionTimeMode.vue'),
        'ExamTimeMode' : () => import('./components/games/ExamTimeMode.vue'),
        'ExamResult' : () => import('./components/games/ExamResult.vue'),
        'ExamResultWhenEmpty' : () => import('./components/games/ExamResultWhenSubmitEmpty.vue'),
	}
    // router
});
