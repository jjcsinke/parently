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
<script setup>
import PortalMenu from "../components/nav/PortalMenu.vue";
import NavBar from "../components/nav/NavBar.vue";
import ParentlyFooter from "../components/layout/ParentlyFooter.vue";
</script>
