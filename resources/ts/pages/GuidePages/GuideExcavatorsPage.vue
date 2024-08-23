<template>
	<aside>
		<VaTabs v-model="activeTab" class="mb-3">
			<template #tabs>
				<VaTab v-for="title in ['message.excavators', 'message.excavatortypes']" :key="title" :name="title">
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
import TableExcavator from '@/entities/Excavator/TableExcavator.vue';
import TableExcavatorType from '@/entities/ExcavatorType/TableExcavatorType.vue';
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
const activeTab = ref('message.excavators')

const pages = {
	'message.excavators': TableExcavator,
	'message.excavatortypes': TableExcavatorType,
}
const currentView = computed(() => pages[activeTab.value])
</script>