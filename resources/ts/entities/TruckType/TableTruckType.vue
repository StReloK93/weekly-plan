<template>
	<main class="flex justify-between">
		<AddTruckTypeForm />
		<VaInput v-model="tableParams.filter" preset="bordered" class="w-44" :placeholder="t('message.search')">
			<template #appendInner>
				<VaIcon name="search" color="secondary" />
			</template>
		</VaInput>
	</main>
	<VaDataTable class="pt-3" :items="trackTypeStore.all" :filter="tableParams.filter" :loading="tableParams.loading"
		:columns="TruckTypecolumns" :current-page="tableParams.currentPage" :per-page="tableParams.perPage" striped>
		<template #cell(actions)="{ row }">
			<EditTruckTypeForm :id="row.source.id" />
			<BaseAlert :submitMethod="() => deleteTruckType(row.source.id)" title="message.answerdelete"
				text="message.isnotrestoration">
				<template v-slot:button="{ onClick }">
					<VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
				</template>
			</BaseAlert>
		</template>
		<template #bodyAppend>
			<tr v-if="trackTypeStore.all.length > tableParams.perPage">
				<td colspan="6">
					<div class="pt-3">
						<VaPagination v-model="tableParams.currentPage"
							:pages="Math.ceil(trackTypeStore.all.length / tableParams.perPage)" />
					</div>
				</td>
			</tr>
		</template>
	</VaDataTable>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { onMounted, reactive, computed } from 'vue';
import { useTruckType, TruckTypeRepository, AddTruckTypeForm, EditTruckTypeForm } from '@/entities/TruckType/InvokerTruckType';

const tableParams = reactive({
	loading: false,
	currentPage: 1,
	perPage: 14,
	filter: "",
})
const trackTypeStore = useTruckType()
const TruckTypecolumns = computed(() => [
	{ key: "id", sortable: true },
	{ key: "name", sortable: true, label: t('message.trucktype') },
	{ key: "tonnage", sortable: true, label: t('message.trucktonnage') },
	{ key: "actions", width: 80, label: " " },
]);


async function getTruckTypes() {
	tableParams.loading = true
	try {
		const result = await TruckTypeRepository.index()
		trackTypeStore.all = result.data
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