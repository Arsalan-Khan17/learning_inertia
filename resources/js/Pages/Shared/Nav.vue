<template>
    <nav class="ml-6">
        <ul class="flex space-x-6">
            <li><NavLink href="/"  class="text-blue-500 hover-underline" :active="$page.component === 'Home'">Home</NavLink></li>
            <li><NavLink href="/users" class="text-blue-500 hover-underline" :active="$page.component === 'Users'">Users</NavLink></li>
            <li><NavLink href="/settings" class="text-blue-500 hover-underline" :active="$page.component === 'Setting'">Settings</NavLink></li>
        </ul>
    </nav>
</template>

<script setup>
import NavLink from "./NavLink.vue";
</script>

<style scoped>

</style>
