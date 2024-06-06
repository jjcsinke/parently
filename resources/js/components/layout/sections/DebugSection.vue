<template>
  <v-container v-if="user && user.type === 'admin'">
    <pre><slot></slot></pre>
  </v-container>
</template>
<script>
import PageSection from "@/components/layout/sections/PageSection.vue";
import { useAuthStore } from "@/stores/auth/index.js";
import { mapState } from "pinia";

export default {
  name: "DebugSection",
  components: { PageSection },
  computed: {
    ...mapState(useAuthStore, ["user"]),
  },
};
</script>
<style scoped>
pre {
  border: solid 1px red;
  padding: 1rem;
  margin: 2rem 0;
}
</style>
