<template>
	<BaseForm :title="t('message.addexcavator')" :submit-method="create">
		<template v-slot:button="{ onClick }">
			<VaButton icon="add" preset="primary" @click="onClick">
				{{ t('message.addexcavator') }}
			</VaButton>
		</template>
		<FormInputs ref="Inputs" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import FormInputs from './Inputs-Excavator.vue';
import { useExcavator } from './ExcavatorStore';
import Repository from './ExcavatorRepository';
import { ref } from 'vue';

const Store = useExcavator()
const Inputs = ref()
async function create() {
	
	const formData = Inputs.value.formData
	console.log(formData);
	const result = await Repository.store(formData)
	Store.store(result.data)
}
</script>