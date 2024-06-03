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
    <text-section :section="content" />
    {{ selectedTab || "n/a" }}
  </page-section>
</template>
<script>
import { marked } from "marked";
import PageSection from "@/components/layout/sections/PageSection.vue";
import { mapActions, mapState } from "pinia";
import { useContentStore } from "@/stores/content/index.js";
import TextSection from "@/views/Public/Home/Sections/TextSection.vue";
export default {
  name: "TabbedSection",
  props: {
    section: Object,
    parent: String,
  },
  components: { TextSection, PageSection },
  data() {
    return {
      selectedTab: undefined,
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
  watch: {
    selectedTab(val) {
      console.log("tab selected " + val);
      this.loadPage(val, this.parent);
    },
  },
};
</script>
