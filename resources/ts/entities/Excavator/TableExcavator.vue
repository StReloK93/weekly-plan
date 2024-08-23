<template>
   <main class="flex justify-between">
      <AddExcavatorForm />
      <VaInput v-model="tableParams.filter" preset="bordered" class="w-44" :placeholder="t('message.search')">
         <template #appendInner>
            <VaIcon name="search" color="secondary" />
         </template>
      </VaInput>
   </main>
   <VaDataTable class="pt-3" :no-data-html="t('message.noDataHtml')" :loading="tableParams.loading"
      :filter="tableParams.filter" :items="excavatorStore.all" :columns="TruckColumns" :per-page="tableParams.perPage"
      :current-page="tableParams.currentPage" striped>
      <template #cell(actions)="{ row }">
         <EditExcavatorForm :id="row.source.id" />
         <BaseAlert :submitMethod="() => deleteTruck(row.source.id)" title="message.answerdelete"
            text="message.isnotrestoration">
            <template v-slot:button="{ onClick }">
               <VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
            </template>
         </BaseAlert>
      </template>
      <template #bodyAppend>
         <tr v-if="excavatorStore.all.length > tableParams.perPage">
            <td colspan="6">
               <div class="pt-3">
                  <VaPagination v-model="tableParams.currentPage"
                     :pages="Math.ceil(excavatorStore.all.length / tableParams.perPage)" />
               </div>
            </td>
         </tr>
      </template>
   </VaDataTable>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import AddExcavatorForm from '@/entities/Excavator/AddExcavatorForm.vue';
import EditExcavatorForm from '@/entities/Excavator/EditExcavatorForm.vue';
import ExcavatorRepository from '@/entities/Excavator/ExcavatorRepository';
import { onMounted, reactive, ref, computed } from 'vue';
import { useExcavator } from '@/entities/Excavator/ExcavatorStore';
const tableParams = reactive({
   currentPage: 1,
   perPage: 14,
   loading: false,
   filter: ""
})

const excavatorStore = useExcavator()
const TruckColumns = computed(() => [
   { key: "id", sortable: true },
   { key: "garage_number", sortable: true, label: t('message.garagenumber') },
   { key: "type.name", sortable: true, label: t('message.excavatortype') },
   { key: "type.bucket_volume", sortable: true, label: t('message.excavatorvolume') },
   { key: "actions", width: 80, label: " " },
]);

async function getTruck() {
   tableParams.loading = true
   try {
      const result = await ExcavatorRepository.index()
      console.log(result);

      excavatorStore.all = result.data
      tableParams.loading = false

   } catch (error) {
      console.error(error)
      tableParams.loading = false
   }
}

async function deleteTruck(id) {
   await ExcavatorRepository.destroy(id)
   excavatorStore.destroy(id)
}


onMounted(() => {
   getTruck()
})
</script>