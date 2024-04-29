<template>
  <v-container class="d-flex justify-center my-16 py-16 align-items-center">
    <div class="border rounded-lg pa-8 pb-6" style="width:100%;max-width:500px;">
      <h1 class="text-h4 mb-8"><slot name="title"></slot></h1>
      <slot name="form"></slot>
      <template v-if="$slots.links">
        <v-divider class="mt-6 mb-3"/>
        <div class="d-flex flex-column" style="line-height:2;">
          <slot name="links"></slot>
        </div>
      </template>
    </div>
  </v-container>
</template>
<script>
export default {
}
</script>
