<template>
  <nav-bar />
  <v-main class="d-flex flex-column flex-grow-1">
    <div class="flex-grow-1">
      <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
          <component :is="Component" :key="route.name" />
        </transition>
      </router-view>
    </div>
  </v-main>
  <public-footer />
  <default-snackbar />
</template>
<script>
import NavBar from "../components/nav/NavBar.vue";
import PublicFooter from "../components/nav/PublicFooter.vue";
import DefaultSnackbar from "../components/ui/DefaultSnackbar.vue";

export default {
  name: "Portal",
  components: { DefaultSnackbar, PublicFooter, NavBar },
  computed: {
    route() {
      return this.$route;
    },
  },
};
</script>
