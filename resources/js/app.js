import { createApp, h } from 'vue'
import {createInertiaApp, Head} from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Layout from './Pages/Shared/Layout.vue';

createInertiaApp({
    resolve: async (name) => {
        const page = await resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/**/*.vue")
        )

        page.default.layout = page.default.layout || Layout

        return page
    },
        setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin).component('Head',Head)
            .mount(el)
    },
    title :  title => 'My App - ' + title
})
