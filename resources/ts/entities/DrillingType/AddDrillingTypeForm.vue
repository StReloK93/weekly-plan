<template>
	<BaseForm :title="t('message.adddrillingtype')" :submit-method="create">
		<template v-slot:button="{ onClick }">
			<VaButton icon="add" preset="primary" @click="onClick">
				{{ t('message.adddrillingtype') }}
			</VaButton>
		</template>
		<FormInputs ref="Inputs" />
	</BaseForm>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import BaseForm from '@/components/BaseForm.vue';
import FormInputs from './Inputs-DrillingType.vue';
import { useDrillingType } from './DrillingTypeStore';
import Repository from './DrillingTypeRepository';
import { ref } from 'vue';

const Store = useDrillingType()
const Inputs = ref()
async function create() {
	const formData = Inputs.value.formData
	
	const result = await Repository.store(formData)
	Store.store(result.data)
}
</script>