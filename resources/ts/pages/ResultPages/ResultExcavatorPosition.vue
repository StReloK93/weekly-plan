<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <BaseDateInput v-model="currentDate" @change="getPositions" />
      </aside>
      <aside class="relative flex-grow z-0">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <VaSkeleton v-if="pageData.loading" width="100%" height="100%" />
            <table v-else class="h-full w-full">
               <thead class="sticky top-0 bg-white z-10">
                  <tr class="bg-white">
                     <th class="min-w-20 border py-1" rowspan="2"> Nomi </th>
                     <th class="min-w-8 border py-1" rowspan="2"> № </th>
                     <th class="min-w-8 border py-1" rowspan="2">
                        <VaIcon name="dark_mode" />
                     </th>
                     <th v-for="day in daysList" class="w-20 text-sm border">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
                  <tr class="bg-white border">
                     <td v-for="day in daysList" class="min-w-32 text-sm text-center font-semibold border">
                        Место погрузки
                     </td>
                  </tr>
               </thead>
               <template v-for="(excavator, rowIndex) in pageData.excavators" :key="rowIndex">
                  <tr class="bg-stone-50">
                     <th class="min-w-28 text-sm border text-left px-1 border-b-gray-400" rowspan="2">
                        <span class="line-clamp-1">
                           {{ excavator.type.name }}
                        </span>
                     </th>
                     <th class="w-8 text-sm border border-b-gray-400" rowspan="2">
                        {{ excavator.garage_number }}
                     </th>
                     <th class="w-8 text-sm border">
                        1
                     </th>
                     <td class="text-sm border px-2 py-0.5" v-for="(day, colIndex) in daysList" :key="colIndex">
                        {{ renderer(formDataModels[`${excavator.id}_${day}_1`]['career_id']) }}
                     </td>
                  </tr>
                  <tr class="bg-gray-100">
                     <th class="w-8 text-sm border border-b-gray-400">
                        2
                     </th>
                     <td class="text-sm border px-2 py-0.5 border-b-gray-400" v-for="(day, colIndex) in daysList"
                        :key="colIndex">
                        {{ renderer(formDataModels[`${excavator.id}_${day}_2`]['career_id']) }}
                     </td>
                  </tr>
               </template>
            </table>
         </main>
      </aside>
   </section>
</template>

<script setup lang="ts">
import { getSurroundingDates, createExcavatorPositionModels } from '@modules/helpers';
import Repository from '@excavator-position/ExcavatorPositionRepository'
import HorizonRepository from '@/entities/Horizon/HorizonRepository';
import ExcavatorRepository from '@/entities/Excavator/ExcavatorRepository';
import moment from 'moment'
import { computed, onMounted, reactive, ref } from 'vue';
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})
const pageData = reactive({
   excavators: [],
   loading: true,
   horizons: [],
})

async function getPositions() {   
   pageData.loading = true
   formDataModels.value = createExcavatorPositionModels(daysList.value, pageData.excavators, [])
   try {
      const result = await Repository.index({
         startDay: daysList.value[0],
         endDay: daysList.value.at(-1)
      })
      pageData.loading = false
      formDataModels.value = createExcavatorPositionModels(daysList.value, pageData.excavators, result.data)

   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}
function renderer(horizon_id) {
   const horizon = pageData.horizons.find((option) => option.id == horizon_id)
   if(horizon) return `${horizon?.career?.shortname}_${horizon?.code}`
   else return ""
}

onMounted(async () => {
   HorizonRepository.index().then(({ data }) => pageData.horizons = data)
   const { data: excavators } = await ExcavatorRepository.index()
   pageData.excavators = excavators


   getPositions()
})
</script>