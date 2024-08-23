<template>
	<main class="flex justify-between">
		<AddExcavatorTypeForm />
		<VaInput v-model="tableParams.filter" preset="bordered" class="w-44" :placeholder="t('message.search')">
			<template #appendInner>
				<VaIcon name="search" color="secondary" />
			</template>
		</VaInput>
	</main>
	<VaDataTable class="pt-3" :items="excavatorTypeStore.all" :filter="tableParams.filter" :loading="tableParams.loading"
		:per-page="tableParams.perPage" :current-page="tableParams.currentPage" :columns="TruckTypecolumns" striped>
		<template #cell(actions)="{ row }">
			<EditExcavatorTypeForm :id="row.source.id" />
			<BaseAlert :submitMethod="() => deleteExcavatorType(row.source.id)" title="message.answerdelete"
				text="message.isnotrestoration">
				<template v-slot:button="{ onClick }">
					<VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
				</template>
			</BaseAlert>
		</template>
		<template #bodyAppend>
			<tr v-if="excavatorTypeStore.all.length > tableParams.perPage">
				<td colspan="6">
					<div class="pt-3">
						<VaPagination v-model="tableParams.currentPage"
							:pages="Math.ceil(excavatorTypeStore.all.length / tableParams.perPage)" />
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
import ExcavatorTypeRepository from './ExcavatorTypeRepository';
import { useExcavatorType } from './ExcavatorTypeStore';
import AddExcavatorTypeForm from './AddExcavatorTypeForm.vue';
import EditExcavatorTypeForm from './EditExcavatorTypeForm.vue';

const tableParams = reactive({
	loading: false,
	filter: "",
	perPage: 14,
	currentPage: 1,
})
const excavatorTypeStore = useExcavatorType()
const TruckTypecolumns = computed(() => [
	{ key: "id", sortable: true },
	{ key: "name", sortable: true, label: t('message.excavatortype') },
	{ key: "bucket_volume", sortable: true, label: t('message.excavatorvolume') },
	{ key: "easy_procent", sortable: true, label: t('message.excavatoreasyprocent') },
	{ key: "easy_time", sortable: true, label: t('message.excavatoreasytime') },
	{ key: "normal_procent", sortable: true, label: t('message.excavatornormalprocent') },
	{ key: "normal_time", sortable: true, label: t('message.excavatornormaltime') },
	{ key: "hard_procent", sortable: true, label: t('message.excavatorhardprocent') },
	{ key: "hard_time", sortable: true, label: t('message.excavatorhardtime') },
	{ key: "count_bucket", sortable: true, label: t('message.excavatorcountbucket') },
	{ key: "actions", width: 80, label: " " },
]);


async function getTruckTypes() {
	tableParams.loading = true
	try {
		const result = await ExcavatorTypeRepository.index()
		excavatorTypeStore.all = result.data
		tableParams.loading = false

	} catch (error) {
		console.error(error)
		tableParams.loading = false
	}

}

async function deleteExcavatorType(id) {
	await ExcavatorTypeRepository.destroy(id)
	excavatorTypeStore.destroy(id)
}

onMounted(() => {
	getTruckTypes()
})
</script>