<template>
  <nav-bar/>

  <portal-menu v-if="$route.path.includes('portal')"/>

  <v-main>
    <v-container fluid>
      <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
          <component :is="Component"/>
        </transition>
      </router-view>
    </v-container>
  </v-main>

</template>
<script>
import PortalMenu from "@/components/nav/PortalMenu.vue";
import NavBar from "@/components/nav/NavBar.vue";
import {mapActions, mapState} from "pinia";
import {useAuthStore} from "@/stores/auth/index.js";

export default {
  components: {PortalMenu, NavBar},
  computed: {
    ...mapState(useAuthStore, ['user'])
  },
  methods: {
    ...mapActions(useAuthStore, ['loadUser'])
  },
  async mounted() {
    console.log(this.user)
    await this.loadUser()

    if (!this.user.email_verified_at) {
      this.$router.push({name: 'verify-email'})
    }
  }
}
</script>
