import {defineStore} from "pinia";

export const useChildrenStore = defineStore('children', {
    state: () => ({
        loading: false,
        children: [],
        child: {},
        meta: {
            page: 1,
            per_page: 10,
            total: 0,
        }
    }),
    getters: {

    },
    actions: {
        async loadChildren({page, itemsPerPage} )  {
            if (this.loading) return;
            // if (page === this.meta.page && itemsPerPage === this.meta.per_page) return;

            this.loading = true;

            axios.get('/children' + (page ? '?' + new URLSearchParams({page, per_page: itemsPerPage}).toString() : '') )
                .then(response => {
                    this.children = response.data.data;
                    const {current_page, per_page, total} = response.data.meta;
                    this.meta = {page: current_page, per_page, total};
                    return this.meta;
                })
                .finally((response) => {
                    this.loading = false;
                });
        },
        async loadChild(id) {
            if (this.loading) return;

            this.loading = true;
            axios.get(`/children/${id}`)
                .then(response => {
                    this.child = response.data.data;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
})
