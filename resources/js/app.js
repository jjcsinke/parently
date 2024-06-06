import "./bootstrap";
import { createApp } from "vue";
import App from "./components/App.vue";
import router from "./router.js";
import i18n from "./i18n.js";

import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import "@mdi/font/css/materialdesignicons.css";
import { aliases, mdi } from "vuetify/iconsets/mdi";
import { createPinia } from "pinia";

const myCustomLightTheme = {
  dark: false,
  colors: {
    background: "#FFFFFF",
    surface: "#FFFFFF",
    primary: "#6A9CD1",
    "primary-lighten": "#C3D7EC",
    secondary: "#03DAC6",
    error: "#B00020",
    info: "#2196F3",
    success: "#4CAF50",
    warning: "#FB8C00",
  },
};

const vuetify = createVuetify({
  icons: {
    defaultSet: "mdi",
    aliases,
    sets: {
      mdi,
    },
  },
  theme: {
    defaultTheme: "myCustomLightTheme",
    themes: {
      myCustomLightTheme,
    },
  },
  components: {
    ...components,
  },
  directives,
});

const pinia = createPinia();
const app = createApp(App);

app.use(vuetify).use(router).use(i18n).use(pinia).mount("#app");
