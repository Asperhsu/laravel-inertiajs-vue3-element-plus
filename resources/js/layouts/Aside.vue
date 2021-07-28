<template>
	<el-aside class="layout-aside" :class="collapseWidth" v-if="clientWidth > 1000">
		<Logo />
		<el-scrollbar class="flex-auto" ref="layoutAsideScrollbarRef">
			<Menu :class="collapseWidth" />
		</el-scrollbar>
	</el-aside>

	<el-drawer v-model="isCollapse" :with-header="false" direction="ltr" size="220px" v-else>
		<el-aside class="layout-aside w100 h100">
			<Logo />
			<el-scrollbar class="flex-auto" ref="layoutAsideScrollbarRef">
				<Menu />
			</el-scrollbar>
		</el-aside>
	</el-drawer>
</template>

<script>
import { ref, inject, computed, onBeforeMount } from 'vue'
import Logo from './Logo.vue';
import Menu from './Menu.vue';

export default {
    name: 'LayoutAside',
    components: { Logo, Menu },

    setup () {
        const clientWidth = inject('clientWidth');
        const isCollapse = inject('isCollapse');
        const collapseWidth = computed(() => isCollapse.value ? 'layout-aside-width1' : 'layout-aside-width-default');

        return { clientWidth, isCollapse, collapseWidth };
    }
}
</script>
