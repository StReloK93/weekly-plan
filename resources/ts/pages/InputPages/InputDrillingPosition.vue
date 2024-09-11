<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <VaDateInput v-model="currentDate" @update:modelValue="getDrillingPositions" class="bg-white" />
      </aside>
      <aside class="relative flex-grow">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <table v-if="pageData.loading == false" class="h-full w-full">
               <thead class="sticky top-0">
                  <tr class="bg-white border">
                     <th class="w-16 border py-1"> Nomi </th>
                     <th class="w-8 border py-1"> № </th>
                     <th class="w-8 border py-1"> <VaIcon name="dark_mode" /></th>
                     <th v-for="day in daysList" class="w-20 text-sm border">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
               </thead>
               <template v-for="(drilling, rowIndex) in pageData.drillings" :key="rowIndex">
                  <tr  class="bg-stone-50">
                     <th class="w-16 text-sm border text-left px-1 border-b-gray-400" rowspan="2">
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
                        <SelectColumn :options="pageData.horizons" picker="id" v-model="formDataModels[`${drilling.id}_${day}_1`]"
                           @save="(value) => onSaveChanges(drilling.id, day, 1, value)"
                           :renderer="(option) => `${option.career?.shortname}_${option.code}`" />
                     </template>
                  </tr>
                  <tr class="bg-gray-100">
                     <th class="w-8 text-sm border border-b-gray-400">
                        2
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <SelectColumn :options="pageData.horizons" picker="id" v-model="formDataModels[`${drilling.id}_${day}_2`]"
                           @save="(value) => onSaveChanges(drilling.id, day,2,  value)"
                           :renderer="(option) => `${option.career?.shortname}_${option.code}`" class="border-b-gray-400" />
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
import { useTableActions } from '@modules/useTableActions';
const { SelectColumn } = useTableActions()
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})


const pageData = reactive({
   drillings: [],
   loading: true,
   horizons: []
})



async function onSaveChanges(drilling_id, day, change,  career_id) {
   Repository.update({
      career_id: career_id == "" ? null : career_id,
      day: day,
      drilling_id: drilling_id,
      change: change,
   })
}

async function getDrillingPositions() {
   formDataModels.value = {}
   pageData.loading = true
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