<template>
	<el-container class="layout-container">
		<Aside />
		<el-container class="flex-center layout-backtop">
			<el-scrollbar ref="layoutDefaultsScrollbarRef">
				<Header />

				<el-main class="layout-main">
                    <el-scrollbar class="layout-scrollbar">
                        <div class="h100">
                            <slot />
                        </div>
                    </el-scrollbar>
                </el-main>
			</el-scrollbar>
		</el-container>

		<el-backtop target=".layout-backtop .el-scrollbar__wrap"></el-backtop>
	</el-container>
</template>

<script>
import Aside from '@/layouts/Aside.vue';
import Header from '@/layouts/Header.vue';
import { provide, ref, onBeforeMount } from 'vue';

export default {
    name: 'MasterLayout',
    components: { Aside, Header },

    setup () {
        const isCollapse = ref(false);
        provide('isCollapse', isCollapse)

        const clientWidth = ref(0);
        provide('clientWidth', clientWidth)
        const onLayoutResize = () => {
            clientWidth.value = document.body.clientWidth;
            if (clientWidth.value < 1000) {
                isCollapse.value = false;
            }
        };

        onBeforeMount(() => {
			onLayoutResize();
			window.addEventListener('resize', onLayoutResize);
		});
    },
}
</script>
