<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
    <div class="border rounded-lg pa-8" style="width:100%;max-width:500px;">
      <v-form @submit.prevent="register(form)">
        <h1 class="text-h4 mb-8">Sign up</h1>
        <v-text-field
            v-model="form.name"
            label="Name"
            variant="outlined"
            required
            type="text"
        ></v-text-field>
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
        <v-text-field
            v-model="form.password_confirmation"
            label="Confirm Password"
            variant="outlined"
            required
            type="password"
        ></v-text-field>
        <v-btn color="primary">Sign up</v-btn>
        <v-divider class="mt-8 mb-4"/>
        <v-btn variant="text" class="ml-n4" :to="{name: 'register'}">Already have an account? Log in :)</v-btn>
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
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    ...mapActions(useAuthStore, ['register']),
  }
}
</script>
