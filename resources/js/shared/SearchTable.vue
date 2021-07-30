<template>
    <el-card class="search-table" :body-style="{ padding: 0, }">
        <template #header>
            <el-row>
                <slot name="header-prefix"></slot>

                <div>
                    <el-input placeholder="Search" v-model="params.search">
                        <template #prefix><i class="el-input__icon el-icon-search"></i></template>
                        <template #suffix><i class="el-input__icon el-icon-close" @click="params.search = null"></i></template>
                    </el-input>
                </div>

                <slot name="header-suffix"></slot>
            </el-row>
        </template>

        <SortingTable
            :loading="loading"
            v-model:orderBy="params.order_by"
            v-model:orderByAsc="params.order_asc"
            :data="paginator.data"
        >
            <slot />
        </SortingTable>

        <div style="margin: 1rem">
            <el-pagination
                background
                layout="prev, pager, next, ->, total"
                :total="paginator.total"
                :pageSize="paginator.per_page"
                v-model:currentPage="params.page"
            ></el-pagination>
        </div>
    </el-card>
</template>

<script>
import { reactive, ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import throttle from 'lodash/throttle';
import SortingTable from '@/shared/SortingTable.vue';

export default {
    components: { SortingTable },
    emits: ['onUpdatePaginator'],

    props: {
        resource: {
            type: String,
            required: true,
        },
        filters: {
            type: Object,
            default: () => ({}),
        },
        paginator: {
            type: Object,
            required: true,
        },
    },

    setup (props, {emit}) {
        const loading = ref(false);

        const params = reactive({
            page: props.paginator.current_page,
            search: props.filters.search,
            order_by: props.filters.order_by,
            order_asc: (typeof props.filters.order_asc !== 'undefined') && props.filters.order_asc == 'true',
        });

        if (props.resource) {
            Inertia.on('start', () => loading.value = true);
            watch(
                () => ({...params}),
                throttle(() => {
                    emit('onUpdatePaginator', params);

                    Inertia.get(
                        props.resource,
                        {...params},
                        { preserveState: true }
                    );
                })
            );
            Inertia.on('finish', () => loading.value = false);
        }

        return { loading, params };
    },
}
</script>
