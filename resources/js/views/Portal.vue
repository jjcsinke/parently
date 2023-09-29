<template>
  <div class="container py-4 flex-grow-1">
    <div class="row">
      <div class="col-2">
        <portal-menu/>
      </div>
      <div class="col-10">
        <router-view/>
      </div>
    </div>

  </div>
</template>
<script setup>
import PortalMenu from "../components/nav/PortalMenu.vue";
</script>
