<template>
    <h1>{{ $t('portal.dashboard.parent') }}</h1>
    <my-children></my-children>
</template>
<script setup>
import MyChildren from "../../../components/parent/MyChildren.vue";
import IndexPage from "../../../components/layout/IndexPage.vue";
</script>
