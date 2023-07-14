<template>
    <Head>
        <title>Users</title>
    </Head>
        <h1 class="text-3xl">Users</h1>


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
import Pagination from './Shared/Pagination.vue'
import {Link} from "@inertiajs/inertia-vue3";
defineProps({
    users : Object
})
</script>
<style scoped>

</style>
