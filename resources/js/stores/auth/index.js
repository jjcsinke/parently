import {defineStore} from "pinia";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        loading: false,
        user: window.user ?? undefined,
        snackbar: {
            show: false,
            color: undefined,
            text: undefined
        }
    }),
    getters: {},
    actions: {
        login(form) {
            this.snackbar.show = false;
            this.loading = true;
            axios.post('/login', form, {baseURL: '/'})
                .then(({data}) => {
                    this.user = data;
                    location.replace('/portal');
                })
                .catch((error) => {
                    this.snackbar = {
                        show: true,
                        color: 'error',
                        text: error.response.data.message
                    }
                })
                .finally(() => {
                    this.loading = false;
                })
        },
        register(form) {
            this.loading = true;
            axios.post('/register', form, {baseURL: '/'})
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
