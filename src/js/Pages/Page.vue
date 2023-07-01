<template>
<section class="">
  <div class="p-2 lg:p-20
        bg-gradient-to-r from-ternary to-ternary via-[#39c840]
        text-white
    ">
    <h2 class="mb-4 lg:mb-10">
      Page: {{ page.props.post.post_title }}
    </h2>
    <div
      class="bg-white text-black p-5 rounded-md shadow-md">
      <div v-html="page.props.post.post_content" />
    </div>
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
