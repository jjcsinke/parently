<template>
  <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom">
    <div class="container">

      <router-link class="navbar-brand" :to="{name: user ? 'portal' : 'home'}">
        <img height="30" src="/images/logo.svg" class="nav-logo"
             alt="Parently">
      </router-link>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->
          <template v-if="user">
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
            </li>

            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'portal'}">Portal</router-link>
            </li>

            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                {{ user.name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>

                  <button class="dropdown-item" @click="logout">
                    Logout
                  </button>
                </li>
              </ul>
            </li>

          </template>

          <template v-else>

            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>

          </template>
        </ul>
      </div>
    </div>
  </nav>
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
