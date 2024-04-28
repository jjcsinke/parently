<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
    <div class="border rounded-lg pa-8" style="width:100%;max-width:500px;">
      <v-form @submit.prevent="forgotPassword()">
        <h1 class="text-h4 mb-8">
          {{ $t('auth.forgot-password') }}
        </h1>
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
        <v-divider class="mt-8 mb-4"/>
        <router-link class="text-overline text-decoration-none" :to="{name: 'login'}">
          {{ $t('auth.remember-password') }}
        </router-link>
      </v-form>
    </div>
  </v-container>
</template>
<script>
import DefaultSnackbar from "../../components/ui/DefaultSnackbar.vue";
import {useAlertsStore} from "../../stores/alerts/index.js";
import {mapActions} from "pinia";

export default {
  components: {DefaultSnackbar},
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
  }
}
</script>
