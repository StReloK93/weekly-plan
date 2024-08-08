<template>
	<slot name="button" :onClick="onClick"></slot>
	<VaModal v-model="model" max-width="460px" no-padding hide-default-actions blur>
		<VaForm @submit.prevent="submit" ref="baseForm" class="flex flex-col">
			<main class="p-3">
				<h2 class="text-xl mb-5 content-center">
					<VaIcon name="notifications" color="danger"size="40px" /> {{ t(props.title) }}
				</h2>
				<p class="mb-5">
					{{ t(props.text) }}
				</p>
			</main>
			<VaDivider class="!my-0" />
			<footer class="p-3 text-right bg-gray-100">
				<VaButton preset="primary" @click="model = false" class="mr-3 w-20">{{ t(props.cancelAction) }}
				</VaButton>
				<VaButton type="submit" :loading="loading" class="w-20">{{ t(props.toggleAction) }} </VaButton>
			</footer>
		</VaForm>
	</VaModal>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { ref } from 'vue'
const model = ref(false)
const loading = ref(false)
const props = defineProps({
	text: { type: String },
	toggleAction: { type: String, default: 'message.yes' },
	cancelAction: { type: String, default: "message.no" },
	title: { type: String, required: true },
	submitMethod: { type: Function, required: true }
})

function onClick() {
	model.value = true
}

async function submit() {
	loading.value = true
	try {
		await props.submitMethod()
		loading.value = false
		model.value = false
	}
	catch (error) {
		console.log(error);
		loading.value = false
	}
}
</script>