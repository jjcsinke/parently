<template>
  <v-snackbar
      v-model="visible"
      multi-line
      location="top"
      :timeout="5000"
      :color="color"
      variant="tonal"
  >
    {{ text }}

    <template v-slot:actions>
      <v-btn
          variant="text"
          icon="mdi-close"
          @click="visible = false"
      />
    </template>
  </v-snackbar>
</template>
<script>
export default {
  props: {
    show: {
      type: Boolean,
      default: false
    },
    color: {
      type: String,
      default: undefined
    },
    text: {
      type: String,
      default: undefined
    }
  },
  data() {
    return {
      visible: this.show,
    }
  },
  emits: ['update:modelValue'],
}
</script>
