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
export default {
  props: {
    loading: {
      type: Boolean,
      default: false,
    },
    title: String,
  },
  computed: {
    ucTitle() {
      return this.title && this.title[0].toUpperCase() + this.title.slice(1)
    }
  },
  data() {
    return {
      data: {}
    }
  }
}
</script>
