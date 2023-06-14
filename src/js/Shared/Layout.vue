<template>
  <Header />
  <!-- force main to fill in the remaining space of header and footer -->
  <main>
    <slot></slot>
  </main>
  <Footer />
</template>

<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<style></style>
