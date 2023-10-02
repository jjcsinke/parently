<template>
  <v-navigation-drawer color="primary" :permanent="$vuetify.display.smAndUp"  :rail="$vuetify.display.smAndDown" expand-on-hover>
    <v-list>
      <v-list-item v-for="item in menuItems"
                   :title="item.name"
                   :exact="item.exact ?? false"
                   :to="{name: item.route}"
                  :prepend-icon="item.icon ?? false">

      </v-list-item>
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
