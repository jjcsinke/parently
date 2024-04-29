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
        <v-btn type="submit" :disabled="loading" :loading="loading" color="primary">{{ $t('buttons.register') }}</v-btn>
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
import AuthForm from "@/components/ui/AuthForm.vue";
import {mapActions} from "pinia";
import {useAlertsStore} from "@/stores/alerts/index.js";
import {useAuthStore} from "@/stores/auth/index.js";

export default {
  components: {AuthForm},
  data() {
    return {
      loading: false,
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    ...mapActions(useAlertsStore, ['showSnackbar']),
    register() {
      this.loading = true;
      axios.post('/register', this.form, {baseURL: '/'})
          .then((response) => {
            this.showSnackbar({
              color: 'success',
              text: this.$t('auth.verification-sent')
            });
            this.$router.push({name: 'verify-email'});
          })
          .catch((error) => {
            this.showSnackbar({
              color: 'error',
              text: error.response.data.message
            });
          })
          .finally(() => {
            this.loading = false;
          })
    },

  }
}
</script>
