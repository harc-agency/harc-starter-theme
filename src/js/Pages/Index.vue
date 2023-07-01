<template>
<!-- <details>
  <summary>
  </summary>
  <pre>{{ props.posts }}</pre>
</details> -->

<section class="py-10 bg-gray-50 overflow-hidden">
  <div class="container mx-auto px-4">
    <div class="py-16 px-8 bg-white rounded-3xl">
      <div class="max-w-7xl mx-auto">
        <div class="mb-12 md:max-w-4xl mx-auto text-center">
          <span class="inline-block mb-4 text-sm text-blue-500 font-bold uppercase tracking-widest">Blog</span>
          <h2 class="font-heading mb-6 text-4xl md:text-5xl lg:text-6xl text-gray-900 font-black tracking-tight">Resources and stories center</h2>
          <p class="md:max-w-md mx-auto text-gray-500 font-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Malesuada tellus vestibulum, commodo pulvinar.</p>
        </div>
        <div class="max-w-5xl mx-auto ">
          <div class="flex flex-wrap -m-5 mb-10">
            <!--  -->

            <div class="w-full p-5" v-for="post in props.posts" :key="post.ID">
              <div class="flex flex-wrap h-full bg-gray-100 overflow-hidden rounded-3xl">
                <div class="w-full md:w-1/2"><img class="w-full h-full object-cover" src="zanrly-assets/images/blog/blog4.png" alt=""></div>
                <div class="flex-1">
                  <div class="md:max-w-lg p-10 h-full">
                    <div class="flex flex-col justify-between h-full">
                      <div class="flex-initial mb-8">
                        <p class="mb-3 text-sm text-gray-500 font-bold">Design process • 4 min read</p>

                        <Link as="a" :href="post.post_name">
                          <h3 class="font-heading text-2xl text-gray-900 hover:text-gray-700 group-hover:underline font-black">{{post.post_title}}</h3>
                        </Link>

                        <p class="text-gray-500 font-bold">{{post.post_excerpt}}</p>
                      </div>
                      <div class="flex-initial">
                        <div class="flex flex-wrap -m-2">
                          <div class="w-full md:w-auto p-2">
                            <Link
                              as="a"
                              :href="post.post_name"
                              class="block w-full px-4 py-2.5 text-sm text-center text-white font-bold bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:ring-gray-600 rounded-full" >
                              Read More
                            </Link>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->
          </div>
        </div>
        <div class="flex flex-wrap md:justify-center -m-2">
          <div class="w-full md:w-auto p-2"><a class="block w-full px-12 py-3.5 text-lg text-center text-white font-bold bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-200 rounded-full" href="#">Read more News</a></div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3"

const { props } = usePage()
</script>

<style></style>
