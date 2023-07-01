<template>
<div>
  <div class="p-4 lg:p-20 relative">
    <div class="relative">
      cart
      <svg
        id="cart-icon"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
      </svg>
    </div>
    <div v-html="page.props.woocommerce_cart"></div>
  </div>
</div>
</template>

<script setup>
import { reactive, onMounted } from "vue"
import { usePage } from "@inertiajs/inertia-vue3"
import { gsap } from "gsap"

const page = reactive(usePage())

onMounted(()=>{

    gsap.fromTo("#cart-icon", {
        duration: 2,
        opacity: 0,
        x: -100
    }, {
        duration: 2,
        opacity: 1,
        x: 0,
        stagger: 2,
        ease: "power2.out"
    })
})
</script>

<style lang="scss">
.woocommerce{
    .product-remove{
        @apply
        text-red-500
        lg:text-4xl
        ;
    }
}
</style>