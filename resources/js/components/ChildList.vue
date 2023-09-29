<template>
  <div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item" v-for="child in children">
        <router-link :to="{name: 'children.single',params: {id: child.id}}">
          {{ child.name }} // {{ child.school.name }}
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
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
