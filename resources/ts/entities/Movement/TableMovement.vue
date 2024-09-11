<template>
   <section class="w-fit">
      <table v-if="pageData.careers.length">
         <tr>
            <td class="w-20"></td>
            <td v-for="careerX in pageData.careers" class="text-center pb-3">
               {{ careerX.shortname }}
            </td>
         </tr>
         <tr v-for="careerY in pageData.careers">
            <td class="w-20">
               {{ careerY.shortname }}
            </td>
            <td class="border max-w-20 p-0.5" v-for="careerX in pageData.careers">
               <span v-if="careerY.id != careerX.id">
                  <VaInput class="w-full" v-model="formData[`${careerX.id}_${careerY.id}`]" type="number"
                     preset="bordered" :loading="pageData.loading" />
               </span>
               <span v-else>
                  <VaInput :model-value="2" class="w-full disabled:!bg-red-400" preset="bordered" disabled
                     :loading="pageData.loading" />
               </span>
            </td>
         </tr>
      </table>
      <VaSkeleton v-else height="530px" width="1040px" />
      <div class="mt-3 text-right">
         <VaButton @click="onSaveMovementChanges" :loading="pageData.save_loading">{{ t('message.save') }}</VaButton>
      </div>
   </section>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import MovementRepository from './MovementRepository'
import CareerRepository from '../Career/CareerRepository'
import { onMounted, reactive, ref, computed, watch } from 'vue';
import { useMovement } from '@movement/MovementStore';

const props = defineProps(['tab'])


const store = useMovement()

const pageData = reactive({
   careers: [],
   loading: false,
   save_loading: false,
})

const formData = ref({})

async function getCareers() {
   const { data } = await CareerRepository.index()
   pageData.careers = data
}


async function onSaveMovementChanges() {
   pageData.save_loading = true
   await MovementRepository.update(formData.value, props.tab)
   pageData.save_loading = false
}


async function getMovements() {
   formData.value = {}
   pageData.loading = true
   try {
      const result = await MovementRepository.index(props.tab)
      store.all = result.data

      pageData.careers.forEach((posY) => {

         pageData.careers.forEach((posX) => {
            if (posX.id != posY.id) {
               const current = result.data.find((movment) => movment.x_career_id == posX.id && movment.y_career_id == posY.id)
               formData.value[`${posX.id}_${posY.id}`] = current?.count
            }
         })

      })
      pageData.loading = false
   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}



watch(() => props.tab, async () => {
   getMovements()
})

onMounted(async () => {
   await getCareers()
   getMovements()
})
</script>