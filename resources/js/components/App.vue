<template>
  <v-app>
<!--    <v-layout>-->

      <nav-bar/>

      <portal-menu v-if="$route.path.includes('portal')"/>

      <v-main>
        <router-view v-slot="{ Component }">
          <transition name="fade" mode="out-in">
            <component :is="Component"/>
          </transition>
        </router-view>
      </v-main>

      <parently-footer/>
<!--    </v-layout>-->
  </v-app>
</template>

<script>
import NavBar from "./nav/NavBar.vue";
import ParentlyFooter from "./layout/ParentlyFooter.vue";
import PortalMenu from "./nav/PortalMenu.vue";

export default {
  components: {PortalMenu, NavBar, ParentlyFooter}
}
</script>
<style>
.fade-enter-active {
  transition: opacity 0.2s;
}

.fade-leave-active {
  transition: opacity 0.2s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
