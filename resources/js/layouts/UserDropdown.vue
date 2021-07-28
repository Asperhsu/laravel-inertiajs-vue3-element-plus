<template>
    <el-dropdown>
        <span class="layout-navbars-breadcrumb-user-link">
            <img src="" class="layout-navbars-breadcrumb-user-link-photo mr5" />
            User
            <i class="el-icon-arrow-down el-icon--right"></i>
        </span>
        <template #dropdown>
            <el-dropdown-menu>
                <el-dropdown-item>黄金糕</el-dropdown-item>
                <el-dropdown-item>狮子头</el-dropdown-item>
                <el-dropdown-item>螺蛳粉</el-dropdown-item>
                <el-dropdown-item disabled>双皮奶</el-dropdown-item>
                <el-dropdown-item divided>蚵仔煎</el-dropdown-item>
            </el-dropdown-menu>
        </template>
    </el-dropdown>
</template>

<script>
export default {
    name: 'LayoutHeaderUserDropdown',
}
</script>
