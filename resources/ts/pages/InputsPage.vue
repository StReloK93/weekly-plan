<template>
   <section class="flex">
      <VaSidebar>
         <VaSidebarItem v-for="page in childRoutes" :to="{ name: page.name }" :active="$route.name == page.name">
            <VaSidebarItemContent>
               <VaIcon :name="page.meta.icon" />
               <VaSidebarItemTitle>{{ t(page.meta.text) }}</VaSidebarItemTitle>
            </VaSidebarItemContent>
         </VaSidebarItem>
      </VaSidebar>
      <section class="relative flex-grow">
         <div class="absolute inset-0">
            <VaScrollContainer class="h-full p-3" vertical>
               <RouterView />
            </VaScrollContainer>
         </div>
      </section>
   </section>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { useI18n } from 'vue-i18n'
import { useRouter } from 'vue-router';
const { t } = useI18n({ useScope: 'global' })
const router = useRouter()


// Найти маршрут по имени
const selectedRoute = router.getRoutes().find(r => r.name === 'inputs');

// Получаем дочерние маршруты
const childRoutes: any = computed(() => {
   if (selectedRoute) {
      return selectedRoute.children || [];
   }
   return [];
});
</script>