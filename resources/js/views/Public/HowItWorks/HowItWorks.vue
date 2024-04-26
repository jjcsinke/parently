<template>
  <div>
    <hero-section/>
    <text-section :section="section"/>
  </div>
</template>
<script>
import HeroSection from "../Home/Sections/HeroSection.vue";
import TextSection from "../Home/Sections/TextSection.vue";
export default {
  name: 'HowItWorks',
  components: {TextSection, HeroSection},
  data() {
    return {
      section: {
        content: [
          '# How It Works\n\nSign up and tell us about you and your child(ren).\nWhat days do you need help? What days can you provide help? Find other parents at your school to share daycare together.',
          '# How It Works\n\nSign up and tell us about you and your child(ren).\nWhat days do you need help? What days can you provide help? Find other parents at your school to share daycare together.',
          '# How It Works\n\nSign up and tell us about you and your child(ren).\nWhat days do you need help? What days can you provide help? Find other parents at your school to share daycare together.',
        ]
      }
    }
  }
}
</script>
