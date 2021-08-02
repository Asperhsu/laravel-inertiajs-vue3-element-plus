<template>
    <el-main>
        <h1 style="margin-bottom: 1rem;">
            <Link :href="$route('organizations.index')">Organizations</Link>
            <span> / Create</span>
        </h1>

        <el-card>
            <Form @onSubmit="onSubmit">
                <el-form-item #default="props">
                    <el-button native-type="submit" type="primary"
                        :disabled="props.processing" :loading="props.processing">
                        <span>Save</span>
                    </el-button>
                </el-form-item>
            </Form>
        </el-card>
    </el-main>
</template>

<script>
import route from '@/helpers/route.js';
import Form from './Form.vue';

export default {
    components: { Form },

    setup () {
        const onSubmit = (form) => {
            form.post(route('organizations.store'));
        };

        return { onSubmit };
    },
}
</script>
