<template>
    <VaSkeletonGroup v-if="props.loading">
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" />
    </VaSkeletonGroup>
    <template v-else>
        <VaInput v-model="formData.name" class="w-full mb-3" :rules="rule(t('required'))"
            :label="t('message.truckname')" />
        <VaInput v-model="formData.tonnage" type="number" class="w-full" :rules="rule(t('required'))"
        :label="t('message.trucktonnage')" />
    </template>
</template>

<script setup lang="ts">
import { rule } from '@/modules/helpers';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { reactive } from 'vue';
const props = defineProps({
    loading: {type: Boolean}
})

const formData = reactive({
    name: null,
    tonnage: null,
})

defineExpose({formData})
</script>