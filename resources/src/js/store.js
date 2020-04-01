import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    example: 'Example state from Vuex'
  },
  getters: {
    getUppcaseExample(state) {
      return state.example.toUpperCase()
    }
  },
  mutations: {
    SET_EXAMPLE(state, payload) {
      state.example = `You changed my state via ${payload}`
    }
  },
  actions: {
    setExample(context, payload) {
      return new Promise(function(resolve, reject) {
        setTimeout(() => {
          context.commit('SET_EXAMPLE', payload)
          resolve()
        }, 1000)
      })
    }
  }
})
