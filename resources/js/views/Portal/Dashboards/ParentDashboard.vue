<template>
  <dashboard-page>
    <template v-slot:title>
      {{ $t('portal.dashboard.parent') }}
    </template>

    <my-children/>
  </dashboard-page>
</template>
<script>
import MyChildren from "@/components/parent/MyChildren.vue";
import DashboardPage from "@/components/layout/dashboard/DashboardPage.vue";

export default {
  components: {DashboardPage, MyChildren}
}

</script>
