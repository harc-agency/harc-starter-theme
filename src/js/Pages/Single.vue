<template>
<article :id="props.post.id" class="post p-4">
  <header class="entry-header mb-4">
    <!--
        Back to main blog page link
     -->
    <div class="mb-4">
      <Link as="a" href="/blog" class="text-sm text-gray-700 hover:text-gray-900">
        &larr; All Posts
      </Link>
    </div>
    <h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1">
      <a :href="props.post.post_link" rel="bookmark">{{ props.post.post_title }}</a>
    </h1>
    <time :datetime="postDate" itemprop="datePublished" class="text-sm text-gray-700">{{ postFormattedDate }}</time>
  </header>
  <div class="entry-content">
    <div v-html="props.post.post_content"></div>
    <div class="page-links" v-if="hasPages">
      <span class="page-links-title">{{ pageLinksTitle }}</span>
      <span v-for="(page, index) in pageLinks" :key="index">
        <span v-if="page.link" v-html="page.link"></span>
        <span v-else>{{ page.text }}</span>
        <span v-if="index < pageLinks.length - 1">{{ separator }}</span>
      </span>
    </div>
  </div>
</article>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3"

const { props } = usePage()
</script>

<style></style>
