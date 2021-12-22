require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { createI18n } from "vue-i18n";
import { createStore } from 'vuex'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
const { messages, datetimeFormats } = require('./i18n.js');
const store = createStore({ 
    state: {
        appLocale: localStorage.getItem("appLocale") || process.env.VUE_APP_I18N_LOCALE || 'en'
    },
    getters: {
        getAppLocale: (state) => state.appLocale
    },
    mutations: {
        setAppLocale(state, locale) {
            state.appLocale = locale;
            localStorage.setItem("appLocale", locale); // Whenever we change the appLocale we save it to the localStorage
        }
    }
});
const i18n = createI18n( { locale: store.getters.getAppLocale, messages, datetimeFormats} );

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(store)
            .use(i18n)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
