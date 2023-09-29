<template>
  <div class="container">
    <template v-if="child">

      <h1>{{ child.name }}</h1>

      <h2>{{ child.school.name }}</h2>
    </template>
  </div>
</template>
<script>

export default {
  data() {
    return {
      child: {
        name: undefined,
        school: {}
      }
    }
  },
  mounted() {
    axios.get('/children/' + this.$route.params.id)
        .then(({data}) => this.child = data.data)
  }
}
</script>
