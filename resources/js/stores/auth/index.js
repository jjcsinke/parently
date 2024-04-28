import {defineStore} from "pinia";
import {useAlertsStore} from "../alerts/index.js";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        loading: false,
        user: window.user ?? undefined,
    }),
    getters: {},
    actions: {
        login(form) {
            this.loading = true;
            axios.post('/login', form, {baseURL: '/'})
                .then(({data}) => {
                    this.user = data;
                    location.replace('/portal');
                })
                .catch((error) => {
                    useAlertsStore().showSnackbar({
                        color: 'error',
                        text: error.response.data.message
                    })
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
