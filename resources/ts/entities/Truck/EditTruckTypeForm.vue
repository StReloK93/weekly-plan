<template>
	<BaseForm :title="t('message.edittrucktype')" :loading="inputsLoading" :submit-method="editDumpTruckType">
		<template v-slot:button="{ onClick }">
			<VaButton icon="edit" preset="plain" @click="onClick" />
		</template>
		<InputsTruckType ref="dumpTruckInputs" :loading="inputsLoading" @vue:mounted="formMounted" />
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
const inputsLoading = ref(false)


const props = defineProps({
	id: { required: true, type: Number }
})

const truckTypeStore = useTruckType()
const dumpTruckInputs = ref()
async function editDumpTruckType() {
	const formData = dumpTruckInputs.value.formData
	const result = await TruckTypeRepository.update(formData, props.id)
	truckTypeStore.update(props.id, result.data)
}


async function getCurrentTruckType() {
	inputsLoading.value = true
	const formData = dumpTruckInputs.value.formData
	const result = await TruckTypeRepository.show(props.id)
	const TruckType = result.data

	formData.name = TruckType.name
	formData.tonnage = TruckType.tonnage.toString()
	inputsLoading.value = false
}

function formMounted() {
	getCurrentTruckType()
}
</script>