<template>
  <div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item" v-for="school in schools">
        <router-link :to="{name: 'schools.single',params: {id: school.id}}">
          {{ school.name }} // {{ school.city.name }} // {{ school.children_count }}
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      schools: []
    }
  },
  mounted() {
    axios.get('/schools')
        .then(({data}) => this.schools = data.data)
  }
}
</script>
