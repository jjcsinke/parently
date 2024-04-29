<template>
  <v-card link :to="{name: 'children.show', params: {id: child.id}}">
    <v-img :aspect="4/3" src="/images/child_placeholder.jpg"></v-img>
    <v-card-text>
      <h3 class="text-h5">{{ child.name }}</h3>
    </v-card-text>
  </v-card>
</template>
<script>
export default {
  props: {
    child: {
      type: Object,
      required: true
    }
  }
}
</script>
