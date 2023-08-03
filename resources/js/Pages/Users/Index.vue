<template>
    <Head>
        <title>Users</title>
    </Head>

    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl">Users</h1>
            <Link href="/users/create" class="text-blue-500 text-lg ml-3">New User</Link>
        </div>
        <input v-model="search" type="text" placeholder="Search...." class="border px-2 rounded-lg">
    </div>


    <div class="max-w-3xl mt-3">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-4 py-4 border-b" v-for="user in users.data" :key="user.id">
                <div class="flex items-center">
                    <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">{{user.name}}</div>
                    </div>
                    <div class="flex-grow"></div>
                    <Link :href="`user/${user.id}/edit`" class="text-indigo-500 hover:text-indigo-900">
                        Edit
                    </Link>
                </div>
            </div>

        </div>
    </div>

    <!--  Start Pagination -->
            <Pagination :links="users.links" class="mt-6" />
    <!--  End Pagination-->

</template>

<script setup>

import Pagination from '../Shared/Pagination.vue'
import {Link, usePage} from "@inertiajs/inertia-vue3";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import debounce from "lodash/debounce";
defineProps({
    users : Object,
    filter:Object
})

let search = ref( usePage().props.value.filters.search);
watch(search,debounce(function(value){
    Inertia.get('/users',{search:value},{preserveState:true,replace:true});
},300));
</script>
<style scoped>

</style>
