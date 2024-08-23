<template>
	<BaseForm :title="t('horizon.edit')" :loading="inputsLoading" :submit-method="update">
		<template v-slot:button="{ onClick }">
			<VaButton icon="edit" preset="plain" @click="onClick" />
		</template>
		<FormInputs ref="formInputs" :loading="inputsLoading" @vue:mounted="formMounted" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue'
import FormInputs from './Inputs-Horizon.vue'
import Repository from './HorizonRepository'
import { useHorizon } from './HorizonStore'
import { ref } from 'vue'
const inputsLoading = ref(false)

const props = defineProps({
	id: { required: true, type: Number }
})

const Store = useHorizon()
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



	formData.career_id = data.career_id
	formData.code = data.code
	formData.level = data.level
	inputsLoading.value = false
}

function formMounted() {
	getCurrent()
}
</script>