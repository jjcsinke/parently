<template>
  <v-app-bar flat style="border-bottom: solid 0.5px grey;">
    <v-app-bar-title>
      <router-link class="d-block d-flex align-center" :to="{name: user ? 'home' : 'home'}">
        <img
            src="/images/logo.svg"
            height="40"
            alt="Parently"
            style="object-fit:contain;object-position:left center;"
        >
      </router-link>
    </v-app-bar-title>


    <v-toolbar-items variant="plain">

      <template v-if="!inPortal">
        <v-btn :to="{name: 'home'}" exact>Home</v-btn>
        <v-btn :to="{name: 'about'}" exact>About</v-btn>
        <v-btn :to="{name: 'how-it-works'}" exact>How It Works</v-btn>
        <v-btn v-if="user" :to="{name: 'dashboard'}">Portal</v-btn>
      </template>


    </v-toolbar-items>

    <!--      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"-->
    <!--              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">-->
    <!--        <span class="navbar-toggler-icon"></span>-->
    <!--      </button>-->

    <!--      <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
    <!--        &lt;!&ndash; Left Side Of Navbar &ndash;&gt;-->
    <!--        <ul class="navbar-nav me-auto">-->

    <!--        </ul>-->

    <!--        &lt;!&ndash; Right Side Of Navbar &ndash;&gt;-->
    <!--        <ul class="navbar-nav ms-auto">-->
    <!--          &lt;!&ndash; Authentication Links &ndash;&gt;-->
    <!--          <template v-if="user">-->
    <!--            <li class="nav-item">-->
    <!--              <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>-->
    <!--            </li>-->

    <!--            <li class="nav-item">-->
    <!--              <router-link class="nav-link" :to="{name: 'portal'}">Portal</router-link>-->
    <!--            </li>-->

    <!--            <li class="nav-item dropdown">-->
    <!--              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"-->
    <!--                 aria-haspopup="true" aria-expanded="false">-->
    <!--                {{ user.name }}-->
    <!--              </a>-->
    <!--              <ul class="dropdown-menu dropdown-menu-end">-->
    <!--                <li>-->

    <!--                  <button class="dropdown-item" @click="logout">-->
    <!--                    Logout-->
    <!--                  </button>-->
    <!--                </li>-->
    <!--              </ul>-->
    <!--            </li>-->

    <!--          </template>-->

    <!--          <template v-else>-->

    <!--            <li class="nav-item">-->
    <!--              <a class="nav-link" href="/login">Login</a>-->
    <!--            </li>-->
    <!--            <li class="nav-item">-->
    <!--              <a class="nav-link" href="/register">Register</a>-->
    <!--            </li>-->

    <!--          </template>-->
    <!--        </ul>-->
    <!--      </div>-->
  </v-app-bar>
</template>
<script>

import {useAuthStore} from "@/stores/auth/index.js";
import {mapActions, mapState} from "pinia";

export default {
  computed: {
    ...mapState(useAuthStore, ['user']),
    inPortal() {
      return this.$route.path.includes('portal')
    },
  },
  methods: {
    ...mapActions(useAuthStore, ['logout'])
  }
}
</script>
