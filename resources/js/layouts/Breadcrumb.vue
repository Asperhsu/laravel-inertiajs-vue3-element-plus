<template>
  <el-breadcrumb class="layout-navbars-breadcrumb-hide">
    <el-breadcrumb-item><Link :href="ziggy('dashboard')">Dashboard</Link></el-breadcrumb-item>
    <el-breadcrumb-item>活动管理</el-breadcrumb-item>
    </el-breadcrumb>
</template>

<script>
export default {
    name: 'LayoutHeaderBreadcrumb',
}
</script>
