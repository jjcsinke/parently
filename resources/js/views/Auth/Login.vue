<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
    <div class="border rounded-lg pa-8" style="width:100%;max-width:500px;">
      <v-form>
        <h1 class="text-h4 mb-8">Login</h1>
        <v-text-field
            v-model="form.email"
            label="Email"
            variant="outlined"
            required
            type="email"
        ></v-text-field>
        <v-text-field
            v-model="form.password"
            label="Password"
            variant="outlined"
            required
            type="password"
        ></v-text-field>
        <v-btn color="primary" @click="login(form)">Login</v-btn>
        <v-divider class="mt-8 mb-4"/>
        <v-btn variant="text" class="ml-n4" :to="{name: 'register'}">Don't have an account? Sign up now :)</v-btn>
        <br>
        <v-btn variant="text" class="ml-n4" :to="{name: 'forgot-password'}">Forgot password?</v-btn>
        <br>
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
import {mapActions, mapState} from "pinia";
import {useAuthStore} from "../../stores/auth/index.js";
import DefaultSnackbar from "../../components/ui/DefaultSnackbar.vue";

export default {
  components: {DefaultSnackbar},
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  computed: {
    ...mapState(useAuthStore, ['snackbar'])
  },
  methods: {
    ...mapActions(useAuthStore, ['login']),
  },
}
</script>
