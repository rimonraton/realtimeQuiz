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

import Practice from './components/games/Practice'
import Challenge from './components/games/Challenge'
import TeamQuiz from './components/games/TeamQuiz'
import Moderator from './components/games/Moderator'
import Team from './components/games/Team'
import TeamModerator from './components/games/TeamModerator'
// import router from './router/Router.js';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faUserSecret)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el: '#app',
    components: {
	    'Practice': Practice,
	    'Challenge': Challenge,
	    'TeamQuiz': TeamQuiz,
	    'Moderator': Moderator,
	    'Team': Team,
        'TeamModerator':TeamModerator,
	}
    // router
});
