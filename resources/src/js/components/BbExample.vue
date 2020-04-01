<template>
  <div>
    <transition name="fade-slide">
      <h3 v-show="show">Vuex direct: {{ $store.state.example }}</h3>
    </transition>
    <h3>Vuex getter: {{ getUppcaseExample }}</h3>
    <button class="bg-gray-400 bg-grey-200 px-3 py-1" @click="SET_EXAMPLE('a mutation')">Change State</button>
    <button class="bg-gray-400 bg-grey-200 px-3 py-1" @click="setExample('an action')">Change State Again (with delay)</button>
    <button class="bg-gray-400 bg-grey-200 px-3 py-1" @click="someNonVuexMethodButCallsVuexAction">Change State Again (with delay and transition)</button>
  </div>
</template>

<script>
import { mapMutations, mapActions, mapGetters } from 'vuex'

export default {
  name: 'bb-example',
  data() {
    return {
      show: true
    }
  },
  methods: {
    async someNonVuexMethodButCallsVuexAction() {
      this.show = false
      this.setExample('an action with animation').then(() => (this.show = true))
    },
    ...mapActions(['setExample']),
    ...mapMutations(['SET_EXAMPLE'])
  },
  computed: {
    someNonVuexComputed() {
      return //
    },
    ...mapGetters(['getUppcaseExample'])
  }
}
</script>

<style scoped>
.fade-slide-enter-active,
.fade-slide-leave-active {
  transition: all 500ms;
}

.fade-slide-enter {
  opacity: 0;
  transform: translateX(-1rem);
}

.fade-slide-leave-to {
  opacity: 0;
  transform: translateX(-1rem);
}
</style>
