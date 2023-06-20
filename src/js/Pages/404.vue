<template>
<section>
    <h1>{{ props.content }}</h1>
</section>
</template>

<script setup>
import { usePage } from "@inertiajs/inertia-vue3"

const { props } = usePage()
</script>

<style></style>
