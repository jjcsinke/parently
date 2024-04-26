import {defineStore} from "pinia";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        loading: false,
        user: window.user ?? undefined,
    }),
    getters: {},
    actions: {
        login(email, password) {
            this.loading = true;
            axios.post('/login', {email, password}, {baseURL: '/'})
                .then(({data}) => {
                    this.user = data;
                    location.replace('/portal');
                })
                .catch(() => {
                    this.loading = false;
                })
        },
        logout() {
            axios.post('/logout', '', {baseURL: '/'})
                .then(() => {
                    location.replace('/');
                })
        }
    }
})
