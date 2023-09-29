<template>
  <div>
    <h1>{{ $t('portal.dashboard.parent') }}</h1>
    <my-children></my-children>
  </div>
</template>
<script setup>
import MyChildren from "../../../components/parent/MyChildren.vue";
</script>
