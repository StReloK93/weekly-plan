<template>
	<main class="flex justify-between">
		<AddTruckForm />
		<VaInput v-model="tableParams.filter" preset="bordered" class="w-44" :placeholder="t('message.search')">
			<template #appendInner>
				<VaIcon name="search" color="secondary" />
			</template>
		</VaInput>
	</main>
	<VaDataTable class="pt-3" :no-data-html="t('message.noDataHtml')" :loading="tableParams.loading"
		:filter="tableParams.filter" :items="trackStore.all" :columns="TruckColumns" :per-page="tableParams.perPage"
		:current-page="tableParams.currentPage" striped>
		<template #cell(ability)="{ value }">
			<span v-if="truckAbilities.length">
				{{ t(setTruckAbilityName(value)) }}
			</span>
			<VaSkeleton v-else variant="squared" height="15px" width="95px" />
		</template>
		<template #cell(actions)="{ row }">
			<EditTruckForm :id="row.source.id" />
			<BaseAlert :submitMethod="() => deleteTruck(row.source.id)" title="message.answerdelete"
				text="message.isnotrestoration">
				<template v-slot:button="{ onClick }">
					<VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
				</template>
			</BaseAlert>
		</template>
		<template #bodyAppend>
			<tr v-if="trackStore.all.length > tableParams.perPage">
				<td colspan="6">
					<div class="pt-3">
						<VaPagination v-model="tableParams.currentPage"
							:pages="Math.ceil(trackStore.all.length / tableParams.perPage)" />
					</div>
				</td>
			</tr>
		</template>
	</VaDataTable>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { useTruck, TruckRepository, AddTruckForm, EditTruckForm, } from '@/entities/Truck/InvokerTruck';
import { onMounted, reactive, ref, computed } from 'vue';
import TruckAbilityRepository from '@/entities/TruckAbility/TruckAbilityRepository';

const tableParams = reactive({
	currentPage: 1,
	perPage: 14,
	loading: false,
	filter: ""
})

const trackStore = useTruck()
const TruckColumns = computed(() => [
	{ key: "id", sortable: true },
	{ key: "type.name", sortable: true, label: t('message.trucktype') },
	{ key: "type.tonnage", sortable: true, label: t('message.trucktonnage') },
	{ key: "garage_number", sortable: true, label: t('message.garagenumber') },
	{ key: "ability", sortable: true, label: t('message.gorizontability') },
	{ key: "actions", width: 80, label: " " },
]);


async function getTruck() {
	tableParams.loading = true
	try {
		const result = await TruckRepository.index()
		trackStore.all = result.data
		tableParams.loading = false

	} catch (error) {
		console.error(error)
		tableParams.loading = false
	}
}

async function deleteTruck(id) {
	await TruckRepository.destroy(id)
	trackStore.destroy(id)
}


// Truck Ability NameSpace

const truckAbilities = ref([])
async function getTruckAbilities() {
	const result = await TruckAbilityRepository.index()
	truckAbilities.value = result.data
}

function setTruckAbilityName(truck_ability_id) {
	const truckType = truckAbilities.value.find((truck_ability) => truck_ability.id == +truck_ability_id)
	if (truckType) return truckType.name
}

// Truck Ability NameSpace

onMounted(() => {
	getTruckAbilities()
	getTruck()
})
</script>