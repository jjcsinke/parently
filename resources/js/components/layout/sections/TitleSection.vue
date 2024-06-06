<template>
  <v-container class="ma-0 pa-0" fluid>
    <div class="bg-primary text-white">
      <v-container class="pt-16 pb-12">
        <h1 class="text-h3">{{ ucTitle }}</h1>
      </v-container>
    </div>
    <slot></slot>
  </v-container>
</template>
<script>
import { computed } from "vue";

export default {
  props: {
    section: Object,
  },
  computed: {
    ucTitle() {
      return (
        this.section.title &&
        this.section.title[0].toUpperCase() + this.section.title.slice(1)
      );
    },
  },
};
</script>
