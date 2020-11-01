import Vue from 'vue'
import VueRouter from 'vue-router'
import game from '../components/Game.vue'
import home from '../components/home.vue'

Vue.use(VueRouter)


const routes = [
	{path:'/game', component: game }, 
	{path:'/home', component: home}
]

const router = new VueRouter({
	routes // short for `routes: routes`
})

export default router