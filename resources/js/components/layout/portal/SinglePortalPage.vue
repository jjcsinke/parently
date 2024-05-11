<template>
  <div>
    <template v-if="!loading">

    <h1 class="text-h3 mb-4">{{ ucTitle }}</h1>
    <v-divider class="my-4"/>
    <slot></slot>
    </template>
    <template v-if="loading">
      <v-progress-linear indeterminate color="primary"/>
    </template>
  </div>
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
