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
      let title = this.title ?? this.$route.name
      title = title[0].toUpperCase() + title.slice(1)
      return title;
    }
  }
}
</script>
