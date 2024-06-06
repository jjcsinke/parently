<template>
  <v-container v-if="auth">
    <pre><slot></slot></pre>
  </v-container>
</template>
<script>
import PageSection from "@/components/layout/sections/PageSection.vue";

export default {
  name: "DebugSection",
  components: { PageSection },
};
</script>
<style scoped>
pre {
  border: solid 1px red;
  padding: 1rem;
  margin: 2rem 0;
}
</style>
