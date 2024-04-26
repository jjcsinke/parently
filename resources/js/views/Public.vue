<template>
  <nav-bar/>
  <v-main class="d-flex flex-column">
    <div class="flex-grow-1">
      <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
          <component :is="Component"/>
        </transition>
      </router-view>
    </div>
  </v-main>
  <public-footer/>
</template>
<script>
import {mapActions, mapState} from "pinia";
import {useAuthStore} from "../stores/auth/index.js";
import NavBar from "../components/nav/NavBar.vue";
import PublicFooter from "../components/nav/PublicFooter.vue";
export default {
  name: 'Portal',
  components: {PublicFooter, NavBar},
  computed: {
    ...mapState(useAuthStore, ['user']),
  },
  methods: {
    ...mapActions(useAuthStore, ['logout'])
  }
}
</script>
