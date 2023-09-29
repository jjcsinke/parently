<template>
  <div class="container my-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            {{ message }} I'm an example component.
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: 'default'
    }
  },
  mounted() {
    axios.get('/')
        .then((res) => this.message = res.data.message)

    console.log('Component mounted.')
  }
}
</script>
