<template>
    <teleport to="head">
        <title>Organizations</title>
    </teleport>

    <h1 style="margin-bottom: 1rem;">Organizations</h1>

    <div style="display: flex; align-items: center; margin-bottom: 1rem;">
        <div>
            <el-input placeholder="Search" v-model="form.search">
                <template #prefix>
                    <i class="el-input__icon el-icon-search"></i>
                </template>
                <template #suffix>
                    <i class="el-input__icon el-icon-close" @click="form.search = ''"></i>
                </template>
            </el-input>
        </div>

        <el-button type="primary" style="margin-left: auto;">
            <Link :href="$route('organizations.create')" as="span">Create</Link>
        </el-button>
    </div>

    <SortingTable
        v-model:loading="loading"
        v-model:orderBy="form.order_by"
        v-model:orderByAsc="form.order_asc"
        :data="organizations.data"
    >
        <el-table-column prop="name" label="Name" sortable="custom"></el-table-column>
        <el-table-column prop="city" label="City"></el-table-column>
        <el-table-column prop="phone" label="Phone"></el-table-column>
        <el-table-column label="操作">
            <template #default="scope">
                <Link :href="$route('organizations.edit', scope.row.id)">编辑</Link>
            </template>
        </el-table-column>
    </SortingTable>
</template>

<script>
import { inject, reactive, ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import throttle from 'lodash/throttle';
import SortingTable from '@/shared/SortingTable.vue';

export default {
    name: 'OrganizationIndex',
    components: { SortingTable },

    props: {
        filters: Object,
        organizations: Object,
    },

    setup (props) {
        inject('breadcrumbs').value = [{'title': 'Organizations'}];

        const loading = ref(false);

        const form = reactive({
            search: props.filters.search,
            order_by: props.filters.order_by,
            order_asc: props.filters.order_asc == 'true',
        });

        Inertia.on('start', () => loading.value = true);
        watch(
            () => ({...form}),
            throttle(() => {
                Inertia.get(
                    window.route('organizations.index'),
                    {...form},
                    { preserveState: true }
                );
            })
        );
        Inertia.on('finish', () => loading.value = false);

        return { loading, form };
    },
}
</script>
