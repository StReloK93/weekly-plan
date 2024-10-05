<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <BaseDateInput v-model="currentDate" @update="getDrillingPositions" />
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
                     <th v-for="day in daysList" class="w-20 text-sm border" colspan="4">
                        {{ moment(day).format('DD MMM') }}
                     </th>
                  </tr>
                  <tr class="bg-white border">
                     <template v-for="day in daysList">
                        <td class="min-w-24 text-sm text-center font-semibold border">
                           Место погрузки
                        </td>
                        <td class="min-w-24 text-sm text-center font-semibold border">
                           Место разгрузки
                        </td>
                        <td class="min-w-24 text-sm text-center font-semibold border">
                           Тип материала
                        </td>
                        <td class="min-w-24 text-sm text-center font-semibold border">
                           Расстояния
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
                     <th class="w-8 text-sm border">
                        1
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <SelectColumn v-for="item in options" :options="pageData[item.options]" picker="id"
                           v-model="formDataModels[`${excavator.id}_${day}_1`][item.model]"
                           @save="onSaveChanges(excavator.id, day, 1, formDataModels[`${excavator.id}_${day}_1`])"
                           :renderer="item.renderer" />

                        <Column v-model="formDataModels[`${excavator.id}_${day}_1`]['distance']"
                           @save="onSaveChanges(excavator.id, day, 1, formDataModels[`${excavator.id}_${day}_1`])"
                           class=" border-r-gray-400" />
                     </template>
                  </tr>
                  <tr class="bg-gray-100">
                     <th class="w-8 text-sm border border-b-gray-400">
                        2
                     </th>
                     <template v-for="(day, colIndex) in daysList" :key="colIndex">
                        <SelectColumn v-for="item in options" :options="pageData[item.options]" picker="id"
                           v-model="formDataModels[`${excavator.id}_${day}_2`][item.model]"
                           @save="onSaveChanges(excavator.id, day, 2, formDataModels[`${excavator.id}_${day}_2`])"
                           :renderer="item.renderer" class="border-b-gray-400" />
                        <Column v-model="formDataModels[`${excavator.id}_${day}_2`]['distance']"
                           @save="onSaveChanges(excavator.id, day, 2, formDataModels[`${excavator.id}_${day}_2`])"
                           class="border-b-gray-400 border-r-gray-400" />
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
import InputRudaRepository from '@/entities/InputRuda/InputRudaRepository';
import moment from 'moment'
import { computed, onMounted, reactive, ref } from 'vue';
import { useTableActions } from '@modules/useTableActions';
const { SelectColumn, Column } = useTableActions()
const currentDate = ref(new Date())
const daysList = computed(() => getSurroundingDates(currentDate.value, 7))

const formDataModels = ref({})


const pageData = reactive({
   excavators: [],
   loading: true,
   horizons: [],
   input_rudas: [],
   type_materials: [],
})

const options = [
   { model: 'career_id', options: 'horizons', renderer: (option) => `${option.career?.shortname}_${option.code}` },
   { model: 'download', options: 'input_rudas', renderer: (option) => `${option.name}` },
   { model: 'type_material', options: 'type_materials', renderer: (option) => `${option.name}` },
]

async function onSaveChanges(excavator_id, day, change, model) {

   Repository.update({
      career_id: model.career_id == "" ? null : model.career_id,
      download: model.download == "" ? null : model.download,
      type_material: model.type_material == "" ? null : model.type_material,
      distance: model.distance == "" ? null : model.distance,

      day: day,
      excavator_id: excavator_id,
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
      formDataModels.value = createExcavatorPositionModels(daysList.value, pageData.excavators, result.data)

   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}

onMounted(async () => {
   HorizonRepository.index().then(({ data }) => pageData.horizons = data)
   TypematerialRepository.index().then(({ data }) => pageData.type_materials = data)
   InputRudaRepository.index().then(({ data }) => pageData.input_rudas = data)
   const { data: excavators } = await ExcavatorRepository.index()
   pageData.excavators = excavators

   formDataModels.value = createExcavatorPositionModels(daysList.value, pageData.excavators, [])

   getDrillingPositions()
})
</script>