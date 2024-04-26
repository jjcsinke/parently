<template>
  <v-parallax src="/images/parently_light.jpg" color="primary" height="600px">
    <div class="py-16 d-flex flex-column align-center justify-center flex-grow-1 h-100">
      <img class="main-image pa-4" alt="Parently" src="/images/logo.svg">
      <h1 class="text-center text-primary text-h3 mb-8">Share care together</h1>
      <div class="py-4 d-flex justify-center">
        <template v-if="!user">
          <v-btn class="mx-2" size="large" color="primary" href="/login">{{ $t('guest.login') }}</v-btn>
          <v-btn class="mx-2" size="large" color="warning" href="/register">{{ $t('guest.register') }}</v-btn>
        </template>
        <template v-if="user">
          <v-btn class="mx-2" size="large" color="warning" :to="{name: 'portal'}">{{ $t('portal.title') }}</v-btn>
        </template>
      </div>
    </div>
  </v-parallax>

</template>
<script>

import {mapActions, mapState} from "pinia";
import {useAuthStore} from "@/stores/auth/index.js";

export default {
  name: 'HeroSection',
  computed: {
    ...mapState(useAuthStore, ['user']),
  },
  methods: {
    ...mapActions(useAuthStore, ['logout'])
  }
}
</script>
