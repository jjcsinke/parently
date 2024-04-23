<template>
  <index-page>
    <default-table
        route="children"
        :items="children"
        :headers="headers"
        :loading="loading"
        :meta="meta"
        :loadItems="loadChildren"
        :actions="['show']"
    />
  </index-page>
</template>

<script>
import {useChildrenStore} from "../../../stores/children/index.js";
import DefaultTable from "../../../components/ui/DefaultTable.vue";
import {mapActions, mapState} from "pinia";

export default {
  name: 'ChildrenIndex',
  components: {DefaultTable},
  data() {
    return {
      store: 'children',
      headers: [
        {
          title: 'Name',
          value: 'name'
        },
        {
          title: 'School',
          value: 'school.name'
        }
      ]
    }
  },
  computed: {
    ...mapState(useChildrenStore, ['loading','meta','children'])
  },
  methods: {
    ...mapActions(useChildrenStore, ['loadChildren'])
  },
  mounted() {
    this.loadChildren()
  }

}
</script>
