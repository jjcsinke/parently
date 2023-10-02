<template>
  <index-page>

  <default-table
      route="/parents"
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
    title: 'Children count',
    value: 'children_count'
  }
]
</script>
