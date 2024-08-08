<template>
	<AddTruckTypeForm />
	<VaDataTable class="pt-3" :items="trackTypeStore.truckTypes" :loading="tableParams.loading" :columns="TruckTypecolumns" striped>
		<template #cell(actions)="{ row }">
			<EditTruckTypeForm :id="row.source.id" />
			<BaseAlert
				:submitMethod="() => deleteTruckType(row.source.id)"
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
import { useTruckType, TruckTypeRepository, AddTruckTypeForm, EditTruckTypeForm } from '@/entities/Truck/InvokerTruckType';

const tableParams = reactive({
	loading: false
})
const trackTypeStore = useTruckType()
const TruckTypecolumns = computed(() => [
	{ key: "id", sortable: true },
	{ key: "name", sortable: true, label: t('message.trucktype') },
	{ key: "tonnage", sortable: true, label:  t('message.trucktonnage')  },
	{ key: "actions", width: 80, label: " " },
]);


async function getTruckTypes() {
	tableParams.loading = true
	try {
		const result = await TruckTypeRepository.index()
		trackTypeStore.truckTypes = result.data
		tableParams.loading = false

	} catch (error) {
		console.error(error)
		tableParams.loading = false
	}

}

async function deleteTruckType(id) {
	await TruckTypeRepository.destroy(id)
	trackTypeStore.destroy(id)
}

onMounted(() => {
	getTruckTypes()
})
</script>