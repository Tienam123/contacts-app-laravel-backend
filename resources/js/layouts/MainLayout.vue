<template>
    <TheHeader/>
    <main class="page">
    <slot/>
    </main>
    <TheFooter />
</template>

<script setup>

import TheHeader from "../ components/TheHeader.vue";
import TheFooter from "../ components/TheFooter.vue";
</script>

<style lang="scss" scoped>

</style>
