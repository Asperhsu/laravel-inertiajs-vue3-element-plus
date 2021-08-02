<template>
    <el-main>
        <h1 style="margin-bottom: 1rem;">
            <Link :href="$route('organizations.index')">Organizations</Link>
            <span> / Edit</span>
        </h1>

        <el-card>
            <Form :model="organization" @onSubmit="onSubmit">
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

    props: {
        organization: {
            type: Object,
            required: true,
        },
    },

    setup (props) {
        const onSubmit = (form) => {
            form.put(route('organizations.update', props.organization.id));
        };

        return { onSubmit };
    },
}
</script>
