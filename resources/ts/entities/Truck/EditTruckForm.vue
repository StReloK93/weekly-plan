<template>
	<BaseForm :title="t('message.edittruck')" :loading="inputsLoading" :submit-method="editDumpTruckType">
		<template v-slot:button="{ onClick }">
			<VaButton icon="edit" preset="plain" @click="onClick" />
		</template>
		<InputsTruck ref="dumpTruckInputs" :loading="inputsLoading" @vue:mounted="formMounted" />
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
const inputsLoading = ref(false)


const props = defineProps({
	id: { required: true, type: Number }
})

const truckStore = useTruck()
const dumpTruckInputs = ref()
async function editDumpTruckType() {
	const formData = dumpTruckInputs.value.formData
	const result = await TruckRepository.update(formData, props.id)
	truckStore.update(props.id, result.data)
}


async function getCurrentTruck() {
	inputsLoading.value = true
	const formData = dumpTruckInputs.value.formData
	const result = await TruckRepository.show(props.id)
	const Truck = result.data

	formData.truck_type_id = Truck.truck_type_id
	formData.garage_number = Truck.garage_number
	formData.ability = Truck.ability
	inputsLoading.value = false
}

function formMounted() {
	getCurrentTruck()
}
</script>