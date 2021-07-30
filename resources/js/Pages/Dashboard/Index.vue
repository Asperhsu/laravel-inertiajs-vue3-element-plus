<template>
    <teleport to="head">
        <title>Dashboard</title>
    </teleport>

    <h3>Dashboard</h3>
</template>

<script>
import { inject } from 'vue'

export default {
    name: 'Dashboard',

    setup () {
        inject('breadcrumbs').value = [{'title': 'xxx'}];
    }
}
</script>
