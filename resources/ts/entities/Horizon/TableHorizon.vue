<template>
   <main class="flex justify-between">
      <AddForm />
      <VaInput v-model="tableParams.filter" preset="bordered" class="w-44" :placeholder="t('message.search')">
         <template #appendInner>
            <VaIcon name="search" color="secondary" />
         </template>
      </VaInput>
   </main>
   <VaDataTable class="pt-3" :no-data-html="t('message.noDataHtml')" :loading="tableParams.loading"
      :filter="tableParams.filter" :items="store.all" :columns="TruckColumns" :per-page="tableParams.perPage"
      :current-page="tableParams.currentPage" striped>
      <template #cell(level)="{ value }">
			<span v-if="truckAbilities.length">
				{{ t(setLevelName(value)) }}
			</span>
			<VaSkeleton v-else variant="squared" height="15px" width="95px" />
		</template>
      <template #cell(actions)="{ row }">
         <EditForm :id="row.source.id" />
         <BaseAlert :submitMethod="() => destroy(row.source.id)" title="message.answerdelete" text="message.isnotrestoration">
            <template v-slot:button="{ onClick }">
               <VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
            </template>
         </BaseAlert>
      </template>
      <template #cell(horizon_code)="{ row }">
         {{row.source.career.shortname}}_{{row.source.code}}
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
import TruckAbilityRepository from '@/entities/TruckAbility/TruckAbilityRepository';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import AddForm from '@horizon/AddHorizonForm.vue';
import EditForm from '@horizon/EditHorizonForm.vue';
import DrillingRepository from '@horizon/HorizonRepository';
import { onMounted, reactive, ref, computed } from 'vue';
import { useHorizon } from '@horizon/HorizonStore';
const tableParams = reactive({
   currentPage: 1,
   perPage: 14,
   loading: false,
   filter: ""
})

const store = useHorizon()
const TruckColumns = computed(() => [
   { key: "id", sortable: true, width: 65 },
   { key: "career.name", sortable: true, label: t('career.name'), width: 220 },
   { key: "code", sortable: true, label: t('horizon.name') },
   { key: "horizon_code", label: t('horizon.code')  },
   { key: "level", sortable: true, label: t('level') },
   { key: "actions", width: 80, label: " " },
]);

async function getAll() {
   tableParams.loading = true
   try {
      const result = await DrillingRepository.index()
      store.all = result.data
      tableParams.loading = false

   } catch (error) {
      console.error(error)
      tableParams.loading = false
   }
}

async function destroy(id) {
   await DrillingRepository.destroy(id)
   store.destroy(id)
}


const truckAbilities = ref([])
async function getLevels() {
	const result = await TruckAbilityRepository.index()
	truckAbilities.value = result.data
}

function setLevelName(truck_ability_id) {
	const truckType = truckAbilities.value.find((truck_ability) => truck_ability.id == +truck_ability_id)
	if (truckType) return truckType.name
}


onMounted(() => {
   getAll()
   getLevels()
})
</script>