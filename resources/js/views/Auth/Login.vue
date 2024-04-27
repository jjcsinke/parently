<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
        <div class="border rounded-lg" style="width:100%;max-width:500px;">
          <v-form>
            <h1 class="text-h4">Login</h1>
              <v-text-field
                v-model="email"
                label="Email"
                outlined
                required
                type="email"
              ></v-text-field>
              <v-text-field
                v-model="password"
                label="Password"
                outlined
                required
                type="password"
              ></v-text-field>
              <v-btn color="primary" variant="filled" @click="doLogin">Login</v-btn>
          </v-form>
        </div>
  </v-container>
</template>
<script>
import {mapActions} from "pinia";

export default {
  data() {
    return {
      email: '',
      password: ''
    }
  },
  methods: {
      ...mapActions('auth', ['login']),
    doLogin() {
      this.login({email: this.email, password: this.password})
    }
  }
}
</script>
