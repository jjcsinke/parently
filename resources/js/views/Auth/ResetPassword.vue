<template>
  <auth-form>
    <template v-slot:title>
          {{ $t('auth.reset-password') }}
    </template>
    <template v-slot:form>
      <v-form @submit.prevent="resetPassword()">
        <v-text-field
            v-model="form.email"
            :label="$t('form.email')"
            variant="outlined"
            required
            disabled
            type="email"/>
        <v-text-field
            v-model="form.password"
            :label="$t('form.password')"
            variant="outlined"
            required
            type="password"/>
        <v-text-field
            v-model="form.password_confirmation"
            :label="$t('form.password-confirmation')"
            variant="outlined"
            required
            type="password"/>
        <v-btn type='submit' color="primary">{{ $t('form.buttons.reset-password') }}</v-btn>
      </v-form>
    </template>
  </auth-form>
</template>
<script>
import {mapActions} from "pinia";
import {useAlertsStore} from "../../stores/alerts/index.js";
import AuthForm from "../../components/ui/AuthForm.vue";

export default {
  components: {AuthForm},
  data() {
    return {
      loading: false,
      snackbar: {
        show: false,
        color: undefined,
        text: undefined,
      },
      form: {
        token: this.$route.query.token,
        email: this.$route.query.email,
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    ...mapActions(useAlertsStore, ['showSnackbar']),
    resetPassword() {
      this.loading = true;
      axios.post('/reset-password', this.form, {baseURL: '/'})
          .then((response) => {
            this.showSnackbar({
              color: 'success',
              text: response.data.message
            });
            this.$router.push({name: 'login'});
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
