<template>
  <div class="card">
    <div class="card-header">Menu</div>

    <ul class="list-group list-group-flush" v-if="menuItems">
      <li class="list-group-item" v-for="item in menuItems">
        <router-link :to="{name: item.route}">{{ item.name }}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      menuItems: []
    }
  },
  mounted() {
    axios.get('/menu')
        .then(({data}) => this.menuItems = data.data)
  }
}
</script>
