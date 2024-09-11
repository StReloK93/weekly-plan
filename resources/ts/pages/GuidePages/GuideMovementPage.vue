<template>
	<aside>
		<VaTabs v-model="activeTab" class="mb-3">
			<template #tabs>
				<VaTab v-for="title in ['movement.ekg', 'movement.gidro']" :key="title" :name="title">
					{{ t(title) }}
				</VaTab>
			</template>
		</VaTabs>
		<component :is="currentView" :tab="activeTab" />
	</aside>
</template>

<script setup lang="ts">
import TableMovement from '@movement/TableMovement.vue'
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
const activeTab = ref('movement.ekg')

const pages = {
	'movement.ekg': TableMovement,
	'movement.gidro': TableMovement,
}
const currentView = computed(() => pages[activeTab.value])
</script>