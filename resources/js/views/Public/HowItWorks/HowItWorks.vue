<template>
  <v-container>
    <v-row>
      <v-col>
        <v-btn color="primary" class="" @click="loadPage('/page/how-it-works')">About Parently</v-btn>
      </v-col>
      <v-col>
        <v-btn color="primary" class="" @click="loadPage('/page/how-it-works/for-a-care-seeking-parent')">Parent in need
        </v-btn>
      </v-col>
      <v-col>
        <v-btn color="primary" class="" @click="loadPage('/page/how-it-works/as-a-day-care-parent')">Daycare-parent
        </v-btn>
      </v-col>
    </v-row>
    <text-section :section="section"/>
  </v-container>
</template>
<script>
import HeroSection from "../Home/Sections/HeroSection.vue";
import TextSection from "../Home/Sections/TextSection.vue";

export default {
  name: 'HowItWorks',
  components: {TextSection, HeroSection},
  data() {
    return {
      section: {}
    }
  },
  methods: {
    loadPage(page) {
      axios.get(page || '/page/how-it-works')
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
