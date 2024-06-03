<template>
  <single-page :title="title">
    <text-section :section="section"/>
  </single-page>
</template>
<script>
import SinglePage from "@/components/layout/home/SingleHomePage.vue";
import TextSection from "@/views/Public/Home/Sections/TextSection.vue";
export default {
  name: 'ApiContentPage',
  components: {TextSection, SinglePage},
  data() {
    return {
      section: {}
    }
  },
  computed: {
    title() {
      return this.$t(`page.${this.$route.name}`)
    }
  },
  methods: {
    loadPageContent() {
      axios.get(`/page/${this.$route.name}`)
          .then((response) => {
            this.section = response.data.data
          })
    }
  },
  mounted() {
    this.loadPageContent()
  }
}
</script>
