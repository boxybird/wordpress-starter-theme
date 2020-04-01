import Vue from 'vue'
import store from './store'
import BbExample from './components/BbExample'

Vue.component('bb-example', BbExample)

const app = new Vue({
  el: '#app',
  store
})
