<template v-if="parent">
  <single-page :title="title">
    <template v-if="parent">
      <v-row>
        <v-col cols="12">

          <v-card>
            <v-card-title>Info</v-card-title>
            <v-table density="comfortable">
              <tbody>
              <template v-for="(value, key) in parent" :key="key">
                <template v-if="excluded.indexOf(key) === -1">
                  <tr>
                    <td><strong>{{ key }}</strong>:</td>
                    <td v-if="typeof(value) !== 'object'">{{ value }}</td>
                    <td v-else-if="typeof(value) === 'object'">
                      <data-table :data="value"/>
                    </td>
                  </tr>
                </template>
              </template>
              </tbody>
            </v-table>
          </v-card>
        </v-col>
        <template v-if="parent.children">
          <v-col cols="12">
            <v-card>
              <v-card-title>Children</v-card-title>
              <childs-table :children="parent.children"/>
            </v-card>
          </v-col>
        </template>
      </v-row>
    </template>
  </single-page>

</template>
<script>
import {mapActions, mapState} from "pinia";
import {useParentStore} from "../../../stores/parents/index.js";
import DataTable from "../../../components/ui/DataTable.vue";
import ChildsTable from "./Components/ChildsTable.vue";

export default {
  components: {ChildsTable, DataTable},
  data() {
    return {
      excluded: ['children']
    }
  },
  computed: {
    ...mapState(useParentStore, ['loading', 'parent']),
    title() {
      return this.parent ? this.parent.name : 'Parent'
    }
  },
  methods: {
    ...mapActions(useParentStore, ['loadParent'])
  },
  mounted() {
    !this.loading && this.loadParent(this.$route.params.id)
  }
}

</script>
