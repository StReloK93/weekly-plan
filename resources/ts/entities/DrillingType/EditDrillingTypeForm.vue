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
import FormInputs from './Inputs-DrillingType.vue';
import Repository from './DrillingTypeRepository';
import { useDrillingType } from './DrillingTypeStore';
import { ref } from 'vue';
const inputsLoading = ref(false)

const props = defineProps({
	id: { required: true, type: Number }
})

const Store = useDrillingType()
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

	formData.name = data.name
	formData.speed_per_min = data.speed_per_min
	formData.install = data.install
	formData.move = data.move
	formData.up_down_mast = data.up_down_mast
	formData.montage = data.montage
	formData.drilling = data.drilling
	inputsLoading.value = false
}

function formMounted() {
	getCurrent()
}
</script>