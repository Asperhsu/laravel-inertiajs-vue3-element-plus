<template>

</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { getCurrentInstance, inject, onMounted } from 'vue'

export default {
    setup () {
        const vm = getCurrentInstance().proxy
        const rootMenu = inject('rootMenu');

        const chnageMenuActive = () => {
            let menuIndexes = Object.keys(rootMenu.items.value);

            for (let index of menuIndexes) {
                if (vm.$route().current(index) || vm.$route().current(index + '.*')) {
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
