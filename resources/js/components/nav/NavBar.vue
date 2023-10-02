<template>
  <v-app-bar flat style="border-bottom: solid 0.5px grey;">
      <v-app-bar-title>
        <router-link class="d-block d-flex align-center" :to="{name: user ? 'portal' : 'home'}">
          <img
              src="/images/logo.svg"
              height="40"
              alt="Parently"
              style="object-fit:contain;object-position:left center;"
          >
        </router-link>
      </v-app-bar-title>
      <template v-if="user">
        <div class="hidden-xs-only">

          <v-btn variant="text" :to="{name: 'home'}" exact>Home</v-btn>
          <v-btn variant="text" v-if="user" :to="{name: 'portal'}" exact>Portal</v-btn>

          <v-btn @click="logout">
            Logout
          </v-btn>
        </div>
      </template>
      <template v-else>

        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
      </template>
      <v-menu
          left
          bottom
          min-width="38vw"
      >
        <template v-slot:activator="{ on }">
          <v-btn icon class="hidden-sm-and-up">
            <v-icon>mdi-menu</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item
              v-for="(item, i) in items"
              :key="i"
              :to="item.to"
          >
            <v-list-item-title>{{ item.text }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>

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

export default {
  data() {
    return {
      user: window.user
    }
  },
  methods: {
    logout() {
      axios.post('/logout', '', {baseURL: '/'})
          .then(() => {
            location.replace('/');
          })
    }
  }
}
</script>
