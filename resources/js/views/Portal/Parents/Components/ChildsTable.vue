<template>
  <v-table density="compact">
    <thead>
    <tr>
      <th>Name</th>
      <th>Age</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(child, key) in children">
      <td>{{ child.name }}</td>
      <td>{{ child.age }}</td>
    </tr>
    </tbody>
  </v-table>

</template>
<script>
export default {
  props: {
    children: {
      type: Array,
      required: true
    }
  }
}
</script>
