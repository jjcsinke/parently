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

export default {
  components: {ParentDashboard, AdminDashboard},
  data() {
    return {
      user: window.user ?? false
    }
  }
}
</script>
