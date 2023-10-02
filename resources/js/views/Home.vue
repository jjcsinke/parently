<template>
  <v-app-bar app color="transparent" flat>
    <v-container  class="text-right">
      <template v-if="user">
        <v-btn class="mx-2" size="large" color="primary" :to="{name: 'portal'}">{{ $t('portal.title') }}</v-btn>
        <v-btn class="mx-2" size="large" @click="logout()">{{ $t('auth.logout') }}</v-btn>
      </template>
    </v-container>
  </v-app-bar>
  <v-container class="py-16 d-flex flex-column align-center justify-center" style="min-height: 100%;">

    <img class="main-image pe-none" alt="Parently" src="/images/logo.svg">
    <h1 class="mt-5 text-center text-primary text-h3 mb-16">Share care together</h1>
    <div class="py-4 d-flex justify-center">
      <template v-if="!user">
        <v-btn class="mx-2" size="large" color="primary" href="/login">Login</v-btn>
        <v-btn class="mx-2" size="large" color="warning" href="/register">Register</v-btn>
      </template>
    </div>
  </v-container>

</template>
<script>

export default {
  data() {
    return {
      user: window.user
    }
  },
  methods: {
    logout() {
      axios.post('/logout', '', {baseURL: '/'})
          .then(() => {
            location.replace('/');
          })
    }
  }
}
</script>
