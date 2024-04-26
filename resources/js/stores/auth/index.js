import {defineStore} from "pinia";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        loading: false,
        user: window.user ?? undefined,
    }),
    getters: {},
    actions: {
        logout() {
            axios.post('/logout', '', {baseURL: '/'})
                .then(() => {
                    location.replace('/');
                })
        }
    }
})
