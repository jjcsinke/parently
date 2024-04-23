<template>
  <index-page>

    <default-table
        route="parents"
        :items="parents"
        :headers="headers"
        :loading="loading"
        :meta="meta"
        :loadItems="loadParents"
        :actions="['show']"
    >
    </default-table>
   </index-page>
</template>

<script>
import {mapActions, mapState} from "pinia";
import {useParentStore} from "../../../stores/parents/index.js";
import DefaultTable from "../../../components/ui/DefaultTable.vue";

export default {
  name: 'ParentsIndex',
  components: {DefaultTable},
  data() {
    return {
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
  }
}
</script>
