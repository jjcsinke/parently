<template>
  <v-app-bar flat style="border-bottom: solid 0.5px grey">
    <v-app-bar-title>
      <router-link
        class="d-block d-flex align-center"
        :to="{ name: user ? 'home' : 'home' }"
      >
        <img
          src="/images/logo.svg"
          height="40"
          alt="Parently"
          style="object-fit: contain; object-position: left center"
        />
      </router-link>
    </v-app-bar-title>

    <v-toolbar-items variant="plain">
      <template v-if="!inPortal">
        <v-btn :to="{ name: 'home' }" exact>{{ $t("nav.home") }}</v-btn>
        <v-btn :to="{ name: 'about' }" exact>{{ $t("nav.about") }}</v-btn>
        <v-btn v-if="user" :to="{ name: 'dashboard' }"
          >{{ $t("nav.portal") }}
        </v-btn>
      </template>
    </v-toolbar-items>
    <v-btn
      variant="elevated"
      color="warning"
      v-if="!user"
      :to="{ name: 'login' }"
      >{{ $t("nav.login") }}
    </v-btn>
  </v-app-bar>
</template>
<script>
import { useAuthStore } from "@/stores/auth/index.js";
import { mapActions, mapState } from "pinia";

export default {
  computed: {
    ...mapState(useAuthStore, ["user"]),
    inPortal() {
      return this.$route.path.includes("portal");
    },
  },
  methods: {
    ...mapActions(useAuthStore, ["logout"]),
  },
};
</script>
