<template>
    <div class="layout-logo">
        <Link class="mt-1" :href="$route('dashboard')">
            <img src="/images/logo.svg" style="max-height: 30px;" />
        </Link>
	</div>
</template>

<script>
export default {
    name: 'LayoutAsideLogo',
}
</script>

<style scoped lang="scss">
.layout-logo {
	width: 220px;
	height: 50px;
	display: flex;
	align-items: center;
	justify-content: center;
	box-shadow: rgb(0 21 41 / 2%) 0px 1px 4px;
	color: var(--color-primary);
	font-size: 16px;
	cursor: pointer;
	animation: logoAnimation 0.3s ease-in-out;
	&:hover {
		span {
			color: var(--color-primary-light-2);
		}
	}
	&-medium-img {
		width: 20px;
		margin-right: 5px;
	}
}
</style>
