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
        appLocale: localStorage.getItem("appLocale") || process.env.VUE_APP_I18N_LOCALE || 'en',
        appTheme: localStorage.getItem("appTheme")
    },
    getters: {
        getAppLocale: (state) => state.appLocale,
        getAppTheme: (state) => state.appTheme
    },
    mutations: {
        setAppLocale(state, locale) {
            state.appLocale = locale;
            localStorage.setItem("appLocale", locale); // Whenever we change the appLocale we save it to the localStorage
        },
        setAppTheme(state, theme) {
            state.appTheme = theme;
            localStorage.setItem("appTheme", theme);

            if (theme === 'dark') {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        }
    }
});

if (store.getters.getAppTheme === 'dark') {
    document.documentElement.classList.add('dark')
} else {
    document.documentElement.classList.remove('dark')
}

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
