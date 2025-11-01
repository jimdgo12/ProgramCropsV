import './bootstrap'; 
import '../css/app.css'; 

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
// import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue');
        return pages[`./Pages/${name}.vue`]();
    },
    
    // ✨ FUNCIÓN SETUP CON INYECCIÓN DE ZIGGY ✨
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin);

        // 🛑 CLAVE: Inyectar la función 'route' de Ziggy como '$route'
        if (typeof window.route === 'function') {
            app.config.globalProperties.$route = window.route;
        }

        app.mount(el);
    },
});