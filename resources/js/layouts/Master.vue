<template>
	<el-container class="layout-container">
		<Aside />
		<el-container class="flex-center layout-backtop">
			<el-scrollbar>
				<Header />

				<el-main class="layout-main">
                    <el-scrollbar class="layout-scrollbar">
                        <div class="h100">
                            <slot :key="$page.url" />
                        </div>
                    </el-scrollbar>
                </el-main>
			</el-scrollbar>
		</el-container>

		<el-backtop target=".layout-backtop .el-scrollbar__wrap"></el-backtop>
	</el-container>
</template>

<script>
import { provide, ref, onBeforeMount, watch } from 'vue';
import { ElNotification } from 'element-plus';
import Aside from '@/layouts/Aside.vue';
import Header from '@/layouts/Header.vue';

export default {
    name: 'MasterLayout',
    components: { Aside, Header },

    props: {
        flash: Object,
    },

    setup (props) {
        // isCollapse
        const isCollapse = ref(false);
        provide('isCollapse', isCollapse)

        // clientWidth
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

        // breadcrumb
        const breadcrumbs = ref([]);
        provide('breadcrumbs', breadcrumbs)

        // flash messages
        watch(() => props.flash.success, (message) => {
            message && ElNotification({ type: 'success', message: message });
        }, { immediate: true });
        watch(() => props.flash.error, (message) => {
            message && ElNotification({ type: 'error', message: message, duration: 0 });
        }, { immediate: true });
    },
}
</script>
