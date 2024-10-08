<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <BaseDateInput v-model="currentDate" @change="getPositions" />
      </aside>
      <aside class="relative flex-grow z-0">
         <main class="absolute inset-0 overflow-y-auto thin-scroll">
            <table v-if="pageData.loading == false" class="h-full w-full">
               <thead class="sticky top-0 bg-white z-10">
                  <tr class="bg-white">
                     <th class="min-w-28 border py-1" rowspan="2"> Nomi </th>
                     <th class="min-w-8 border py-1" rowspan="2"> № </th>
                     <th class="min-w-8 border py-1" rowspan="2">
                        <VaIcon name="dark_mode" />
                     </th>
                     <th v-for="day in daysList" class="w-20 text-sm border" colspan="3">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
                  <tr class="bg-white border">
                     <template v-for="day in daysList">
                        <td class="min-w-24 text-sm text-center font-semibold border">
                           Место погрузки
                        </td>
                        <td class="min-w-24 text-sm text-center font-semibold border">
                           План на смену
                        </td>
                        <td class="min-w-24 text-sm text-center font-semibold border">
                           Тип материала
                        </td>
                     </template>
                  </tr>
               </thead>
               <template v-for="(excavator, rowIndex) in pageData.excavators" :key="rowIndex">
                  <tr class="bg-stone-50">
                     <th class="min-w-20 text-sm border text-left px-1 border-b-gray-400" rowspan="2">
                        <span class="line-clamp-1">
                           {{ excavator.type.name }}
                        </span>
                     </th>
                     <th class="w-8 text-sm border border-b-gray-400" rowspan="2">
                        {{ excavator.garage_number }}
                     </th>
                     <th class="w-8 text-sm border border-r-gray-600">
                        1
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <td class="text-sm border px-2 py-0.5">
                           {{ horizon_renderer(formDataModels[`${excavator.id}_${day}_1`]['career_id']) }}
                        </td>
                        <td class="text-sm border px-2 py-0.5">
                           {{ formDataModels[`${excavator.id}_${day}_2`]['massa'] }}
                        </td>
                        <td class="text-sm border px-2 py-0.5 border-r-gray-600">
                           {{ type_material_renderer(formDataModels[`${excavator.id}_${day}_1`]['type_material']) }}
                        </td>
                     </template>
                  </tr>
                  <tr class="bg-gray-100">
                     <th class="w-8 text-sm border border-b-gray-400 border-r-gray-600">
                        2
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <td class="text-sm border px-2 py-0.5 border-b-gray-400">
                           {{ horizon_renderer(formDataModels[`${excavator.id}_${day}_2`]['career_id']) }}
                        </td>
                        <td class="text-sm border px-2 py-0.5 border-b-gray-400">
                           {{ formDataModels[`${excavator.id}_${day}_2`]['massa'] }}
                        </td>
                        <td class="text-sm border px-2 py-0.5 border-b-gray-400 border-r-gray-600">
                           {{ type_material_renderer(formDataModels[`${excavator.id}_${day}_2`]['type_material']) }}
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
import { getSurroundingDates, createExcavatorPositionModels } from '@modules/helpers';
import Repository from '@excavator-position/ExcavatorPositionRepository'
import HorizonRepository from '@/entities/Horizon/HorizonRepository';
import ExcavatorRepository from '@/entities/Excavator/ExcavatorRepository';
import TypematerialRepository from '@/entities/Typematerial/TypematerialRepository';
import moment from 'moment'
import { computed, onMounted, reactive, ref } from 'vue';
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})


const pageData = reactive({
   excavators: [],
   loading: true,
   horizons: [],
   type_materials: [],
})

function horizon_renderer(horizon_id) {
   const horizon = pageData.horizons.find((option) => option.id == horizon_id)
   if (horizon) return `${horizon?.career?.shortname}_${horizon?.code}`
   else return ""
}

function type_material_renderer(horizon_id) {
   const material = pageData.type_materials.find((option) => option.id == horizon_id)
   if (material) return material.name
   else return ""
}

async function getPositions() {
   formDataModels.value = {}
   pageData.loading = true
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

onMounted(async () => {
   HorizonRepository.index().then(({ data }) => pageData.horizons = data)
   TypematerialRepository.index().then(({ data }) => pageData.type_materials = data)
   const { data: excavators } = await ExcavatorRepository.index()
   pageData.excavators = excavators

   formDataModels.value = createExcavatorPositionModels(daysList.value, pageData.excavators, [])

   getPositions()
})
</script>