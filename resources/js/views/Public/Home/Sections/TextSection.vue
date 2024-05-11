<template>
  <page-section>
    <v-row>
    <template v-for="part in section">
        <v-col cols="12" md="12" v-html="marked(part)">
        </v-col>
    </template>
      </v-row>
  </page-section>
</template>
<script>
import {marked} from "marked";
import PageSection from "../../../../components/layout/PageSection.vue";

export default {
  name: 'TextSection',
  methods: {marked},
  props: {
    section: Object
  },
  components: {PageSection}
}
</script>
