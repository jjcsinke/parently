<template>
    <single-page :title="title">
      <template v-if="school">
        <v-row>
          <v-col cols="12">
            <v-card>
              <v-card-title>Info</v-card-title>
            </v-card>
          </v-col>
        </v-row>
        <pre>{{ school }}</pre>
      </template>
    </single-page>
</template>
<script>
import {mapActions, mapState} from "pinia";
import {useSchoolsStore} from "../../../stores/schools/index.js";
export default {
    data() {
        return {
            data: {}
        }
    },
    computed: {
        ...mapState(useSchoolsStore,['loading','school']),
        title() {
            return this.school ? this.school.name : 'School'
        }
    },
    methods: {
        ...mapActions(useSchoolsStore,['loadSchool'])
    },
    mounted() {
        !this.loading && this.loadSchool(this.$route.params.id)
    }
}
</script>
