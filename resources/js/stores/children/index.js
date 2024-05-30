import {defineStore} from "pinia";
import {getPagination, responseData, responsePagination, shouldMakeRequest} from "../helpers.js";

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
        async loadChildren(props = undefined )  {
            if (this.loading) return;
            const pagination = getPagination(props);
            if (!this.children && !shouldMakeRequest(pagination, this.meta)) return;

            this.loading = true;

            axios.get('/children' + '?' + new URLSearchParams(pagination).toString())
                .then(response => {
                    this.children = responseData(response);
                    this.meta = responsePagination(response);
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
        async addChild(payload) {
            if (this.loading) return;
            this.loading = true;
            axios.post('/children', payload)
                .then(response => {
                    this.children.unshift(response.data.data);
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
})
