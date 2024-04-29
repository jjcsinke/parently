<template>
  <auth-form>
    <template v-slot:title>
      {{ $t('auth.forgot-password') }}
    </template>
    <template v-slot:form>
      <v-form @submit.prevent="forgotPassword()">
        <v-text-field
            v-model="form.email"
            :label="$t('form.email')"
            variant="outlined"
            required
            :disabled="loading"
            type="email"/>
        <v-btn color="primary" :disabled="loading" :loading="loading">
          {{ $t('form.buttons.send-reset-link') }}
        </v-btn>
      </v-form>
    </template>
    <template v-slot:links>
      <router-link class="text-primary text-decoration-none" :to="{name: 'login'}">
        {{ $t('auth.remember-password') }}
      </router-link>
    </template>
  </auth-form>
</template>
<script>
import DefaultSnackbar from "../../components/ui/DefaultSnackbar.vue";
import {useAlertsStore} from "../../stores/alerts/index.js";
import {mapActions} from "pinia";
import AuthForm from "../../components/ui/AuthForm.vue";

export default {
  components: {AuthForm, DefaultSnackbar},
  data() {
    return {
      loading: false,
      form: {
        email: ''
      },
    }
  },
  methods: {
    ...mapActions(useAlertsStore, ['showSnackbar']),
    forgotPassword() {
      if (this.loading) return;
      this.loading = true;

      axios.post('/forgot-password', this.form, {baseURL: '/'})
          .then((response) => {
            this.showSnackbar({
              color: 'success',
              text: response.data.message
            });
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
  },

}
</script>
