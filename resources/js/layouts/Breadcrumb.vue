<template>
    <el-breadcrumb class="layout-navbars-breadcrumb-hide">
        <el-breadcrumb-item><Link :href="$route('dashboard')">Dashboard</Link></el-breadcrumb-item>
        <el-breadcrumb-item v-for="({link, title}) in links" :key="link">
            <Link v-if="link" :href="link" v-text="title"></Link>
            <span v-else v-text="title"></span>
        </el-breadcrumb-item>
    </el-breadcrumb>
</template>

<script>
import { inject } from 'vue'

export default {
    name: 'Breadcrumb',

    setup () {
        const links = inject('breadcrumbs');

        return { links };
    },
}
</script>
