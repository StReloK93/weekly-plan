<template>
   <main class="flex justify-between">
      <AddDrillingForm />
      <VaInput v-model="tableParams.filter" preset="bordered" class="w-44" firstWeekday="Monday" :placeholder="t('message.search')">
         <template #appendInner>
            <VaIcon name="search" color="secondary" />
         </template>
      </VaInput>
   </main>
   <VaDataTable class="pt-3" :no-data-html="t('message.noDataHtml')" :loading="tableParams.loading"
      :filter="tableParams.filter" :items="store.all" :columns="TruckColumns" :per-page="tableParams.perPage"
      :current-page="tableParams.currentPage" striped>
      <template #cell(actions)="{ row }">
         <EditDrillingForm :id="row.source.id" />
         <BaseAlert :submitMethod="() => deleteTruck(row.source.id)" title="message.answerdelete"
            text="message.isnotrestoration">
            <template v-slot:button="{ onClick }">
               <VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
            </template>
         </BaseAlert>
      </template>
      <template #bodyAppend>
         <tr v-if="store.all.length > tableParams.perPage">
            <td colspan="6">
               <div class="pt-3">
                  <VaPagination v-model="tableParams.currentPage"
                     :pages="Math.ceil(store.all.length / tableParams.perPage)" />
               </div>
            </td>
         </tr>
      </template>
   </VaDataTable>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import AddDrillingForm from '@/entities/Drilling/AddDrillingForm.vue';
import EditDrillingForm from '@/entities/Drilling/EditDrillingForm.vue';
import DrillingRepository from '@/entities/Drilling/DrillingRepository';
import { onMounted, reactive, ref, computed } from 'vue';
import { useDrilling } from '@/entities/Drilling/DrillingStore';
const tableParams = reactive({
   currentPage: 1,
   perPage: 14,
   loading: false,
   filter: ""
})

const store = useDrilling()
const TruckColumns = computed(() => [
   { key: "id", sortable: true },
   { key: "garage_number", sortable: true, label: t('message.garagenumber') },
   { key: "type.name", sortable: true, label: t('message.drillingtypes') },
   { key: "type.speed_per_min", sortable: true, label: t('message.speedpermin') },
   { key: "actions", width: 80, label: " " },
]);

async function getTruck() {
   tableParams.loading = true
   try {
      const result = await DrillingRepository.index()
      console.log(result);

      store.all = result.data
      tableParams.loading = false

   } catch (error) {
      console.error(error)
      tableParams.loading = false
   }
}

async function deleteTruck(id) {
   await DrillingRepository.destroy(id)
   store.destroy(id)
}


onMounted(() => {
   getTruck()
})
</script>