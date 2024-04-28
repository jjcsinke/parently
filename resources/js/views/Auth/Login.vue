<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
        <div class="border rounded-lg pa-8" style="width:100%;max-width:500px;">
          <v-form>
            <h1 class="text-h4 mb-8">Login</h1>
              <v-text-field
                v-model="email"
                label="Email"
                variant="outlined"
                required
                type="email"
              ></v-text-field>
              <v-text-field
                v-model="password"
                label="Password"
                variant="outlined"
                required
                type="password"
              ></v-text-field>
              <v-btn color="primary" @click="doLogin">Login</v-btn>
            <v-divider class="mt-8 mb-4"/>
            <v-btn variant="text" class="ml-n4" to="/register">Don't have an account? Sign up now :)</v-btn><br>
            <v-btn variant="text" class="ml-n4" to="/forgot-password">Forgot password?</v-btn><br>
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
      email: '',
      password: ''
    }
  },
  methods: {
      ...mapActions(useAuthStore, ['login']),
    doLogin() {
      this.login(this.email, this.password)
    }
  }
}
</script>
