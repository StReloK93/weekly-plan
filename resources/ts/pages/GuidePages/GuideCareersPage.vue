<template>
	<aside>
		<VaTabs v-model="activeTab" class="mb-3">
			<template #tabs>
				<VaTab v-for="title in ['horizons', 'message.careers']" :key="title" :name="title">
					{{ t(title) }}
				</VaTab>
			</template>
		</VaTabs>
		<main class="w-full">
			<component :is="currentView" />
		</main>
	</aside>
</template>

<script setup lang="ts">
import TableCareer from '@career/TableCareer.vue'
import TableHorizon from '@horizon/TableHorizon.vue';
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
const activeTab = ref('horizons')

const pages = {
	'horizons': TableHorizon,
	'message.careers': TableCareer,
}
const currentView = computed(() => pages[activeTab.value])
</script>