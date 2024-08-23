<template>
	<BaseForm :title="t('message.editexcavatortype')" :loading="inputsLoading" :submit-method="update">
		<template v-slot:button="{ onClick }">
			<VaButton icon="edit" preset="plain" @click="onClick" />
		</template>
		<FormInputs ref="formInputs" :loading="inputsLoading" @vue:mounted="formMounted" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import FormInputs from './Inputs-Drilling.vue';
import Repository from './DrillingRepository';
import { useDrilling } from './DrillingStore';
import { ref } from 'vue';
const inputsLoading = ref(false)

const props = defineProps({
	id: { required: true, type: Number }
})

const Store = useDrilling()
const formInputs = ref()
async function update() {
	const formData = formInputs.value.formData
	const result = await Repository.update(formData, props.id)
	Store.update(props.id, result.data)
}


async function getCurrent() {
	inputsLoading.value = true
	const formData = formInputs.value.formData
	const result = await Repository.show(props.id)
	const data = result.data

	formData.drilling_type_id = data.drilling_type_id
	formData.garage_number = data.garage_number
	inputsLoading.value = false
}

function formMounted() {
	getCurrent()
}
</script>