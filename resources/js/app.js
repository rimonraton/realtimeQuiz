require('./bootstrap');

window.Vue = require('vue');


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
import Moderator from './components/games/Moderator'
import Group from './components/games/Group'
// import router from './router/Router.js';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
	    'Practice': Practice,
	    'Challenge': Challenge,
	    'Moderator': Moderator,
	    'Group': Group,
	}
    // router
});
