<template>
<div>
  <div class="p-4 lg:p-20">
    <div class="flex justify-between">
      <h1
        class="text-lg lg:text-4xl font-bold">
        {{props.product.name}}
      </h1>
      <Link
        class="btn  text-sm "
        :href="'/cart'">
        To Cart
      </Link>
    </div>
    <div v-html="props.wc_product"></div>
  </div>
</div>
</template>

<script setup>

import { Link, usePage } from "@inertiajs/inertia-vue3"
import { reactive, onMounted } from "vue"
const { props } = reactive(usePage())

</script>

<style lang="scss">
.woocommerce{
    .added_to_cart{
        @apply btn hover:bg-primary justify-center items-center;
    }
    button.single_add_to_cart_button{
        @apply btn hover:bg-primary justify-center items-center;
    }

}
</style>