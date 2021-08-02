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
                <el-space #default="scope">
                    <el-link type="primary" icon="el-icon-edit"
                        @click.prevent="$inertia.get($route('organizations.edit', scope.row.id))">
                        编辑
                    </el-link>
                    <el-link type="danger" icon="el-icon-delete"
                        @click.prevent="destroy(scope.row.id)">
                        刪除
                    </el-link>
                </el-space>
            </el-table-column>

            <template #header-suffix>
                <el-button type="primary" style="margin-left: auto;"
                    @click="$inertia.get($route('organizations.create'))">
                    Create
                </el-button>
            </template>
        </SearchTable>

    </el-main>
</template>

<script>
import { inject } from 'vue';
import { Inertia } from '@inertiajs/inertia';
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

        const destroy = (id) => {
            if (confirm('Are you sure you want to delete this organization?')) {
                Inertia.delete(route('organizations.destroy', id))
            }
        };

        return { destroy };
    },
}
</script>
