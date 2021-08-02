<template>
    <el-form label-width="10em" :rules="rules" :model="form" @submit.prevent="onSubmit">
        <el-form-item label="Name" prop="name" :error="form.errors.name">
            <el-input
                type="text"
                v-model="form.name"
                clearable
            >
            </el-input>
        </el-form-item>

        <el-form-item label="Email" prop="email" :error="form.errors.email">
            <el-input
                type="text"
                v-model="form.email"
                clearable
            >
            </el-input>
        </el-form-item>

        <el-form-item label="Phone" prop="phone" :error="form.errors.phone">
            <el-input
                type="text"
                v-model="form.phone"
                clearable
            >
            </el-input>
        </el-form-item>

        <el-form-item label="Address" prop="address" :error="form.errors.address">
            <el-input
                type="text"
                v-model="form.address"
                clearable
            >
            </el-input>
        </el-form-item>

        <el-form-item label="City" prop="city" :error="form.errors.city">
            <el-input
                type="text"
                v-model="form.city"
                clearable
            >
            </el-input>
        </el-form-item>

        <el-form-item label="Region" prop="region" :error="form.errors.region">
            <el-input
                type="text"
                v-model="form.region"
                clearable
            >
            </el-input>
        </el-form-item>

        <el-form-item label="Country" prop="country" :error="form.errors.country">
            <el-select v-model="form.country" placeholder="请选择">
                <el-option label="Canada" value="CA" />
                <el-option label="US" value="United States" />
            </el-select>
        </el-form-item>

        <el-form-item label="Postal code" prop="postal_code" :error="form.errors.postal_code">
            <el-input
                type="text"
                v-model="form.postal_code"
                clearable
            >
            </el-input>
        </el-form-item>

        <slot :form="form" />
    </el-form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    emits: ['update:form', 'onSubmit'],

    props: {
        form: null,
        model: {
            type: Object,
            default: () => ({}),
        },
    },

    setup (props, {emit}) {
        const form = useForm({
            name: props.model.name,
            email: props.model.email,
            phone: props.model.phone,
            address: props.model.address,
            city: props.model.city,
            region: props.model.region,
            country: props.model.country,
            postal_code: props.model.postal_code,
        });
        emit('update:form', form);

        const rules = {
            name: { required: true },
        };

        const onSubmit = () => {
            emit('onSubmit', form);
        };

        return { form, rules, onSubmit };
    },
}
</script>
