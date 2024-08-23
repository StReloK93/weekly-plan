<template>
	<VaSkeletonGroup v-if="props.loading">
		<VaSkeleton variant="text" :lines="1" class="mb-1" />
		<VaSkeleton variant="squared" height="34px" class="mb-3" />
		<VaSkeleton variant="text" :lines="1" class="mb-1" />
		<VaSkeleton variant="squared" height="34px" class="mb-3" />
		<VaSkeleton variant="text" :lines="1" class="mb-1" width="130px" />
		<VaSkeleton variant="squared" height="34px" />
	</VaSkeletonGroup>
	<template v-else>
		<VaInput v-model="formData.garage_number" class="w-full mb-3" :rules="rule(t('required'))" :label="t('message.garagenumber')" />
		<div v-if="pageData.truckTypesInputLoading" class="mb-2">
			<VaSkeleton variant="text" :lines="1" class="mb-1" width="130px" />
			<VaSkeleton variant="squared" height="34px" />
		</div>
		<VaSelect v-else v-model="formData.truck_type_id" text-by="name" :rules="rule(t('required'))" value-by="id" class="w-full mb-3"
			:options="pageData.truckTypes" :label="t('message.trucktype')" :placeholder="t('message.select')" />
		<div v-if="pageData.abilityInputLoading">
			<VaSkeleton variant="text" :lines="1" class="mb-1" width="200px" />
			<VaSkeleton variant="squared" height="34px" />
		</div>
		<VaSelect v-else v-model="formData.ability" text-by="langname" value-by="id" :rules="rule(t('required'))" class="w-full mb-3"
			:options="options" :label="t('message.gorizontability')" :placeholder="t('message.select')" />
	</template>
</template>

<script setup lang="ts">
import { rule } from '@/modules/helpers';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { reactive, onMounted, computed } from 'vue';
import TruckAbilityRepository from '../TruckAbility/TruckAbilityRepository';
import TruckTypeRepository from '../TruckType/TruckTypeRepository';


const props = defineProps({
	loading: { type: Boolean }
})

const pageData = reactive({
	abilities: [],
	truckTypes: [],
	abilityInputLoading: false,
	truckTypesInputLoading: false,
})
const formData = reactive({
	truck_type_id: null,
	garage_number: null,
	ability: null,
})

async function getTruckTypes() {
	pageData.truckTypesInputLoading = true
	try {
		const { data } = await TruckTypeRepository.index()
		pageData.truckTypes = data
		pageData.truckTypesInputLoading = false
	}
	catch (err) {
		console.error(err);
		pageData.truckTypesInputLoading = false
	}
}

const options = computed(() => {
	return pageData.abilities.map((ability) => {
		ability.langname = t(ability.name)
		return ability
	})
})
async function getAbilities() {
	pageData.abilityInputLoading = true
	try {
		const { data } = await TruckAbilityRepository.index()
		pageData.abilities = data
		pageData.abilityInputLoading = false
	}
	catch (err) {
		pageData.abilityInputLoading = false
	}
}
defineExpose({ formData })

onMounted(() => {
	getAbilities()
	getTruckTypes()
})
</script>