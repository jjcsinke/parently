import {defineStore} from "pinia";

export const useParentStore = defineStore('parents', {
    state: () => ({
        loading: false,
        parents: [],
        parent: {},
        meta: {
            page: 1,
            per_page: 10,
            total: 0,
        }
    }),
    getters: {},
    actions: {
        async loadParents({page, itemsPerPage}) {
            if (this.loading) return;
            // if (!this.parents && page === this.meta.page && itemsPerPage === this.meta.per_page) return;

            this.loading = true;

            axios.get('/parents' + (page ? '?' + new URLSearchParams({page, per_page: itemsPerPage}).toString() : ''))
                .then(response => {
                    this.parents = response.data.data;
                    const {current_page, per_page, total} = response.data.meta;
                    this.meta = {page: current_page, per_page, total};
                })
                .catch(error => {
                    console.log(error.response.data);
                })
                .finally((response) => {
                    this.loading = false;
                });
        },
        async loadParent(id) {
            if (this.loading) return;

            this.loading = true;
            axios.get(`/parents/${id}`)
                .then(response => {
                    this.parent = response.data.data;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
})
