<template>
   <slot name="button" :onClick="onClick"></slot>
   <VaModal v-model="model" :max-width="props.width" no-padding hide-default-actions no-outside-dismiss blur>
      <VaForm @submit.prevent="handleSubmit" ref="baseForm" class="flex flex-col" @vue:mounted="formMounted">
         <header class="p-3 bg-gray-100 font-semibold text-base">
            {{ title }}
         </header>
         <VaDivider class="!my-0" />
         <main class="max-h-[600px] scroll-container overflow-y-auto p-3">
            <slot></slot>
         </main>
         <VaDivider class="!my-0" />
         <footer class="p-3 text-right bg-gray-100">
            <VaButton preset="primary" @click="model = false" class="mr-3">{{ t(props.cancelAction) }}</VaButton>
            <VaButton type="submit" :loading="loading || props.loading">{{ t(props.toggleAction) }}</VaButton>
         </footer>
      </VaForm>
   </VaModal>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { useForm } from 'vuestic-ui'
import { ref } from 'vue'
const model = ref(false)
const loading = ref(false)
const props = defineProps({
   loading: { type: Boolean },
   toggleAction: { type: String, default: 'message.save' },
   cancelAction: { type: String, default: 'message.close' },
   title: { type: String, required: true },
   submitMethod: { type: Function, required: true },
   width: { type: String, default: '460px' },
})

function onClick() {
   model.value = true
}

const { isValid, validate } = useForm('baseForm')

async function handleSubmit() {
   validate()
   if (isValid.value) {
      loading.value = true
      try {
         await props.submitMethod()
         model.value = false
      } catch (error) {
         loading.value = false
      }
   }
}


function formMounted(){
   loading.value = false
}
</script>