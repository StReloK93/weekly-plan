<template>
    <VaSkeletonGroup v-if="props.loading">
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />

        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />
    </VaSkeletonGroup>
    <template v-else>
        <VaInput v-model="formData.name" class="w-full mb-3" :rules="rule(t('required'))"
            :label="t('career.name')" />
        <VaInput v-model="formData.shortname" class="w-full mb-3" :rules="rule(t('required'))"
            :label="t('career.code')" />
    </template>
</template>

<script setup lang="ts">
import { rule } from '@/modules/helpers';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { onMounted, reactive } from 'vue';
const props = defineProps({
    loading: { type: Boolean }
})

const formData = reactive({
    name: null,
    shortname: null,
})

defineExpose({ formData })

onMounted(() => {
})
</script>