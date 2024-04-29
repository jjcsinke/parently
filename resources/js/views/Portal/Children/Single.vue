<template>
  <single-page :title="title" :loading="loading">
    <template v-if="child">
    <dashboard-section>
      <v-row>
        <v-col cols="12" md="4">
          <v-img aspect="1" src="/images/child_placeholder.jpg"/>
        </v-col>
        <v-col cols="12" md="8">
          <v-list>
            <v-list-item>
              <v-list-item-title>Age</v-list-item-title>
              <v-list-item-subtitle>{{ child.age }}</v-list-item-subtitle>
            </v-list-item>
            <v-list-item>
              <v-list-item-title>Date of birth</v-list-item-title>
              <v-list-item-subtitle>{{ child.date_of_birth }}</v-list-item-subtitle>
            </v-list-item>
            <v-list-item>
              <v-list-item-title>School</v-list-item-title>
              <v-list-item-subtitle>{{ child.school?.name }}</v-list-item-subtitle>
            </v-list-item>
          </v-list>
        </v-col>
      </v-row>

    </dashboard-section>
     <dashboard-section title="interests">
       <v-chip-group>
         <v-chip v-for="interest in child.interests" :key="interest.id">{{ interest.name }}</v-chip>
       </v-chip-group>
     </dashboard-section>
    </template>
  </single-page>
</template>
<script>
import {mapActions, mapState} from "pinia";
import {useChildrenStore} from "@/stores/children/index.js";
import DashboardSection from "@/components/layout/dashboard/DashboardSection.vue";

export default {
  components: {DashboardSection},
  data() {
    return {
      data: {}
    }
  },
  computed: {
    ...mapState(useChildrenStore, ['loading', 'child']),
    title() {
      return this.child ? this.child.name : 'Child'
    }
  },
  methods: {
    ...mapActions(useChildrenStore, ['loadChild'])
  },
  mounted() {
    !this.loading && this.loadChild(this.$route.params.id)
  }
}
</script>
