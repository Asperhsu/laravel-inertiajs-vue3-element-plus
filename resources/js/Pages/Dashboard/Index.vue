<template>
    <teleport to="head">
        <title>Dashboard</title>
    </teleport>

    <h3>{{ $route().current() }}</h3>
</template>

<script>
import { inject } from 'vue'

export default {
    name: 'Dashboard',

    setup () {
        const breadcrumbs = inject('breadcrumbs');
        breadcrumbs.value = [{'title': 'xxx'}];
    }
}
</script>
