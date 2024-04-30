<template>
  <page-section>
    <div class="d-flex flex-column align-center" style="max-width: 1000px; line-height: 2;">
    <template v-for="part in section">
        <v-col cols="12" md="8" v-html="marked(part)">
        </v-col>
    </template>
      </div>
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
