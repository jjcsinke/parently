<template>
  <v-navigation-drawer color="primary" :permanent="$vuetify.display.smAndUp" :rail="$vuetify.display.smAndDown"
                       :expand-on-hover="true">

    <v-list-item v-for="item in menuItems"
                 :title="$t(`nav.${item.route}`)"
                 :exact="item.exact ?? false"
                 :to="{name: item.route}"
                 :prepend-icon="item.icon ?? false"/>

    <template v-slot:append>
      <v-list>
        <v-list-item :to="{name: 'account'}"
                     :title="$t('portal.account.title')"
                     prepend-icon="mdi-account"/>

        <v-list-item @click="logout"
                     :title="$t('buttons.logout')"
                     prepend-icon="mdi-logout"/>
      </v-list>
    </template>
  </v-navigation-drawer>

</template>

<script>
import {mapActions} from "pinia";
import {useAuthStore} from "@/stores/auth/index.js";

export default {
  data() {
    return {
      menuItems: []
    }
  },
  mounted() {
    axios.get('/menu')
        .then(({data}) => this.menuItems = data.data)
  },
  methods: {
    ...mapActions(useAuthStore, ['logout'])
  }
}
</script>
