<template>
	<aside class="flex">
		<main class="w-1/3 pr-1.5">
			<TableTruckType />
		</main>
		<VaDivider vertical></VaDivider>
		<main class="w-2/3 pl-1.5">
			<TableTruck />
		</main>
	</aside>
</template>
<script setup lang="ts">
import TableTruckType from '@/components/TableTruckType.vue';
import TableTruck from '@/components/TableTruck.vue'
</script>