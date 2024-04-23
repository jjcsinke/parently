<template>
  <single-page :title="title">

  <pre>
    {{child}}
  </pre>
  </single-page>
</template>
<script>
import {mapActions, mapState} from "pinia";
import {useChildrenStore} from "../../../stores/children/index.js";
export default {
  data() {
    return {
      data: {}
    }
  },
  computed: {
    ...mapState(useChildrenStore,['loading','child']),
    title() {
      return this.child ? this.child.name : 'Child'
    }
  },
  methods: {
    ...mapActions(useChildrenStore,['loadChild'])
  },
  mounted() {
    !this.loading && this.loadChild(this.$route.params.id)
  }
}
</script>
