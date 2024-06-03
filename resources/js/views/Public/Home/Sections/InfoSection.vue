<template>
  <page-section>
    <v-row>
      <v-col cols="12" md="4" :order-md="order" class="f-flex align-stretch">
        <v-img
          class="flex-grow-1 rounded-lg elevation-0"
          cover
          :src="image"
        ></v-img>
      </v-col>
      <v-col cols="12" md="6" class="pa-16" :offset-md="offset">
        <h2 class="text-h3 mb-8">{{ title }}</h2>
        <p class="text-h6">{{ description }}</p>
        <template v-if="to !== undefined">
          <v-btn variant="outlined" class="mt-8" :to="{ name: to.name }"
            >{{ $t(buttonText) }} &rarr;</v-btn
          >
        </template>
      </v-col>
    </v-row>
  </page-section>
</template>
<script>
import PageSection from "../../../../components/layout/sections/PageSection.vue";

export default {
  name: "InfoSection",
  props: {
    section: Object,
    index: Number,
  },
  computed: {
    title() {
      return this.section.title;
    },
    description() {
      return this.section.description;
    },
    to() {
      return this.section.to ?? this.section.button?.to;
    },
    buttonText() {
      return this.section.button?.text ?? "buttons.learn-more";
    },
    image() {
      return this.section.image;
    },
    order() {
      return this.index % 2 === 0 ? 0 : 1;
    },
    offset() {
      return this.index % 2 === 0 ? 0 : 2;
    },
  },
  components: { PageSection },
};
</script>
