import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import ElementPlus from 'element-plus';
import MasterLayout from '@/layouts/Master.vue';

InertiaProgress.init();

createInertiaApp({
    resolve: name => {
        const page = require(`./pages/${name}`).default;
        if (page.layout === undefined) {
            page.layout = MasterLayout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.config.globalProperties.$route = window.route;
        app.use(plugin);
        app.use(ElementPlus);
        app.component('Link', Link);
        app.mount(el);
    },
})
