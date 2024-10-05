<template>
   <section class="flex flex-col h-full">
      <aside>
         <BaseDateInput v-model="currentDate" @change="getPageInformation" firstWeekday="Monday" class="bg-white" />
         <VaTabs v-model="selectedDay" class="mt-2">
            <template #tabs>
               <VaTab v-for="tab in daysList" :key="tab" :name="tab" class=" pt-1"
                  :class="{ 'bg-slate-200': tab >= moment(currentDate).format('YYYY-MM-DD') }">
                  {{ moment(tab).format('DD MMM') }}
                  <br>
               </VaTab>
            </template>
         </VaTabs>
      </aside>
      <aside class="relative flex-grow z-0">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <table v-if="pageData.loading == false" class="w-full">
               <thead class="sticky top-0 bg-white z-10">
                  <tr class="bg-white">
                     <th class="min-w-28 border py-1" colspan="100%"> {{ currentDateFormatted }} (1 - Smena)</th>
                  </tr>
                  <tr class="bg-white">
                     <th class="min-w-28 border py-1 text-xs px-1 text-left"> Гараж.№ </th>
                     <th class="min-w-28 border py-1 text-xs px-1 text-left"> O'.birligi </th>
                     <th v-for="excavator in pageData.excavators" class="w-20 text-sm border">
                        {{ excavator.garage_number }}
                     </th>
                  </tr>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Длина цикла" subTitle="мин">
                     <template #default="{ item }">
                        {{ item.type.full_time_ac}}
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Кол-во погрузок в час максимум" subTitle="ед">
                     <template #default="{ item }">
                        {{ (60/+item.type.full_time_ac).toFixed(1) }}
                     </template>
                  </PlanExcavaTruckRow>
               </thead>
               <tbody>
                  <PlanExcavaTruckRow class="bg-slate-200" :data="pageData.excavators" title="1 смена ГМ" :column="true"
                     subTitle="тыс. м3">
                     <template #default="{ item }">
                        <Column v-model="massa_one[`${item.id}_${selectedDay}`]"
                           @save="onSaveMassa(item.id, selectedDay, 1, $event)"
                           class="border-b-gray-400 border-white" />
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Место погрузки">
                     <template #default="{ item }">
                        <span v-if="career_one[`${item.id}_${selectedDay}`]" class="flex justify-center"
                           style="word-spacing: -4px;">
                           {{ career_one[`${item.id}_${selectedDay}`]?.career.shortname }}_{{
                              career_one[`${item.id}_${selectedDay}`]?.code }}
                        </span>
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Место разгрузки">
                     <template #default="{ item }">
                        {{ download_one[`${item.id}_${selectedDay}`]?.name }}
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Тип материала">
                     <template #default="{ item }">
                        {{ material_one[`${item.id}_${selectedDay}`]?.name }}
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Расстояние" subTitle="км">
                     <template #default="{ item }">
                        {{ distance_one?.[`${item.id}_${selectedDay}`] }}
                     </template>
                  </PlanExcavaTruckRow>


                  <tr class="bg-white">
                     <th class="min-w-28 border py-1" colspan="100%"> {{ currentDateFormatted }} (2 - Smena)</th>
                  </tr>



                  <PlanExcavaTruckRow class="bg-slate-200" :data="pageData.excavators" title="1 смена ГМ" :column="true"
                     subTitle="тыс. м3">
                     <template #default="{ item }">
                        <Column v-model="massa_two[`${item.id}_${selectedDay}`]"
                           @save="onSaveMassa(item.id, selectedDay, 2, $event)"
                           class="border-b-gray-400 border-white" />
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Место погрузки">
                     <template #default="{ item }">
                        <span v-if="career_two[`${item.id}_${selectedDay}`]" class="flex justify-center"
                           style="word-spacing: -4px;">
                           {{ career_two[`${item.id}_${selectedDay}`]?.career.shortname }}_{{
                              career_two[`${item.id}_${selectedDay}`]?.code }}
                        </span>
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Место разгрузки">
                     <template #default="{ item }">
                        {{ download_two[`${item.id}_${selectedDay}`]?.name }}
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Тип материала">
                     <template #default="{ item }">
                        {{ material_two[`${item.id}_${selectedDay}`]?.name }}
                     </template>
                  </PlanExcavaTruckRow>
                  <PlanExcavaTruckRow :data="pageData.excavators" title="Расстояние" subTitle="км">
                     <template #default="{ item }">
                        {{ distance_two?.[`${item.id}_${selectedDay}`] }}
                     </template>
                  </PlanExcavaTruckRow>
               </tbody>
            </table>
            <VaSkeleton v-else width="100%" height="100%" />
         </main>
      </aside>
   </section>
</template>

<script setup lang="ts">
import { getSurroundingDates, celebrate } from '@modules/helpers';
import ExcavatorRepository from '@/entities/Excavator/ExcavatorRepository';
import ExcavatorFactRepository from '@/entities/ExcavatorFact/ExcavatorFactRepository';
import ExcavatorPositionRepository from '@excavator-position/ExcavatorPositionRepository'
import { useTableActions } from '@modules/useTableActions';
import { computed, onMounted, reactive, ref } from 'vue';
import PlanExcavaTruckRow from '@/ui/PlanExcavaTruckRow.vue';
import { moment } from '@modules/moment'
const currentDate = ref(new Date())
const { Column } = useTableActions()
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const selectedDay = ref(daysList.value[0])
const formDataModels = ref({})


const currentDateFormatted = computed(() => moment(selectedDay.value).format('DD MMM'))
const pageData = reactive({
   loading: true,
   excavators: [],
   excavators_positions: [],
   excavators_facts: [],

})


function onSaveMassa(excavator_id, day, change, massa) {
   ExcavatorPositionRepository.updateMassa({
      excavator_id: excavator_id,
      day: day,
      change: change,
      massa: massa,
   })
}

async function getPageInformation() {
   formDataModels.value = {}
   pageData.loading = true
   try {
      const { data: excavators_position } = await ExcavatorPositionRepository.index({
         startDay: daysList.value[0],
         endDay: daysList.value.at(-1)
      })
      pageData.excavators_positions = excavators_position
      
      const { data: excavators_facts } = await ExcavatorFactRepository.index({
         startDay: daysList.value[0],
         endDay: daysList.value.at(-1)
      })

      pageData.excavators_facts = excavators_facts

      pageData.loading = false

   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}

const distance_one = computed(() => celebrate(pageData.excavators_positions, 'distance', 1))
const career_one = computed(() => celebrate(pageData.excavators_positions, 'horizon', 1))
const material_one = computed(() => celebrate(pageData.excavators_positions, 'material', 1))
const download_one = computed(() => celebrate(pageData.excavators_positions, 'down', 1))
const massa_one = computed(() => celebrate(pageData.excavators_positions, 'massa', 1))

const distance_two = computed(() => celebrate(pageData.excavators_positions, 'distance', 2))
const career_two = computed(() => celebrate(pageData.excavators_positions, 'horizon', 2))
const material_two = computed(() => celebrate(pageData.excavators_positions, 'material', 2))
const download_two = computed(() => celebrate(pageData.excavators_positions, 'down', 2))
const massa_two = computed(() => celebrate(pageData.excavators_positions, 'massa', 2))


onMounted(async () => {
   const { data: excavators } = await ExcavatorRepository.index()
   pageData.excavators = excavators
   pageData.loading = false


   getPageInformation()
})
</script>
