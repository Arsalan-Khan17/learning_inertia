<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="Information about my app" head-key="description" >
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My App</h1>
                <p class="text-sm ml-4 text-">
                    Welcome Back , {{username}}
                </p>
            </div>

            <Nav/>
        </header>
    </section>

    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot/>

        </div>
    </section>
</template>

<script setup>

import Nav from './Nav.vue';
import {usePage} from "@inertiajs/inertia-vue3";
import {computed} from "vue";

 const username = computed(() => {
     return usePage().props.value.auth.user.username
 })
</script>

<style scoped>

</style>
