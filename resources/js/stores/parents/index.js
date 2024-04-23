import {defineStore} from "pinia";
import {getPagination, responseData, responsePagination, shouldMakeRequest} from "../helpers.js";

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
        async loadParents(props) {
            if (this.loading) return;
            const pagination = getPagination(props);

            if (!this.parents && !shouldMakeRequest(pagination, this.meta)) return;

            this.loading = true;

            axios.get('/parents' + '?' + new URLSearchParams(pagination).toString())
                .then(response => {
                    this.parents = responseData(response);
                    this.meta = responsePagination(response);
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
