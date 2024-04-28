<template>
  <v-snackbar
      v-model="snackbar.show"
      multi-line
      location="top"
      :color="snackbar.color"
      variant="tonal"
  >
    {{ snackbar.text }}

    <template v-slot:actions>
      <v-btn
          variant="text"
          icon="mdi-close"
          @click="closeSnackbar()"
      />
    </template>
  </v-snackbar>
</template>
<script>
import {useAlertsStore} from "../../stores/alerts/index.js";
import {mapActions, mapState} from "pinia";

export default {
  computed: {
    ...mapState(useAlertsStore, ['snackbar'])
  },
  methods: {
    ...mapActions(useAlertsStore, ['closeSnackbar'])
  }
}
</script>
