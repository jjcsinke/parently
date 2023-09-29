<template>
  <div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item" v-for="parent in parents">
        {{ parent.name }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      parents: []
    }
  },
  mounted() {
    axios.get('/parents')
        .then(({data}) => this.parents = data.data)
  }
}
</script>
