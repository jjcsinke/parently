<template>
  <div class="container my-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">School list</div>

            <ul class="list-group list-group-flush">
              <li class="list-group-item" v-for="school in schools">
                {{ school.name }} // {{ school.city.name }} // {{ school.children_count }}
              </li>
            </ul>
        </div>
      </div>
    </div>
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
