<template>
	<BaseForm :title="t('message.addtruck') " :submit-method="createDumpTruckType">
		<template v-slot:button="{ onClick }">
			<VaButton icon="add" preset="primary" @click="onClick">
				{{  t('message.addtruck') }}
			</VaButton>
		</template>
		<InputsTruck ref="TruckInputs" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import InputsTruck from './Inputs-Truck.vue';
import TruckRepository from './TruckRepository';
import { useTruck } from './TruckStore';
import { ref } from 'vue';

const TruckStore = useTruck()
const TruckInputs = ref()
async function createDumpTruckType() {
	const formData = TruckInputs.value.formData
	const result = await TruckRepository.store(formData)
	TruckStore.store(result.data)
}
</script>