<template>
    <layout>
        <h1 class="text-3xl">Home</h1>
    </layout>
</template>

<script>
import Layout from './Shared/layout.vue';
export default {
    name: "Home",
    components : {
        Layout
  },
  props : {
        name: String,
  }
}
</script>

<style scoped>

</style>
