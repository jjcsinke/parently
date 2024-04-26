<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="6">
        <v-card rounded>
          <v-form>
            <v-card-title>
              <h2 class="text-h2">Login</h2>
            </v-card-title>
            <v-card-text>
              <v-text-field
                v-model="email"
                label="Email"
                outlined
                dense
                required
                type="email"
              ></v-text-field>
              <v-text-field
                v-model="password"
                label="Password"
                outlined
                dense
                required
                type="password"
              ></v-text-field>
            </v-card-text>
            <v-card-actions>
              <v-btn color="primary" @click="doLogin">Login</v-btn>
            </v-card-actions>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
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
