<template>
  <text-section :section="section" />
</template>
<script>
import TextSection from "../../../components/layout/sections/TextSection.vue";
import SinglePage from "@/components/layout/home/SingleHomePage.vue";
export default {
  name: "About",
  components: { SinglePage, TextSection },
  data() {
    return {
      section: {},
    };
  },
  methods: {
    loadPage(page) {
      axios.get(page || "/page/about").then((response) => {
        this.section = response.data.data;
      });
    },
  },
  mounted() {
    this.loadPage();
  },
};
</script>
