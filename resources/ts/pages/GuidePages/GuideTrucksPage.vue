<template>
	<aside>
		<VaTabs v-model="activeTab" class="mb-3">
			<template #tabs>
				<VaTab v-for="title in ['message.trucks', 'message.trucktypes']" :key="title" :name="title">
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
import TableTruck from '@truck/TableTruck.vue';
import TableTruckType from '@truck-type/TableTruckType.vue';
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
const activeTab = ref('message.trucks')

const pages = {
	'message.trucks': TableTruck,
	'message.trucktypes': TableTruckType,
}
const currentView = computed(() => pages[activeTab.value])
</script>