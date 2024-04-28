<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
    <div class="border rounded-lg pa-8" style="width:100%;max-width:500px;">
      <v-form>
        <h1 class="text-h4 mb-8">
          {{$t('auth.forgot-password')}}
        </h1>
        <v-text-field
            v-model="form.email"
            :label="$t('form.email')"
            variant="outlined"
            required
            :disabled="loading"
            type="email"/>
        <v-btn color="primary" :disabled="loading" :loading="loading" @click="forgotPassword()">{{$t('form.buttons.send-reset-link')}}</v-btn>
      </v-form>
    </div>
    <template v-if="snackbar.show">
      <default-snackbar
          :show="snackbar.show"
          :color="snackbar.color"
          :text="snackbar.text"
      />
    </template>
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
        email: ''
      },
    }
  },
  methods: {
    forgotPassword() {
      this.snackbar.show = false;
      this.loading = true;

      axios.post('/forgot-password', this.form, {baseURL: '/'})
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
