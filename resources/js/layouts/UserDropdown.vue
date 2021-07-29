<template>
    <el-dropdown>
        <span class="el-dropdown-link">
            {{ $page.props.auth.user.name }}
            <i class="el-icon-arrow-down el-icon--right"></i>
        </span>
        <template #dropdown>
            <el-dropdown-menu>
                <el-dropdown-item @click="logoutForm.post($route('logout'))">Logout</el-dropdown-item>
            </el-dropdown-menu>
        </template>
    </el-dropdown>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    name: 'LayoutHeaderUserDropdown',

    setup () {
        const logoutForm = useForm();

        return { logoutForm };
    },
}
</script>

<style>
    .el-dropdown-link {
        cursor: pointer;
        color: #409EFF;
    }
    .el-icon-arrow-down {
        font-size: 12px;
    }
</style>
