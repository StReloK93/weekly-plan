<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <BaseDateInput v-model="currentDate" @change="getExcavatorFacts" />
      </aside>
      <aside class="relative flex-grow">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <table v-if="pageData.loading == false" class="h-full w-full">
               <thead class="sticky top-0 z-50">
                  <tr class="bg-white border">
                     <th class="w-16 border py-1"> № </th>
                     <th v-for="day in daysList" class="w-20 text-sm border">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
               </thead>
               <tr v-for="(number, rowIndex) in pageData.numbers" :key="rowIndex">
                  <th class="w-16 text-sm border bg-white ">
                     {{ number }}
                  </th>
                  <template v-for="(day, colIndex) in daysList" :key="colIndex">
                     <td class="text-sm border px-2 py-0.5 border-b-gray-400">
                        {{ horizon_renderer(formDataModels[`${number}_${day}`]) }}
                     </td>
                  </template>
               </tr>
            </table>
            <VaSkeleton v-else width="100%" height="100%" />
         </main>
      </aside>
   </section>
</template>

<script setup lang="ts">
import { getSurroundingDates, createExplosionModels, numberToArray } from '@modules/helpers';
import Repository from '@explosion/ExplosionRepository'
import HorizonRepository from '@/entities/Horizon/HorizonRepository';
import moment from 'moment'
import { computed, onMounted, reactive, ref } from 'vue';
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})


const pageData = reactive({
   numbers: numberToArray(25),
   loading: true,
   horizons: []
})


function horizon_renderer(horizon_id) {
   const horizon = pageData.horizons.find((option) => option.id == horizon_id)
   if (horizon) return `${horizon?.career?.shortname}_${horizon?.code}`
   else return ""
}

async function getExcavatorFacts() {
   formDataModels.value = {}
   pageData.loading = true
   try {
      const result = await Repository.index({
         startDay: daysList.value[0],
         endDay: daysList.value.at(-1)
      })
      pageData.loading = false
      formDataModels.value = createExplosionModels(daysList.value, pageData.numbers, result.data)
   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}

onMounted(async () => {
   const { data } = await HorizonRepository.index()
   pageData.horizons = data
   getExcavatorFacts()
})
</script>