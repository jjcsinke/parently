<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
    <div class="border rounded-lg pa-8" style="width:100%;max-width:500px;">
      <v-form>
        <h1 class="text-h4 mb-8">
          {{ $t('auth.reset-password')}}
        </h1>
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
        <v-btn color="primary" @click="resetPassword()">{{ $t('form.buttons.reset-password') }}</v-btn>
      </v-form>
    </div>
   <default-snackbar
    :show="snackbar.show"
    :color="snackbar.color"
    :text="snackbar.text"
   />
  </v-container>
</template>
<script>
import DefaultSnackbar from "../../components/ui/DefaultSnackbar.vue";

export default {
  components: {DefaultSnackbar},
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
    resetPassword() {
      this.loading = true;
      axios.post('/reset-password', this.form, {baseURL: '/'})
          .then((response) => {
            this.snackbar = {
              show: true,
              color: 'success',
              text: response.data.message
            };
          })
          .catch((error) => {
            this.snackbar = {
              show: true,
              color: 'error',
              text: error.response.data.message
            };
          })
          .finally(() => {
            this.loading = false;
          })
    },
  }

}
</script>
