<template>
	<aside>
		<VaTabs v-model="activeTab" class="mb-3">
			<template #tabs>
				<VaTab v-for="title in ['message.drillings', 'message.drillingtypes']" :key="title" :name="title">
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
import TableDrillingType from '@/entities/DrillingType/TableDrillingType.vue';
import TableDrilling from '@/entities/Drilling/TableDrilling.vue';
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
const activeTab = ref('message.drillings')

const pages = {
	'message.drillings': TableDrilling,
	'message.drillingtypes': TableDrillingType,
}
const currentView = computed(() => pages[activeTab.value])
</script>