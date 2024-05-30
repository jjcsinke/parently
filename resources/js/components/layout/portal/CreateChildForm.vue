<template>
  <v-form @submit.prevent="addChild(form)">
    <v-text-field v-model="form.name" label="Name" required></v-text-field>
    <v-text-field v-model="form.date_of_birth" label="Day of Birth" required placeholder="DD-MM-YYYY"></v-text-field>
    <v-btn type="submit" :disabled="loading" :loading="loading" color="primary">{{
        $t('portal.my-children.add')
      }}
    </v-btn>
  </v-form>
</template>
<script>
import {mapActions, mapState} from "pinia";
import {useChildrenStore} from "@/stores/children/index.js";

export default {
  data() {
    return {
      form: {
        name: '',
        date_of_birth: ''
      }
    }
  },
  computed: {
    ...mapState(useChildrenStore, ['loading']),
  },
  methods: {
    ...mapActions(useChildrenStore, ['addChild']),
  }
}
</script>
