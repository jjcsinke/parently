<template>
  <template v-for="pageSection in page.sections">
    <template v-if="pageSection.type === 'TabbedSection'">
      <tabbed-section :section="pageSection" :parent="parentPage" />
    </template>
    <template v-if="pageSection.type === 'HeroSection'">
      <hero-section :section="pageSection" />
    </template>
  </template>

  <pre>{{ page }}</pre>
</template>
<script>
import HeroSection from "@/components/layout/sections/HeroSection.vue";
import TextSection from "@/views/Public/Home/Sections/TextSection.vue";
import { mapActions, mapState } from "pinia";
import { useContentStore } from "@/stores/content/index.js";
import TabbedSection from "@/components/layout/sections/TabbedSection.vue";

export default {
  name: "HowItWorks",
  components: { TabbedSection, TextSection, HeroSection },
  data() {
    return {
      parentPage: "how-it-works",
    };
  },
  computed: {
    ...mapState(useContentStore, ["page", "pages"]),
  },
  methods: {
    ...mapActions(useContentStore, ["loadPage"]),
  },
  mounted() {
    this.loadPage(this.parentPage);
  },
};
</script>
