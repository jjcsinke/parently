<template>
  <index-page>

    <v-data-table-server
        v-model:items-per-page="meta.per_page"
        :items="parents"
        :items-length="meta.total || 0"
        :headers="headers"
        :loading="loading"
        @update:options="loadParents"
        :items-per-page-options="[{ title: '10', value: 10 }]"
    >
      <template v-slot:item.actions="{item}">
        <v-btn variant="plain" v-for="action in actions"
               :to="{name: `parents.${action}`, params: {id:item.id}}"
               :icon="icons[action]"></v-btn>
      </template>

    </v-data-table-server>
    <pre>{{ meta }}</pre>
  </index-page>
</template>

<script>
import {mapActions, mapState} from "pinia";
import {useParentStore} from "../../../stores/parents/index.js";

export default {
  name: 'ParentsIndex',
  data() {
    return {
      actions: ['show'],
      icons: {
        show: 'mdi-eye',
        edit: 'mdi-pencil'
      },
      headers: [
        {
          title: 'Name',
          value: 'name'
        },
        {
          title: 'Children count',
          value: 'children_count'
        },
        {
          title: 'Actions',
          align: 'end',
          value: 'actions',
        }
      ]
    }
  },
  computed: {
    ...mapState(useParentStore, ['meta','loading','parents'])
  },
  methods: {
    ...mapActions(useParentStore, ['loadParents'])
  },
  mounted() {
    this.loadParents()
  }
}
</script>
