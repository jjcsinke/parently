<template>
  <nav>

    <ul class="nav flex-column" v-if="menuItems">
      <li class="nav-item" v-for="item in menuItems">
        <router-link class="nav-link" :to="{name: item.route}">{{ item.name }}</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      menuItems: []
    }
  },
  mounted() {
    axios.get('/menu')
        .then(({data}) => this.menuItems = data.data)
  }
}
</script>
