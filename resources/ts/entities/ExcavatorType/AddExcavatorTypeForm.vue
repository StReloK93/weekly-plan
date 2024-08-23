<template>
	<BaseForm :title="t('message.addexcavatortype')" :submit-method="create">
		<template v-slot:button="{ onClick }">
			<VaButton icon="add" preset="primary" @click="onClick">
				{{ t('message.addexcavatortype') }}
			</VaButton>
		</template>
		<FormInputs ref="Inputs" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import FormInputs from './Inputs-ExcavatorType.vue';
import { useExcavatorType } from './ExcavatorTypeStore';
import Repository from './ExcavatorTypeRepository';
import { ref } from 'vue';

const Store = useExcavatorType()
const Inputs = ref()
async function create() {
	
	const formData = Inputs.value.formData
	console.log(formData);
	const result = await Repository.store(formData)
	Store.store(result.data)
}
</script>