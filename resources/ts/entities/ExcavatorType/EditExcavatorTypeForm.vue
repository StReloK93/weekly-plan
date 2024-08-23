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
import FormInputs from './Inputs-ExcavatorType.vue';
import Repository from './ExcavatorTypeRepository';
import { useExcavatorType } from './ExcavatorTypeStore';
import { ref } from 'vue';
const inputsLoading = ref(false)


const props = defineProps({
	id: { required: true, type: Number }
})

const Store = useExcavatorType()
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
	formData.bucket_volume = data.bucket_volume
	formData.normal_procent = data.normal_procent
	formData.easy_procent = data.easy_procent
	formData.hard_procent = data.hard_procent
	formData.normal_time = data.normal_time
	formData.easy_time = data.easy_time
	formData.hard_time = data.hard_time
	formData.count_bucket = data.count_bucket

	inputsLoading.value = false
}

function formMounted() {
	getCurrent()
}
</script>