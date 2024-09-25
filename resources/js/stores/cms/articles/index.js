import { defineStore } from "pinia";
import {
  getPagination,
  responseData,
  responsePagination,
  shouldMakeRequest,
} from "@/stores/helpers.js";

export const useCMSArticleStore = defineStore("cmsArticles", {
  state: () => ({
    loading: false,
    articles: {},
    article: {},
    meta: {
      page: 1,
      per_page: 10,
      total: 0,
    },
  }),
  getters: {},
  actions: {
    async loadArticles(props) {
      if (this.loading) return;
      // const pagination = getPagination(props);

      // console.log(pagination);
      // if (!this.articles && !shouldMakeRequest(pagination, this.meta)) return;

      this.loading = true;

      axios
        .get("/cms/articles")
        .then((response) => {
          this.articles = responseData(response);
          this.meta = responsePagination(response);
        })
        .catch((error) => {
          console.log(error.response.data);
        })
        .finally((response) => {
          this.loading = false;
        });
    },
  },
});
