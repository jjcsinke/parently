<template>
  <auth-form>
    <template v-slot:title>
      {{ $t('auth.login') }}
    </template>
    <template v-slot:form>
      <v-form @submit.prevent="login(form)">
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
      </v-form>
    </template>
    <template v-slot:links>
      <router-link class="text-decoration-none text-primary" :to="{name: 'register'}">
        {{ $t('auth.register-now') }}
      </router-link>
      <router-link class="text-decoration-none text-primary" :to="{name: 'forgot-password'}">
        {{ $t('auth.did-you-forget') }}
      </router-link>
    </template>
  </auth-form>
</template>
<script>
import {mapActions} from "pinia";
import {useAuthStore} from "../../stores/auth/index.js";
import AuthForm from "../../components/ui/AuthForm.vue";

export default {
  components: {AuthForm},
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
