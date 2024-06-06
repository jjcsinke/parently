<template>
  <page-section>
    <v-tabs
      v-model="selectedTab"
      background-color="transparent"
      color="primary"
    >
      <v-tab v-for="(tab, index) in tabs" :key="index" :value="tab.page">
        {{ tab.title }}
      </v-tab>
    </v-tabs>
    <text-section v-if="content" :section="content" />
  </page-section>
</template>
<script>
import { marked } from "marked";
import PageSection from "@/components/layout/sections/PageSection.vue";
import { mapActions, mapState } from "pinia";
import { useContentStore } from "@/stores/content/index.js";
import TextSection from "@/components/layout/sections/TextSection.vue";
import DebugSection from "@/components/layout/sections/DebugSection.vue";
export default {
  name: "TabbedSection",
  props: {
    section: Object,
    parent: String,
  },
  components: { DebugSection, TextSection, PageSection },
  data() {
    return {
      selectedTab:
        this.$route.hash.replace("#", "") || this.section.tabs[0].page,
    };
  },
  computed: {
    ...mapState(useContentStore, ["loading", "page", "pages"]),
    tabs() {
      return this.section.tabs || [];
    },
    content() {
      return this.page && this.page.content
        ? this.page?.content[this.selectedTab]
        : ["hi"];
    },
  },
  methods: {
    marked,
    ...mapActions(useContentStore, ["loadPage", "clearPage"]),
  },
  mounted() {
    console.log(this.selectedTab, this.parent);
    this.loadPage(this.selectedTab, this.parent);
  },
  watch: {
    selectedTab(val) {
      console.log("tab selected " + val);
      this.loadPage(val, this.parent);
    },
  },
};
</script>
