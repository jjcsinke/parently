<template>
  <v-card>
    <v-card-title>{{ tableTitle }}</v-card-title>
    <v-data-table-server
        v-model:items-per-page="meta.per_page"
        :items="items"
        :items-length="meta.total"
        :headers="tableHeaders"
        :loading="loading"
        @update:options="loadItems"
        :items-per-page-options="[{ title: '10', value: 10 }]"
    >
      <template v-if="actions" v-slot:item.actions="{item}">
        <v-btn variant="plain" v-if="actions" v-for="action in actions"
               :to="{name: `${routeBase}.${action}`, params: {id:item.id}}"
               :icon="icons[action]"></v-btn>
      </template>

    </v-data-table-server>
  </v-card>
</template>
<script>
export default {
  props: {
    route: String,
    title: String,
    items: Array,
    meta: Object,
    loadItems: Function,
    actions: {
      validator(value) {
        // The value must match one of these strings
        const acceptedActions = ['show', 'edit', 'delete'];
        return !value || value.filter(v => acceptedActions.includes(v));
      }
    },
    headers: Array
  },
  data() {
    return {
      loading: false,
      icons: {
        show: 'mdi-eye',
        edit: 'mdi-pencil'
      }
    }
  },
  computed: {
    tableTitle() {
      return this.$t(this.title ?? `table.${this.routeBase}.title`)
    },
    routeBase() {
      return this.route.replace(/^\//, '')
    },
    tableHeaders() {
      return this.actions ? [
        ...this.headers,
        {title: 'actions', value: 'actions', sortable: false, align: 'end'}
      ] : this.headers
    }
  }
}
</script>
