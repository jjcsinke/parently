<template>
  <index-page>

    <default-table
        route="/children"
        :headers="headers"
        :actions="['show','edit']"
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
    title: 'School',
    value: 'school.name'
  }
]
</script>
