import {defineStore} from "pinia";

export const useSchoolsStore = defineStore('schools', {
    state: () => ({
        loading: false,
        schools: [],
        school: {},
        meta: {
            page: 1,
            per_page: 10,
            total: 0,
        }
    }),
    getters: {

    },
    actions: {
        async loadSchools({page, itemsPerPage} )  {
            if (this.loading) return;
            // if (page === this.meta.page && itemsPerPage === this.meta.per_page) return;

            this.loading = true;

            axios.get('/parents' + (page ? '?' + new URLSearchParams({page, per_page: itemsPerPage}).toString() : '') )
                .then(response => {
                    this.schools = response.data.data;
                    const {current_page, per_page, total} = response.data.meta;
                    this.meta = {page: current_page, per_page, total};
                })
                .finally((response) => {
                    this.loading = false;
                });
        },
        async loadSchool(id) {
            if (this.loading) return;

            this.loading = true;
            axios.get(`/parents/${id}`)
                .then(response => {
                    this.school = response.data.data;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
})
