import { createI18n } from 'vue-i18n'
import en from "../lang/en.json";

const messages = {
    en
}
const i18n = createI18n({
    locale: 'en',
    fallbackLocale: 'en',
    messages
})

export default i18n;
