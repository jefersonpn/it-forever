import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// Import your component
// Example: import Navigation from './components/Navigation.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        // Create the Vue app instance
        const app = createApp({ render: () => h(App, props) });

        // Register the Navigation component globally
        // Example: app.component('nav-section', Navigation);

        // Use plugins and mount the app
        app.use(plugin)
           .use(ZiggyVue)
           .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
