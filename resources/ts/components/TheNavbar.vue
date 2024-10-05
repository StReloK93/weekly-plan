<template>
   <VaNavbar class="shadow-sm pages">
      <template #left>
         <VaNavbarItem class="hidden sm:block">
            <VaIcon name="web_stories" size="20px" class="scale-150" color="primary" />
         </VaNavbarItem>
      </template>
      <template #center>
         <VaNavbarItem class="hidden sm:block">
            <RouterLink :to="{ name: 'home' }">
               {{ t('message.indexpage') }}
            </RouterLink>
         </VaNavbarItem>
         <VaNavbarItem class="hidden sm:block">
            <RouterLink :to="{ name: 'guides' }">
               {{ t('message.guidepage') }}
            </RouterLink>
         </VaNavbarItem>
         <VaNavbarItem class="hidden sm:block">
            <RouterLink :to="{ name: 'inputs' }">
               {{ t('message.inputpage') }}
            </RouterLink>
         </VaNavbarItem>
         <VaNavbarItem class="hidden sm:block">
            <RouterLink :to="{ name: 'plans' }">
               {{ t('message.planpage') }}
            </RouterLink>
         </VaNavbarItem>
         <VaNavbarItem class="hidden sm:block">
            {{ t('message.resultpage') }}
         </VaNavbarItem>
      </template>
      <template #right>
         <VaButtonToggle v-model="locale" preset="secondary" color="#333" toggle-color="primary" :options="languages" />
      </template>
   </VaNavbar>
</template>

<script setup lang="ts">
import { computed, watch } from 'vue';
import { useI18n } from 'vue-i18n'
const { locale, availableLocales, t } = useI18n()

const languages = computed(() => availableLocales.map((locale) => {
   return { label: locale.toLocaleUpperCase(), value: locale }
}))

if (localStorage.getItem('locale')) {
   const userLocale = localStorage.getItem('locale')
   
   locale.value = userLocale
}
watch(() => locale.value, (newValue) => {
   localStorage.setItem('locale', newValue)
})
</script>