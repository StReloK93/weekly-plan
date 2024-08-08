<template>
	<section class="flex">
		<VaSidebar>
			<VaSidebarItem v-for="page in guidesPages" :to="{ name: page.path }" :active="$route.name == page.path">
				<VaSidebarItemContent>
					<VaIcon :name="page.icon" />
					<VaSidebarItemTitle>{{ t(page.name) }}</VaSidebarItemTitle>
				</VaSidebarItemContent>
			</VaSidebarItem>
		</VaSidebar>
		<section class="relative flex-grow">
			<div class="absolute inset-0">
				<VaScrollContainer class="h-full p-3" vertical>
					<RouterView />
				</VaScrollContainer>
			</div>
		</section>
	</section>
</template>

<script setup lang="ts">
import { reactive } from 'vue';
import { useI18n } from 'vue-i18n'
const { t } = useI18n({ useScope: 'global' })

const guidesPages = reactive([
	{ path: 'trucks-guide', name: 'message.trucks', icon: "local_shipping" },
	{ path: 'excavators-guide', name: 'message.excavators', icon: "front_loader" },
	{ path: 'drillings-guide', name: 'message.drillings', icon: "architecture" },
	{ path: 'careers-guide', name: 'message.careers', icon: "layers" },
	{ path: 'normatives-guide', name: 'message.normatives', icon: "book" },
])
</script>