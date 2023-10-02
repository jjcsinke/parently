<template>
  <div>
    <h1 class="text-h3 mb-4">{{ indexTitle }}</h1>
    <slot></slot>
  </div>
</template>
<script>
export default {
  props: {
    title: String
  },
  computed: {
    indexTitle() {
      return this.title ?? this.$route.name
    }
  }
}
</script>
