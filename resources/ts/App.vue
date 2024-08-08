<template>
   <section class="h-screen flex flex-col">
      <TheNavbar />
      <RouterView class="flex-grow" />
   </section>
</template>

<script setup lang="ts">
import TheNavbar from '@/components/TheNavbar.vue'
</script>