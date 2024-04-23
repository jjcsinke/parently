<template>
  <div>
    <h1 class="text-h3 mb-4">{{ ucTitle }}</h1>
    <v-divider class="my-4"/>
    <slot></slot>
  </div>
</template>
<script>
export default {
  props: {
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
