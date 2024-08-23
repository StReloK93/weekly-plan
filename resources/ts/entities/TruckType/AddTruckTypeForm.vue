<template>
	<BaseForm :title="t('message.addtrucktype')" :submit-method="createDumpTruckType">
		<template v-slot:button="{ onClick }">
			<VaButton icon="add" preset="primary" @click="onClick">
				{{ t('message.addtrucktype') }}
			</VaButton>
		</template>
		<InputsTruckType ref="dumpTruckInputs" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import InputsTruckType from './Inputs-TruckType.vue';
import TruckTypeRepository from './TruckTypeRepository';
import { useTruckType } from './TruckTypeStore';
import { ref } from 'vue';

const truckTypeStore = useTruckType()
const dumpTruckInputs = ref()
async function createDumpTruckType() {
	const formData = dumpTruckInputs.value.formData
	const result = await TruckTypeRepository.store(formData)
	truckTypeStore.store(result.data)
}
</script>