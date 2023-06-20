<template>
<section>
    <div>
        <h3>{{ page.props.post.post_title }}</h3>
        <div v-html="page.props.post.post_content"></div>
    </div>
</section>
</template>

<script setup>
import { usePage } from "@inertiajs/inertia-vue3"
import { reactive } from "vue"

const page = reactive(usePage())
</script>

<style scoped >

</style>
