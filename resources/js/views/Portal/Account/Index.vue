<template>
  <dashboard-page>
    <template v-slot:title>
      {{ $t('portal.account.title') }}
    </template>
    <v-row>
      <v-col cols="12" md="6">
        <v-card>
          <v-card-title>
            {{ $t('portal.account.info') }}
          </v-card-title>
          <v-card-text>
            <v-table density="comfortable">
              <tr>
                <td>{{ $t('portal.account.name') }}</td>
                <td> {{ user?.name }}</td>
              </tr>
              <tr>
                <td>{{ $t('portal.account.email') }}</td>
                <td>{{ user?.email }}</td>
              </tr>
              <tr>
                <td>{{ $t('portal.account.type') }}</td>
                <td>{{ user?.type }}</td>
              </tr>
            </v-table>
          </v-card-text>
        </v-card>
      </v-col>
      <v-col cols="12" md="6">
        <v-card>
          <v-card-title>
            {{ $t('portal.my-children.add') }}
          </v-card-title>
          <v-card-text>
            <create-child-form/>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </dashboard-page>
</template>
<script>
import DashboardPage from "@/components/layout/dashboard/DashboardPage.vue";
import CreateChildForm from "@/components/layout/portal/CreateChildForm.vue";
import {useAuthStore} from "@/stores/auth/index.js";
import {mapState} from "pinia";

export default {
  components: {DashboardPage, CreateChildForm},
  computed: {
    ...mapState(useAuthStore, ['user'])
  }
}
</script>
