<template>
  <div class="container py-4 flex-grow-1">
    <div class="row">
      <div class="col-3 col-md-3 col-lg-2">
        <portal-menu/>
      </div>
      <div class="col-9 col-md-9 col-lg-10">
        <router-view/>
      </div>
    </div>

  </div>
</template>
<script setup>
import PortalMenu from "../components/nav/PortalMenu.vue";
</script>
