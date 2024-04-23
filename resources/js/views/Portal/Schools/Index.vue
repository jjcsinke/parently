<template>
  <index-page>

    <default-table
        route="schools"
        :items="schools"
        :headers="headers"
        :loading="loading"
        :meta="meta"
        :loadItems="loadSchools"
        :actions="['show']"
    />
  </index-page>
</template>

<script>
import DefaultTable from "../../../components/ui/DefaultTable.vue";
import {useSchoolsStore} from "../../../stores/schools/index.js";
import {mapActions, mapState} from "pinia";

export default {
  name: 'SchoolsIndex',
  components: {DefaultTable},
  data() {
    return {
      headers: [
        {
          title: 'id',
          value: 'id',
          sortable:
              false
        },
        {
          title: 'Name',
          value: 'name',
        },
        {
          title: 'City',
          value: 'city.name',
        },
        {
          title: 'Children count',
          value: 'children_count'
        }
      ]
    }
  },
  computed: {
    ...mapState(useSchoolsStore, ['loading','meta','schools'])
  },
  methods: {
    ...mapActions(useSchoolsStore, ['loadSchools'])
  },
  mounted() {
    this.loadSchools()
  }
}
</script>
