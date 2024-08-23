<template>
	<BaseForm :title="t('horizon.add')" :submit-method="create">
		<template v-slot:button="{ onClick }">
			<VaButton icon="add" preset="primary" @click="onClick">
				{{ t('horizon.add') }}
			</VaButton>
		</template>
		<FormInputs ref="Inputs" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import FormInputs from './Inputs-Horizon.vue';
import { useHorizon } from './HorizonStore';
import Repository from './HorizonRepository';
import { ref } from 'vue';

const Store = useHorizon()
const Inputs = ref()
async function create() {
	
	const formData = Inputs.value.formData
	const result = await Repository.store(formData)
	Store.store(result.data)
}
</script>