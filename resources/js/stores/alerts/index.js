import {defineStore} from "pinia";

export const useAlertsStore = defineStore('alerts', {
    state: () => ({
        alerts: [],
        snackbar: {
            show: false,
            color: undefined,
            text: undefined
        }
    }),
    actions: {
        showSnackbar({color, text}) {
            this.snackbar = {
                show: true,
                color,
                text
            }
        },
        closeSnackbar() {
            this.snackbar.show = false;
        }
    }
})
