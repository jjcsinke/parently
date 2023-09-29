<template>
  <div class="container">
    <template v-if="school">

      <h1>{{ school.name }}</h1>

    </template>
  </div>
</template>
<script>

export default {
  data() {
    return {
      school: {}
    }
  },
  mounted() {
    axios.get('/schools/' + this.$route.params.id)
        .then(({data}) => this.school = data.data)
  }
}
</script>
