<template>
  <index-page>

  <default-table
      route="/cities"
      :headers="headers"
      :actions="['show']"
  />
  </index-page>
</template>

<script setup>

const headers = [
  {
    title: 'id',
    value: 'id'
  },
  {
    title: 'Name',
    value: 'name'
  },
  {
    title: 'School count',
    value: 'schools_count'

  },
  {
    title: 'Children count',
    value: 'children_count'
  }
]
</script>
