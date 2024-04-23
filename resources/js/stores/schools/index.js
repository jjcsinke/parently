import {defineStore} from "pinia";
import {getPagination, responseData, responsePagination, shouldMakeRequest} from "../helpers.js";

export const useSchoolsStore = defineStore('schools', {
    state: () => ({
        loading: false,
        schools: [],
        school: {},
        meta: {
            page: 0,
            per_page: 0,
            total: 0,
        }
    }),
    getters: {

    },
    actions: {
        async loadSchools(props)  {
            if (this.loading) return;
            const pagination = getPagination(props)
            if (!shouldMakeRequest(pagination, this.meta)) return;

            this.loading = true;

            axios.get('/schools' + '?' + new URLSearchParams(pagination).toString())
                .then(response => {
                    this.schools = responseData(response);
                    this.meta = responsePagination(response);
                })
                .finally((response) => {
                    this.loading = false;
                });
        },
        async loadSchool(id) {
            if (this.loading) return;

            this.loading = true;
            axios.get(`/schools/${id}`)
                .then(response => {
                    this.school = response.data.data;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
})
