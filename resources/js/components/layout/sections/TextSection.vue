<template>
  <page-section>
    <template v-for="part in section.content">
      <p v-html="marked(part)"></p>
    </template>
  </page-section>
</template>
<script>
import { marked } from "marked";
import PageSection from "@/components/layout/sections/PageSection.vue";

export default {
  name: "TextSection",
  methods: { marked },
  props: {
    section: Object,
  },
  components: { PageSection },
};
</script>
<style scoped>
p {
  max-width: 800px;
  margin: 2rem 0;
}
</style>
