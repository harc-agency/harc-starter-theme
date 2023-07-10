<template>
<header style="display: flex; align-items: center; justify-content: space-between">
  <Link href="/">
    <h1>{{ props.site.name }}</h1>
  </Link>
  <nav>
    <ul>
      <li tabindex="0" v-for=" (link, index) in page.props.menu" :key="index">
        <!-- isCurrentUrl -->
        <Link
          :href="link.url"
          :class="{
            'text-primary': isCurrentUrl(link.url),
            'text-gray-500': !isCurrentUrl(link.url),
          }">
          {{ link.title }}
        </Link>
      </li>
    </ul>

    <Link href="/this-page-does-not-exist">404 Page</Link>
    <Link style="margin-left: 1rem" href="/sample-page">Sample Page</Link>
  </nav>
</header>
</template>

<script setup>
import Logo from "@/Shared/Logo.vue"
import { Link, usePage } from "@inertiajs/inertia-vue3"
import { onMounted, reactive } from "vue"

const page = reactive(usePage())

//make reactive
const isCurrentUrl = url => (new URL(url, window.location.origin)).pathname === window.location.pathname

onMounted(() => {

})
</script>

<style></style>
