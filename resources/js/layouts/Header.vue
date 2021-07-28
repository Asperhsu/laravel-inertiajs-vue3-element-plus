<template>
    <el-header class="layout-header" height="50px">
        <div class="layout-navbars-container">
            <div class="layout-navbars-breadcrumb-index">
                <div class="layout-navbars-breadcrumb">
                    <i class="layout-navbars-breadcrumb-icon"
                        :class="isCollapse ? 'el-icon-s-unfold' : 'el-icon-s-fold'"
                        @click="toggleCollapse"
                    ></i>
                    <Breadcrumb />
                </div>

                <div class="layout-navbars-breadcrumb-user">
                    <UserDropdown />
                </div>
            </div>
        </div>
    </el-header>
</template>

<script>
import { inject } from 'vue'
import Breadcrumb from '@/layouts/Breadcrumb.vue';
import UserDropdown from '@/layouts/UserDropdown.vue';

export default {
    name: 'LayoutHeader',
    components: { Breadcrumb, UserDropdown },

    setup () {
        const isCollapse = inject('isCollapse');
        const toggleCollapse = () => {
            isCollapse.value = !isCollapse.value;
        };

        return { isCollapse, toggleCollapse };
    },
}
</script>

<style scoped lang="scss">
.layout-navbars-container {
	display: flex;
	flex-direction: column;
	width: 100%;
	height: 100%;
}

.layout-navbars-breadcrumb-index {
	height: 50px;
	display: flex;
	align-items: center;
	padding-right: 15px;
	background: var(--bg-topBar);
	overflow: hidden;
	border-bottom: 1px solid #f1f2f3;
}

.layout-navbars-breadcrumb {
	flex: 1;
	height: inherit;
	display: flex;
	align-items: center;
	padding-left: 15px;
	.layout-navbars-breadcrumb-icon {
		cursor: pointer;
		font-size: 18px;
		margin-right: 15px;
		color: var(--bg-topBarColor);
	}
	.layout-navbars-breadcrumb-span {
		opacity: 0.7;
		color: var(--bg-topBarColor);
	}
	.layout-navbars-breadcrumb-iconfont {
		font-size: 14px;
		margin-right: 5px;
	}
	::v-deep(.el-breadcrumb__separator) {
		opacity: 0.7;
		color: var(--bg-topBarColor);
	}
}

.layout-navbars-breadcrumb-user {
	display: flex;
	align-items: center;
	justify-content: flex-end;
	&-link {
		height: 100%;
		display: flex;
		align-items: center;
		white-space: nowrap;
		&-photo {
			width: 25px;
			height: 25px;
			border-radius: 100%;
		}
	}
	&-icon {
		padding: 0 10px;
		cursor: pointer;
		color: var(--bg-topBarColor);
		height: 50px;
		line-height: 50px;
		display: flex;
		align-items: center;
		&:hover {
			background: rgba(0, 0, 0, 0.04);
			i {
				display: inline-block;
				animation: logoAnimation 0.3s ease-in-out;
			}
		}
	}
	::v-deep(.el-dropdown) {
		color: var(--bg-topBarColor);
	}
	::v-deep(.el-badge) {
		height: 40px;
		line-height: 40px;
		display: flex;
		align-items: center;
	}
	::v-deep(.el-badge__content.is-fixed) {
		top: 12px;
	}
}
</style>
