<template>
	<BaseForm :title="t('career.add')" :submit-method="create">
		<template v-slot:button="{ onClick }">
			<VaButton icon="add" preset="primary" @click="onClick">
				{{ t('career.add') }}
			</VaButton>
		</template>
		<FormInputs ref="Inputs" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import FormInputs from './Inputs-Career.vue';
import { useCareer } from './CareerStore';
import Repository from './CareerRepository';
import { ref } from 'vue';

const Store = useCareer()
const Inputs = ref()
async function create() {
	
	const formData = Inputs.value.formData
	const result = await Repository.store(formData)
	Store.store(result.data)
}
</script>