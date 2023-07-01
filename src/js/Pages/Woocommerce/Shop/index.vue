<template>
<div id="shop">
  <div class="p-4 lg:p-20">
    <div class="flex justify-between">
      <h1>The Shop</h1>
      <Link href="/cart">
        <button class="bg-primary text-white px-4 py-2 rounded">
          Go to Cart
        </button>
      </Link>
    </div>

    <div v-html="page.props.products"></div>
  </div>
</div>
</template>

<script setup>
import { reactive,onMounted } from "vue"

import { Link, usePage } from "@inertiajs/inertia-vue3"
import { gsap } from "gsap"

const page = reactive(usePage())

onMounted(() => {

    gsap.fromTo(".product, .onsale", {
        opacity: 0,
        y: -100
    }, {
        opacity: 1,
        y: 0,
        stagger: 0.25,
        duration: 2
    })
})
</script>

<style lang="scss" >
#shop
 .woocommerce{

}
</style>