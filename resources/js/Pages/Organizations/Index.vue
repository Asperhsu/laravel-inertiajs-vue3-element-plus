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
            <el-table-column label="Actions">
                <template #default="scope">
                    <el-space>
                        <el-link type="primary" icon="el-icon-edit"
                            @click.prevent="$inertia.get($route('organizations.edit', scope.row.id))">
                            Edit
                        </el-link>

                        <el-popconfirm title="Are you sure you want to delete this organization?"
                            @confirm="$inertia.delete($route('organizations.destroy', scope.row.id))">
                            <template #reference>
                                <el-link type="danger" icon="el-icon-delete" @click.prevent="">Delete</el-link>
                            </template>
                        </el-popconfirm>
                    </el-space>
                </template>
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
