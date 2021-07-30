<template>
    <teleport to="head">
        <title>Organizations</title>
    </teleport>

    <el-main>
        <h1 style="margin-bottom: 1rem;">Organizations</h1>

        <SearchTable
            :resource="$route('organizations.index')"
            :filters="filters"
            :paginator="organizations"
        >
            <el-table-column type="index"></el-table-column>
            <el-table-column prop="name" label="Name" sortable="custom"></el-table-column>
            <el-table-column prop="city" label="City"></el-table-column>
            <el-table-column prop="phone" label="Phone"></el-table-column>
            <el-table-column label="操作">
                <template #default="scope">
                    <Link :href="$route('organizations.edit', scope.row.id)">编辑</Link>
                </template>
            </el-table-column>

            <template #header-suffix>
                <el-button type="primary" style="margin-left: auto;">
                    <Link :href="$route('organizations.create')" as="span">Create</Link>
                </el-button>
            </template>
        </SearchTable>

    </el-main>
</template>

<script>
import { inject } from 'vue';
import SearchTable from '@/shared/SearchTable.vue';

export default {
    name: 'OrganizationIndex',
    components: { SearchTable },

    props: {
        filters: Object,
        organizations: Object,
    },

    setup (props) {
        inject('breadcrumbs').value = [{'title': 'Organizations'}];
    },
}
</script>
