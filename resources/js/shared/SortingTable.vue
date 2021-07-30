<template>
    <el-table
        v-loading="loading"
        :data="data"
        :default-sort="{
            prop: orderBy,
            order: orderByAsc ? 'ascending' : 'descending'
        }"
        @sortChange="sortChange"
        v-bind="$attrs">
        <slot />
    </el-table>
</template>

<script>
import useVModel from '@/helpers/useVModel.js'

export default {
    emits: ['update:loading', 'update:orderBy', 'update:orderByAsc', 'sortChange'],

    props: {
        data: null,
        loading: {
            type: Boolean,
            default: false,
        },
        orderBy: {
            type: String,
            default: null,
        },
        orderByAsc: {
            type: Boolean,
            default: true,
        },
    },

    setup (props, {emit}) {
        const orderBy = useVModel(props, 'orderBy');
        const orderByAsc = useVModel(props, 'orderByAsc');
        const sortChange = ({ column, prop, order }) => {
            orderBy.value = prop;
            orderByAsc.value = order === 'ascending';
            emit('sortChange', { column, prop, order });
        };

        return { orderBy, orderByAsc, sortChange };
    },
}
</script>
