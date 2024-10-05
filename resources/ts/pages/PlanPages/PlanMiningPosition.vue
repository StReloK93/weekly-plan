<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <BaseDateInput v-model="currentDate" @change="getPageInformation"/>
      </aside>
      <aside class="relative flex-grow z-0">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <table v-if="pageData.loading == false" class="h-full w-full">
               <thead class="sticky top-0 bg-white z-10">
                  <tr class="bg-white">
                     <th class="min-w-28 border py-1"> Nomi </th>
                     <th class="min-w-28 border py-1"> Gorizont </th>
                     <th v-for="day in daysList" class="w-20 text-sm border">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <template v-for="(horizons, career) in pageData.horizons">
                     <template v-for="(horizon, index) in horizons">
                        <tr class="bg-stone-50">
                           <th v-if="index == 0" :rowspan="horizons.length"
                              class="min-w-20 text-sm border text-left px-1 border-b-gray-400 bg-white">
                              {{ career }}
                           </th>
                           <th class="min-w-20 text-sm border border-b-gray-400 bg-white">
                              {{ horizon.code }}
                           </th>
                           <template v-for="(day, colIndex) in daysList" :key="colIndex">
                              <td class="min-w-20 text-sm border border-b-gray-400 bg-white text-center">
                                 {{ formDataModels[`${horizon.id}_${day}`].first }}
                              </td>
                           </template>
                        </tr>
                     </template>
                  </template>
               </tbody>
            </table>
            <VaSkeleton v-else width="100%" height="100%" />
         </main>
      </aside>
   </section>
</template>

<script setup lang="ts">
import { getSurroundingDates, createTimetableModels } from '@modules/helpers';
import HorizonRepository from '@/entities/Horizon/HorizonRepository';
import { moment } from '@modules/moment'
import Repository from '@/entities/Timetable/TimetableRepository';
import { computed, onMounted, reactive, ref } from 'vue';
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})

const pageData: any = reactive({
   loading: true,
   horizons: {},
})

async function getPageInformation() {
   formDataModels.value = {}
   pageData.loading = true
   try {
      const result = await Repository.index({
         startDay: daysList.value[0],
         endDay: daysList.value.at(-1)
      })
      pageData.loading = false
      formDataModels.value = createTimetableModels(daysList.value, pageData.horizons, result.data)

   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}

onMounted(async () => {
   const result = await HorizonRepository.allByGroup()
   pageData.horizons = result
   formDataModels.value = createTimetableModels(daysList.value, pageData.horizons, [])
   pageData.loading = false
   getPageInformation()
})
</script>
