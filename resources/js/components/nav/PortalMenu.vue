<template>
  <v-navigation-drawer app>
    <v-list>
      <v-list-item v-for="item in menuItems" :title="item.name" :exact="item.exact ?? false" :to="{name: item.route}"></v-list-item>
    </v-list>
  </v-navigation-drawer>

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
