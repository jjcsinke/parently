<template>
  <div class="my-8">
    <template v-if="title">
      <h2><slot name="title">{{ $t(`sections.${title}.title`) }}</slot></h2>
    </template>

    <slot name="default"></slot>
  </div>
</template>
<script>
export default {
  name: 'DashboardSection',
  props: {
    title: {
      type: String,
    }
  }
}
</script>
