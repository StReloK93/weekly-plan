<template>
	<!-- <AddTruckTypeForm /> -->
	<VaDataTable class="pt-3" :items="excavatorTypeStore.excavatorTypes" :loading="tableParams.loading" :columns="TruckTypecolumns" striped>
		<template #cell(actions)="{ row }">
			<!-- <EditTruckTypeForm :id="row.source.id" /> -->
			<BaseAlert
				:submitMethod="() => deleteExcavatorType(row.source.id)"
				title="message.answerdelete"
				text="message.isnotrestoration"
			>
				<template v-slot:button="{ onClick }">
					<VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
				</template>
			</BaseAlert>
		</template>
	</VaDataTable>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { onMounted, reactive, computed } from 'vue';
import { ExcavatorTypeRepository, useExcavatorType } from '@/entities//Excavator/InvokerExcavatorType';

const tableParams = reactive({
	loading: false
})
const excavatorTypeStore = useExcavatorType()
const TruckTypecolumns = computed(() => [
	{ key: "id", sortable: true },
	{ key: "name", sortable: true, label: t('message.trucktype') },
	{ key: "bucket_volume", sortable: true },
	{ key: "normal_procent", sortable: true },
	{ key: "easy_procent", sortable: true },
	{ key: "hard_procent", sortable: true },
    { key: "normal_time", sortable: true },
	{ key: "easy_time", sortable: true },
	{ key: "hard_time", sortable: true },
	{ key: "actions", width: 80, label: " " },
]);


async function getTruckTypes() {
	tableParams.loading = true
	try {
		const result = await ExcavatorTypeRepository.index()
		excavatorTypeStore.excavatorTypes = result.data
		tableParams.loading = false

	} catch (error) {
		console.error(error)
		tableParams.loading = false
	}

}

async function deleteExcavatorType(id) {
	// await TruckTypeRepository.destroy(id)
	// trackTypeStore.destroy(id)
}

onMounted(() => {
	getTruckTypes()
})
</script>