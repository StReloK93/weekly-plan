<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <BaseDateInput v-model="currentDate" @change="getDrillingPositions"/>
      </aside>
      <aside class="relative flex-grow z-0">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <table v-if="pageData.loading == false" class="h-full w-full">
               <thead class="sticky top-0 bg-white z-10">
                  <tr class="bg-white border">
                     <th class="w-16 border  py-1"> Nomi </th>
                     <th class="w-8 border bg-white py-1"> № </th>
                     <th class="w-8 border bg-white py-1"> <VaIcon name="dark_mode" /></th>
                     <th v-for="day in daysList" class="w-20 text-sm border bg-white">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
               </thead>
               <template v-for="(drilling, rowIndex) in pageData.drillings" :key="rowIndex">
                  <tr  class="bg-stone-50">
                     <th class="w-24 text-sm border text-left px-1 border-b-gray-400" rowspan="2">
                        <span class="line-clamp-1">
                           {{ drilling.type.name }}
                        </span>
                     </th>
                     <th class="w-8 text-sm border border-b-gray-400"  rowspan="2">
                        {{ drilling.garage_number }}
                     </th>
                     <th class="w-8 text-sm border">
                        1
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <td class="text-sm border px-2 py-0.5 ">
                           {{ horizon_renderer(formDataModels[`${drilling.id}_${day}_1`]) }}
                        </td>
                     </template>
                  </tr>
                  <tr class="bg-gray-100">
                     <th class="w-8 text-sm border border-b-gray-400">
                        2
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <td class="text-sm border px-2 py-0.5 border-b-gray-400">
                           {{ horizon_renderer(formDataModels[`${drilling.id}_${day}_2`]) }}
                        </td>
                     </template>
                  </tr>
               </template>
            </table>
            <VaSkeleton v-else width="100%" height="100%" />
         </main>
      </aside>
   </section>
</template>

<script setup lang="ts">
import { getSurroundingDates, createDrillingPositionModels } from '@modules/helpers';
import Repository from '@drilling-position/DrillingPositionRepository'
import HorizonRepository from '@/entities/Horizon/HorizonRepository';
import DrillingRepository from '@/entities/Drilling/DrillingRepository';
import moment from 'moment'
import { computed, onMounted, reactive, ref } from 'vue';
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})


const pageData = reactive({
   drillings: [],
   loading: true,
   horizons: []
})

function horizon_renderer(horizon_id) {
   const horizon = pageData.horizons.find((option) => option.id == horizon_id)
   if (horizon) return `${horizon?.career?.shortname}_${horizon?.code}`
   else return ""
}

async function getDrillingPositions() {
   pageData.loading = true
   formDataModels.value = createDrillingPositionModels(daysList.value, pageData.drillings, [])
   try {
      const result = await Repository.index({
         startDay: daysList.value[0],
         endDay: daysList.value.at(-1)
      })
      pageData.loading = false
      formDataModels.value = createDrillingPositionModels(daysList.value, pageData.drillings, result.data)
      
   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}

onMounted(async () => {
   const { data: horisons } = await HorizonRepository.index()
   pageData.horizons = horisons
   const { data: drillings } = await DrillingRepository.index()
   pageData.drillings = drillings

   getDrillingPositions()
})
</script>