<template>
  <v-container>
    <text-section :section="section"/>
  </v-container>
</template>
<script>
import TextSection from "../Home/Sections/TextSection.vue";
export default {
  name: 'About',
  components: {TextSection},
  data() {
    return {
      section: {}
    }
  },
  methods: {
    loadPage(page) {
      axios.get(page || '/page/about')
          .then((response) => {
            this.section = response.data.data
          })
    }
  },
  mounted() {
    this.loadPage()
  }
}
</script>
