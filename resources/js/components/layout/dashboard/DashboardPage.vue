<template>
  <v-container>
    <h1 class="h1 mb-16"><slot name="title">{{ $t('portal.dashboard.parent') }}</slot></h1>
    <slot name="default"></slot>
  </v-container>
</template>
