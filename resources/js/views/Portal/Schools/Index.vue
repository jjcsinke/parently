<template>
  <index-page>

    <default-table
        route="/schools"
        :headers="headers"
        :actions="['show']"
    />
  </index-page>
</template>

<script setup>

const headers = [
  {
    title: 'id',
    value: 'id',
    sortable:
        false
  },
  {
    title: 'Name',
    value: 'name',
  },
  {
    title: 'City',
    value: 'city.name',
  },
  {
    title: 'Children count',
    value: 'children_count'
  }
]
</script>
