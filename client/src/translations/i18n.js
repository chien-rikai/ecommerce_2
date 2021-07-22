import i18n from 'i18next';
import Backend from 'i18next-http-backend';
import { initReactI18next } from 'react-i18next';

import common_en from './en/common.json';
import common_vi from './vi/common.json';

const resources = {
    en: {
        translation: common_en
    },
    vi: {
        translation: common_vi
    }
};

i18n.use(Backend).use(initReactI18next).init({
    resources,
    lng: localStorage.getItem('lang') ? localStorage.getItem('lang') : 'en',
    fallbackLng: localStorage.getItem('lang') ? localStorage.getItem('lang') : 'en',
    debug: true,
    interpolation: {
        escapeValue: false
    }
});

export default i18n;