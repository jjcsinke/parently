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
                .catch((error) => {
                    console.log(error)
                    useAlertsStore().showSnackbar({
                        color: 'error',
                        text: error.response.data.message
                    })
                })
                .finally(() => {
                    this.loading = false;
                    this.loadUser()
                })
        },
        async loadUser() {
            this.loading = true;
            axios.get('/account')
                .then(({data}) => {
                    this.user = data.data;
                })
                .catch((error) => {
                    location.replace('/login');
                })
                .finally(() => {
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
