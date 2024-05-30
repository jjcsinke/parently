<template>
  <template v-if="user.type === 'parent'">
    <parent-dashboard></parent-dashboard>
  </template>
  <template v-else-if="user.type === 'admin'">
    <admin-dashboard></admin-dashboard>
  </template>
</template>
<script>
import AdminDashboard from "./AdminDashboard.vue";
import ParentDashboard from "./ParentDashboard.vue";
import {mapState} from "pinia";
import {useAuthStore} from "@/stores/auth/index.js";

export default {
  components: {ParentDashboard, AdminDashboard},
  computed:{
    ...mapState(useAuthStore, ['user'])
  }
}
</script>
