<template>
  <v-row>
    <template v-for="child in children">
      <v-col cols="12" sm="4" md="3">
        <child-card :child="child" :key="child.id"/>
      </v-col>
    </template>
    <template v-if="!children.length && !loading">
      <v-col cols="12">
        <v-alert type="info" >
          {{ $t('portal.parent.no_children') }}
          <v-btn style="float:right;" :to="{name: 'children.create'}" color="white">{{ $t('portal.parent.add_child') }}</v-btn>
        </v-alert>
      </v-col>
    </template>
  </v-row>
</template>
<script>
import ChildCard from "@/components/parent/ChildCard.vue";
import {mapActions, mapState} from "pinia";
import {useChildrenStore} from "@/stores/children/index.js";

export default {
  components: {ChildCard},
  computed: {
    ...mapState(useChildrenStore, ['loading','children']),
  },
  methods: {
    ...mapActions(useChildrenStore, ['loadChildren']),
  },
  mounted() {
    this.loadChildren();
  }
}
</script>
