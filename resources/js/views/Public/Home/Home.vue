<template>
  <div>
    <hero-section/>
    <template v-for="(section, index) in sections">
      <info-section :section="section" :index="index"/>
    </template>
  </div>
</template>
<script>

import {mapActions, mapState} from "pinia";
import {useAuthStore} from "@/stores/auth/index.js";
import HeroSection from "./Sections/HeroSection.vue";
import InfoSection from "./Sections/InfoSection.vue";

export default {
  name: 'Home',
  components: {InfoSection, HeroSection},
  data() {
    return {
      sections: [
        {
          image: '/images/parent_circle_sketch.jpg',
          title: 'Welcome to Parently',
          description: 'Parently is a platform that helps parents to manage daycare for their children.\n Help each other and share daycare together.'
        },
        {
          image: '/images/daycare_full_sketch.jpg',
          title: 'Why Parently',
          description: 'Daycare is full, teachers get sick. Need help?\n Parently is here to help you find other parents to share daycare together.',
          to: {name: 'how-it-works'}
        },
        {
          image: '/images/teacher_sick_sketch.jpg',
          title: 'Share unexpected daycare needs',
          description: 'You never know when you need help. Parently is here to help you find other parents to share daycare together.',
          button: {
            text: 'buttons.need-care',
            to: {name: 'how-it-works'}
          }
        },
        {
          image: '/images/parent_circle_sketch.jpg',
          title: 'How it works',
          description: 'Sign up and tell us about you and your child(ren).\nWhat days do you need help? What days can you provide help? Find other parents at your school to share daycare together.',
          button: {
            text: 'buttons.provide-care',
            to: {name: 'how-it-works'}
          }
        },
      ]
    }
  },
  computed: {
    ...mapState(useAuthStore, ['user']),
  },
  methods: {
    ...mapActions(useAuthStore, ['logout'])
  }
}
</script>
