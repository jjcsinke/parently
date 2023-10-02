<template>
  <v-card>
    <v-card-title>{{ tableTitle }}</v-card-title>
    <v-data-table-server
        v-model:items-per-page="meta.per_page"
        :items="tableData"
        :items-length="meta.total"
        :headers="tableHeaders"
        :loading="loading"
        @update:options="loadItems"
        :items-per-page-options="[{ title: '10', value: 10 }]"
    >
      <template v-slot:item.actions="{item}">
          <v-btn v-for="action in actions" :to="{name: `${routeBase}.${action}`, params: {id:item.id}}">{{ action }}</v-btn>
      </template>

    </v-data-table-server>
  </v-card>
</template>
<script>
export default {
  props: {
    route: String,
    title: String,
    actions: Array,
    headers: Array
  },
  data() {
    return {
      tableData: [],
      meta: {
        page: 1,
        per_page: 10,
        total: 0
      },
      loading: false
    }
  },
  computed: {
    tableTitle() {
      return this.$t(this.title ?? `table.${this.route.replace(/^\//, '')}.title`)
    },
    routeBase() {
      return this.route.replace(/^\//,'')
    },
    tableHeaders() {
      return this.actions ? [
        ...this.headers,
        {title: 'actions', value: 'actions', sortable: false}
      ]  : this.headers
    }
  },
  mounted() {
    this.loadItems()
  },
  methods: {
    loadItems(options = {}) {
      options = {
        page: options.page ?? 1,
        per_page: options.itemsPerPage ?? 10,
      }
      this.loading = true;
      axios.get(this.route, {params: options})
          .then(({data}) => {
            this.tableData = data.data
            this.meta = data.meta
            this.loading = false
          })
    }
  }
}
</script>
