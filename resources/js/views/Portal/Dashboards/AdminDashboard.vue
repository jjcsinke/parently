<template>
  <v-container>
    <h1>{{ $t("portal.dashboard.admin") }}</h1>
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
    <test-component />
    <v-row>
      <v-col cols="12">
        <h1>Articles</h1>
      </v-col>
      <template v-for="article in articles">
        <v-col>
          <h2>{{ article.slug }}</h2>
        </v-col>
      </template>
    </v-row>
  </v-container>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { useCMSArticleStore } from "@/stores/cms/articles/index.js";
import { TestComponent } from "laravel-cms/components";

export default {
  name: "AdminDashboard",
  components: { TestComponent },
  data() {
    return {
      placeholder:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
    };
  },
  computed: {
    ...mapState(useCMSArticleStore, ["loading", "articles", "meta"]),
  },
  methods: {
    ...mapActions(useCMSArticleStore, ["loadArticles"]),
  },
  mounted() {
    this.loadArticles(this.meta);
  },
};
</script>
