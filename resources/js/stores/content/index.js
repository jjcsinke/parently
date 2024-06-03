import { defineStore } from "pinia";

export const useContentStore = defineStore("content", {
  state: () => ({
    loading: [],
    pages: {},
    page: {},
  }),
  getters: {},
  actions: {
    clearPage() {
      this.page = {};
    },
    loadPage(page, parent = null) {
      const pageSlug = page;

      if (page[0] === "/") {
        page = page.slice(1);
      } else if (parent) {
        page = `${parent}/${page}`;
      }
      if (this.loading.indexOf(page) > -1) {
        return;
      }

      if (this.pages[page]) {
        if (parent) {
          this.page.content[pageSlug] = this.pages[page];
        } else {
          this.page = {
            content: {},
            ...this.pages[page],
          };
        }
        return;
      }

      this.loading.push(page);

      axios
        .get(`/page/${page}`)
        .then(({ data }) => {
          this.pages[page] = data.data;
          if (parent) {
            this.page.content[pageSlug] = this.pages[page];
          } else {
            this.page = {
              content: {},
              ...this.pages[page],
            };
          }
        })
        .finally(() => {
          this.loading.splice(this.loading.indexOf(page), 1);
        });
    },
  },
});
