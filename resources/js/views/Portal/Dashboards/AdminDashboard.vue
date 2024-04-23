<template>
  <v-container>

    <h1>{{ $t('portal.dashboard.admin') }}</h1>
    <v-row>
      <v-col>
        <v-card>
          <v-card-title>School stats</v-card-title>
          <v-card-text>
            {{ placeholder }}
          </v-card-text>
        </v-card>
      </v-col>
      <v-col>
        <v-card>
          <v-card-title>Children stats</v-card-title>
          <v-card-text>
            {{ placeholder }}
          </v-card-text>
        </v-card>
      </v-col>
      <v-col>
        <v-card>
          <v-card-title>Notifications</v-card-title>
          <v-card-text>
            {{ placeholder }}
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  name: 'AdminDashboard',
  data() {
    return {
      placeholder: "Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
    };
  },
};
</script>
