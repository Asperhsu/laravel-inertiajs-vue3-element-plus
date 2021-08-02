<template>

</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { inject, onMounted } from 'vue'
import route from '@/helpers/route.js';

export default {
    setup () {
        const rootMenu = inject('rootMenu');

        const chnageMenuActive = () => {
            let menuIndexes = Object.keys(rootMenu.items.value);

            for (let index of menuIndexes) {
                if (route().current(index) || route().current(index + '.*')) {
                    rootMenu.activeIndex.value = index;
                    return;
                }
            }
        };

        Inertia.on('navigate', (event) => {
            chnageMenuActive();
        });

        onMounted(() => {
            chnageMenuActive();
        });
    },
}
</script>
