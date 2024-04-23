<template>
  <index-page>

  <autoload-table
      route="/cities"
      :headers="headers"
      :actions="['show']"
  />
  </index-page>
</template>

<script>
import AutoloadTable from "../../../components/ui/AutoLoadTable.vue";

export default {
  name: 'CitiesIndex',
  components: {AutoloadTable},
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
          title: 'School count',
          value: 'schools_count'

        },
        {
          title: 'Children count',
          value: 'children_count'
        }
      ]
    }
  }
}
</script>
