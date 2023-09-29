<template>
  <h3>{{ $t('portal.my-children.title') }}</h3>
  <div class="row">
    <div v-for="child in children" class="col-3">
      <router-link :to="{name: 'children.single', params: {id: child.id}}">{{ child.name }}</router-link>
    </div>
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
