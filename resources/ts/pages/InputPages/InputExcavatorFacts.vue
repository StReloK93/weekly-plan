<template>
   <section class="flex flex-col h-full">
      <aside class="pb-3">
         <VaDateInput v-model="currentDate" @update:modelValue="getExcavatorFacts" class="bg-white" />
      </aside>
      <aside class="relative flex-grow">
         <main class="absolute inset-0 overflow-y-auto">
            <table v-if="pageData.loading == false" class="h-full w-full">
               <thead class="sticky top-0">
                  <tr class="bg-white border border-gray-400">
                     <td class="w-16 text-sm border border-gray-400 text-center" rowspan="2">
                        EKG №
                     </td>
                     <td v-for="day in daysList" class="w-20 text-sm text-center font-semibold border border-gray-400" colspan="2">
                        {{ moment(day).format('DD MMM') }}
                     </td>
                  </tr>
                  <tr class="bg-white">
                     <template v-for="day in daysList">
                        <td class="w-20 text-sm text-center border border-gray-400">
                           {{ $t('inputs.plan') }}
                        </td>
                        <td class="w-20 text-sm text-center font-semibold border border-gray-400">
                           {{ $t('inputs.fact') }}
                        </td>
                     </template>
                  </tr>
               </thead>
               <tr v-for="(excavator, rowIndex) in pageData.excavators" :key="rowIndex">
                  <td class="min-w-16 text-sm font-semibold text-center border">
                     {{ excavator.garage_number }}
                  </td>
                  <template v-for="(day, colIndex) in daysList" :key="colIndex">
                     <Column tabindex="0" @keydown="handleKeydown(rowIndex, convertIndex(colIndex), $event)"
                        :ref="el => setColumnRef(el, rowIndex, convertIndex(colIndex))"
                        v-model="formDataModels[`${excavator.id}_${day}`].plan"
                        class="bg-white border-x-2 border-l-blue-200 focus:outline"
                        @save="(value) => onSaveChanges(excavator, day, value, 'plan')" />
                     <Column tabindex="0" class="focus:outline"
                        v-model="formDataModels[`${excavator.id}_${day}`].fact"
                        @keydown="handleKeydown(rowIndex, convertIndex(colIndex, 1), $event)"
                        :ref="el => setColumnRef(el, rowIndex, convertIndex(colIndex, 1))"
                        @save="(value) => onSaveChanges(excavator, day, value, 'fact')" />
                  </template>
               </tr>
            </table>
            <VaSkeleton v-else width="100%" height="100%" />
         </main>
      </aside>
   </section>
</template>

<script setup lang="ts">
import { getSurroundingDates, convertIndex, createExcavatorFactsModels } from '@modules/helpers';
import ExcavatorFactRepository from '@excavator-fact/ExcavatorFactRepository'
import ExcavatorRepository from '@excavator/ExcavatorRepository'
import moment from 'moment'
import { computed, onMounted, reactive, ref } from 'vue';
import { useTableActions } from '@modules/useTableActions';
const { handleKeydown, setColumnRef , Column } = useTableActions()
const currentDate = ref(new Date())

const formDataModels = ref({})


const pageData = reactive({
   excavators: [],
   loading: true,
   excavator_facts: []
})

const daysList = computed(() => getSurroundingDates(currentDate.value, 7))


async function onSaveChanges(excavator, day, value, type) {
   const formData = { excavator_id: excavator.id, day: day }
   formData[type] = value

   ExcavatorFactRepository.update(formData, type)
}

async function getExcavatorFacts() {
   formDataModels.value = {}
   pageData.loading = true
   try {
      const result = await ExcavatorFactRepository.index({
         startDay: daysList.value[0],
         endDay: daysList.value.at(-1)
      })
      pageData.excavator_facts = result.data
      pageData.loading = false
      formDataModels.value = createExcavatorFactsModels(pageData.excavators, daysList.value, pageData.excavator_facts)
   } catch (error) {
      console.error(error)
      pageData.loading = false
   }
}

async function getExcavators() {
   const { data } = await ExcavatorRepository.index()
   pageData.excavators = data
   formDataModels.value = createExcavatorFactsModels(pageData.excavators, daysList.value, [])
}

onMounted(async () => {
   await getExcavators()
   getExcavatorFacts()
})
</script>