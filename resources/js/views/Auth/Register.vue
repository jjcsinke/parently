<template>
  <auth-form>
    <template v-slot:title>
      {{$t('auth.register')}}
    </template>
    <template v-slot:form>
      <v-form @submit.prevent="register(form)">
        <v-text-field
            v-model="form.name"
            :label="$t('form.name')"
            variant="outlined"
            required
            type="text"
        ></v-text-field>
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
        <v-text-field
            v-model="form.password_confirmation"
            :label="$t('form.password-confirmation')"
            variant="outlined"
            required
            type="password"
        ></v-text-field>
        <v-btn color="primary">{{ $t('buttons.register') }}</v-btn>
      </v-form>
    </template>
    <template v-slot:links>
      <router-link class="text-primary text-decoration-none" :to="{name: 'login'}">{{
          $t('auth.already-registered')
        }}</router-link>
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
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    ...mapActions(useAuthStore, ['register']),
  }
}
</script>
