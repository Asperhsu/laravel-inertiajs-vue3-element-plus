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
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ElementPlus)
            .mixin({ methods: { ziggy: window.route } })
            .component('Link', Link)
            .mount(el);
    },
})
