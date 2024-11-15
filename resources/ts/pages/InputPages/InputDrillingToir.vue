<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <BaseDateInput v-model="currentDate" @change="getDrillingPositions" />
      </aside>
      <aside class="relative flex-grow z-0">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <table v-if="pageData.loading == false" class="h-full w-full">
               <thead class="sticky top-0 bg-white z-10">
                  <tr class="bg-white border">
                     <th class="w-20 border  py-1"> Nomi </th>
                     <th class="w-8 border bg-white py-1"> № </th>
                     <th class="w-8 border bg-white py-1">
                        <VaIcon name="dark_mode" />
                     </th>
                     <th v-for="day in daysList" class="w-20 text-sm border bg-white">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
               </thead>
               <template v-for="(excavator, rowIndex) in pageData.drilling" :key="rowIndex">
                  <tr class="bg-stone-50">
                     <th class="w-16 text-sm border text-left px-1 border-b-gray-400" rowspan="2">
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
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <Column v-model="formDataModels[`${excavator.id}_${day}_1`]"
                           @save="onSaveChanges(excavator.id, day, 1, formDataModels[`${excavator.id}_${day}_1`])"
                           class=" border-r-gray-400" />
                     </template>
                  </tr>
                  <tr class="bg-gray-100">
                     <th class="w-8 text-sm border border-b-gray-400">
                        2
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <Column v-model="formDataModels[`${excavator.id}_${day}_2`]"
                           @save="onSaveChanges(excavator.id, day, 2, formDataModels[`${excavator.id}_${day}_2`])"
                           class=" border-r-gray-400 border-b-gray-400" />
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
import { getSurroundingDates,  createToirModels } from '@modules/helpers';
import Repository from '@/entities/DrillingToir/DrillingToirRepository'
import DrillingRepository from '@drilling/DrillingRepository';
import moment from 'moment'
import { computed, onMounted, reactive, ref } from 'vue';
import { useTableActions } from '@modules/useTableActions';
const { handleKeydown, setColumnRef, Column } = useTableActions()
const { SelectColumn } = useTableActions()
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})


const pageData = reactive({
   drilling: [],
   loading: true,
   horizons: []
})



async function onSaveChanges(drilling_id, day, change, value) {
   Repository.update({
      value: value,
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
      formDataModels.value = createToirModels(daysList.value, pageData.drilling, result.data, 'drilling_id')
      
   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}

onMounted(async () => {
   const { data: drilling } = await DrillingRepository.index()
   pageData.drilling = drilling

   getDrillingPositions()
})
</script>