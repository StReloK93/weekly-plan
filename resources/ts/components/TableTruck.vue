<template>
	<AddTruckForm />
	<VaDataTable class="pt-3" :no-data-html="t('message.noDataHtml')" :loading="tableParams.loading" :items="trackStore.trucks" :columns="TruckColumns" :per-page="tableParams.perPage"
		:current-page="tableParams.currentPage" striped>
		<template #cell(truck_type_id)="{ value }">
			<span v-if="TruckTypeStore.truckTypes.length">
				{{ setTruckType(value)?.name }}
			</span>
			<VaSkeleton v-else variant="squared" height="15px" width="95px" />
		</template>
		<template #cell(ability)="{ value }">
			<span v-if="truckAbilities.length">
				{{ t(setTruckAbilityName(value)) }}
			</span>
			<VaSkeleton v-else variant="squared" height="15px" width="95px" />
		</template>
		<template #cell(tonnage)="{ row }">
			<span v-if="truckAbilities.length">
				{{ setTruckType(row.source.truck_type_id)?.tonnage }}
			</span>
			<VaSkeleton v-else variant="squared" height="15px" width="95px" />
		</template>
		<template #cell(actions)="{ row }">
			<EditTruckForm :id="row.source.id" />
			<BaseAlert :submitMethod="() => deleteTruck(row.source.id)" title="message.answerdelete" text="message.isnotrestoration">
				<template v-slot:button="{ onClick }">
					<VaButton preset="plain" icon="delete" class="ml-3" @click="onClick" />
				</template>
			</BaseAlert>
		</template>
		<template #bodyAppend>
			<tr>
				<td colspan="6">
					<div class="pt-3">
						<VaPagination v-model="tableParams.currentPage"
							:pages="Math.ceil(trackStore.trucks.length / tableParams.perPage)" />
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
import { useTruckType } from '@/entities/Truck/TruckTypeStore'
import TruckAbilityRepository from '@/entities/TruckAbility/TruckAbilityRepository';
const TruckTypeStore = useTruckType()

const tableParams = reactive({
	currentPage: 1,
	perPage: 14,
	loading: false,
})

const trackStore = useTruck()
const TruckColumns = computed(() => [
	{ key: "id", sortable: true },
	{ key: "truck_type_id",  sortable: true, label: t('message.trucktype') },
	{ key: "tonnage",  sortable: true, label: t('message.trucktonnage') },
	{ key: "garage_number", sortable: true, label: t('message.garagenumber')  },
	{ key: "ability", sortable: true, label: t('message.gorizontability') },
	{ key: "actions", width: 80, label: " " },
]);


function setTruckType(truck_type_id) {
	const truckType = TruckTypeStore.truckTypes.find((truck_type) => truck_type.id == +truck_type_id)
	if(truckType) return truckType
}

async function getTruck() {
	tableParams.loading = true
	try {
		const result = await TruckRepository.index()
		trackStore.trucks = result.data
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
async function getTruckAbilities(){
	const result = await TruckAbilityRepository.index()
	truckAbilities.value = result.data
}

function setTruckAbilityName(truck_ability_id) {
	const truckType = truckAbilities.value.find((truck_ability) => truck_ability.id == +truck_ability_id)
	if(truckType) return truckType.name
}

// Truck Ability NameSpace

onMounted(() => {
	getTruckAbilities()
	getTruck()
})
</script>