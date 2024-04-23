<template>
  <v-table density="comfortable">
  <tbody>
  <tr v-for="(value, key) in data" :key="key">
    <td><strong>{{ key }}</strong>:</td>
    <td v-if="typeof(value) !== 'object'">{{ value }}</td>
    <td v-else-if="typeof(value) === 'object'" >
      <data-table :data="value"/>
    </td>
  </tr>
  </tbody>
</v-table>
</template>
<script>
export default {
  name: 'data-table',
  components: {
    // async import:
    DataTable: () => import('./DataTable.vue')
  },
  props: {
    data: {
      type: Object,
      required: true
    }
  }
}
</script>
