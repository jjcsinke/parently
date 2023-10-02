<template>
  <div>
    <h1 class="text-h3 mb-4">{{ singleTitle }}</h1>
    <h3>{{ data[identifier] ?? data }}</h3>
    <h3>{{ identifier }} </h3>
    <slot></slot>
  </div>
</template>
<script>
export default {
  props: {
    route: String,
    title: String,
    identifier: {
      type: String,
      default: 'name'
    }
  },
  data() {
    return {
      data: {}
    }
  },
  computed: {
    singleTitle() {
      return this.data && this.$t(this.$route.name, {name: this.data[`${this.identifier}`]})
    }
  },
  mounted() {
    axios.get(this.route + '/' + this.$route.params.id)
        .then(({data}) => this.data = data.data)

  }
}
</script>
