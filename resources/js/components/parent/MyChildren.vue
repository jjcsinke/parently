<template>
  <v-row>
    <template v-for="child in children">
      <v-col cols="12" sm="4">
        <child-card :child="child" :key="child.id"/>
      </v-col>
    </template>
  </v-row>
</template>
<script>
import ChildCard from "@/components/parent/ChildCard.vue";

export default {
  components: {ChildCard},
  data() {
    return {
      children: []
    }
  },
  mounted() {
    axios.get('/children')
        .then(({data}) => this.children = data.data)
  }
}
</script>
