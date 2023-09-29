<template>
  <nav-bar/>

  <router-view></router-view>

  <parently-footer/>
</template>

<script>
import NavBar from "./nav/NavBar.vue";
import ParentlyFooter from "./layout/ParentlyFooter.vue";

export default {
  components: {NavBar, ParentlyFooter}
}
</script>
