<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
    <div class="border rounded-lg pa-8" style="width:100%;max-width:500px;">
      <v-form @submit.prevent="login(form)">
        <h1 class="text-h4 mb-8">{{$t('auth.login')}}</h1>
        <v-text-field
            v-model="form.email"
            :label="$t('form.email')"
            variant="outlined"
            required
            type="email"
        ></v-text-field>
        <v-text-field
            v-model="form.password"
            :label="$t('form.password')"
            variant="outlined"
            required
            type="password"
        ></v-text-field>
        <v-btn type="submit" color="primary">{{ $t('buttons.login') }}</v-btn>
        <v-divider class="mt-8 mb-4"/>
        <router-link class="text-overline text-decoration-none"  :to="{name: 'register'}">{{$t('auth.register-now')}}</router-link>
        <br>
        <router-link class="text-overline text-decoration-none"  :to="{name: 'forgot-password'}">{{ $t('auth.did-you-forget') }}</router-link>
        <br>
      </v-form>
    </div>
  </v-container>
</template>
<script>
import {mapActions} from "pinia";
import {useAuthStore} from "../../stores/auth/index.js";

export default {
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    ...mapActions(useAuthStore, ['login']),
  },
}
</script>
