<template>
  <v-app>
<!--    <v-layout>-->

    <router-view></router-view>
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
