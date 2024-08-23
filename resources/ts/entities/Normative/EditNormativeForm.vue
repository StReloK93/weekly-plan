<template>
   <BaseForm :title="t('message.normativesedit')" width="880px" :loading="inputsLoading" :submit-method="update">
      <template v-slot:button="{ onClick }">
         <VaButton icon="edit" round preset="primary"  @click="onClick" ></VaButton>
      </template>
      <FormInputs ref="formInputs" :loading="inputsLoading" @vue:mounted="formMounted" />
   </BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { useNormative } from './NormativeStore';
import Repository from './NormativeRepository';
import BaseForm from '@/components/BaseForm.vue';
import FormInputs from './Inputs-Normative.vue';
import { ref } from 'vue';
const inputsLoading = ref(false)

const Store = useNormative()
const formInputs = ref()
async function update() {
   const formData = formInputs.value.formData
   const result = await Repository.update(formData, 1)
   Store.update(result.data)
}


async function getCurrent() {
   inputsLoading.value = true
   const formData = formInputs.value.formData

   const result = await Repository.show(1)
   const data = result.data

   formData.obed_po = data.obed_po
   formData.eto_po = data.eto_po
   formData.peresmenka_po = data.peresmenka_po
   formData.techno_pereriv_po = data.techno_pereriv_po

   formData.techno_pereriv_ac = data.techno_pereriv_ac
   formData.zapravka_ac = data.zapravka_ac
   formData.obed_ac = data.obed_ac
   formData.peresmenka_ac = data.peresmenka_ac
   formData.rezerv_ac = data.rezerv_ac
   formData.vzriv_ac = data.vzriv_ac

   formData.speed_ac = data.speed_ac
   formData.install_ac = data.install_ac
   formData.download_ac = data.download_ac
   formData.waiting_ac = data.waiting_ac

   formData.gruz_ac = data.gruz_ac
   formData.full_bort_ac = data.full_bort_ac
   inputsLoading.value = false
}

function formMounted() {
   getCurrent()
}
</script>