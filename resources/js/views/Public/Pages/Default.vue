<template>
  <sections-page>
    <template v-for="pageSection in page.sections">
      <template v-if="pageSection.type === 'tabbed-section'">
        <tabbed-section :section="pageSection" :parent="slug" />
      </template>
      <template v-else-if="pageSection && pageSection.type !== undefined">
        <component :is="pageSection.type" :section="pageSection" />
      </template>
    </template>
    <debug-section>
      {{ slug }}
    </debug-section>
  </sections-page>
</template>
<script>
import TitleSection from "@/components/layout/sections/TitleSection.vue";
import HeroSection from "@/components/layout/sections/HeroSection.vue";
import TextSection from "@/components/layout/sections/TextSection.vue";
import TabbedSection from "@/components/layout/sections/TabbedSection.vue";
import { mapActions, mapState } from "pinia";
import { useContentStore } from "@/stores/content/index.js";
import SinglePage from "@/components/layout/home/SingleHomePage.vue";
import SectionsPage from "@/components/layout/home/SectionsPage.vue";
import DebugSection from "@/components/layout/sections/DebugSection.vue";

export default {
  components: {
    DebugSection,
    SectionsPage,
    SinglePage,
    TabbedSection,
    TextSection,
    TitleSection,
    HeroSection,
  },
  data() {
    return {
      slug: this.$route.fullPath.replace("/", ""),
    };
  },
  computed: {
    ...mapState(useContentStore, ["page", "pages"]),
  },
  methods: {
    ...mapActions(useContentStore, ["loadPage"]),
  },
  mounted() {
    this.loadPage(this.slug);
  },
};
</script>
