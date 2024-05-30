<template>
  <dashboard-page>
    <template v-slot:title>
      {{ $t('portal.my-children.add') }}
    </template>

      <v-row>
        <v-col cols="12">
          <create-child-form/>
        </v-col>
      </v-row>
  </dashboard-page>
</template>
<script>
import {defineComponent} from "vue";
import DashboardPage from "@/components/layout/dashboard/DashboardPage.vue";
import CreateChildForm   from "@/components/layout/portal/CreateChildForm.vue";
export default defineComponent({
  components: {DashboardPage, CreateChildForm},
})
</script>
