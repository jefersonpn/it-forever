import './bootstrap';
import '../css/app.css';
import '../css/style.css';

// Import Bootstrap's CSS and JS
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

// Import your component
import ContactForm from './Components/ContactForm.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        // Create the Vue app instance
        const app = createApp({
            render: () => h(App, props),
            data() {
                return {
                    toastMessage: '',
                    toastType: '',
                };
            },
            methods: {
                handleFormSubmission({ type, message }) {
                    this.toastType = type;
                    this.toastMessage = message;
                    this.showToast();
                },
                showToast() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-top-right',
                        timeOut: '5000',
                    };

                    toastr[this.toastType](this.toastMessage);
                },
            }
        });

        // Register the Navigation component globally
        app.component('contact-form', ContactForm);

        // Use plugins and mount the app
        app.use(plugin)
           .use(ZiggyVue)
           .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
