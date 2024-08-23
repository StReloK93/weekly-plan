<template>
    <VaSkeletonGroup v-if="props.loading">
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />

        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaSkeleton variant="text" :lines="1" class="mb-1" />
                <VaSkeleton variant="squared" height="34px" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaSkeleton variant="text" :lines="1" class="mb-1" />
                <VaSkeleton variant="squared" height="34px" />
            </aside>
        </div>
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaSkeleton variant="text" :lines="1" class="mb-1" />
                <VaSkeleton variant="squared" height="34px" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaSkeleton variant="text" :lines="1" class="mb-1" />
                <VaSkeleton variant="squared" height="34px" />
            </aside>
        </div>
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaSkeleton variant="text" :lines="1" class="mb-1" />
                <VaSkeleton variant="squared" height="34px" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaSkeleton variant="text" :lines="1" class="mb-1" />
                <VaSkeleton variant="squared" height="34px" />
            </aside>
        </div>
    </VaSkeletonGroup>
    <template v-else>
        <VaInput v-model="formData.name" class="w-full mb-3" :rules="rule(t('required'))"
            :label="t('message.drillingname')" />
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaInput v-model="formData.speed_per_min" type="number" :rules="rule(t('required'))"
                    :label="t('message.speedpermin')" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaInput v-model="formData.install" type="number" :rules="rule(t('required'))"
                    :label="t('message.drillinginstall')" />
            </aside>
        </div>
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaInput v-model="formData.move" type="number" :rules="rule(t('required'))"
                    :label="t('message.drillingmove')" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaInput v-model="formData.up_down_mast" type="number" :rules="rule(t('required'))"
                    :label="t('message.drillupdownmast')" />
            </aside>
        </div>
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaInput v-model="formData.montage" type="number" :rules="rule(t('required'))"
                    :label="t('message.drillingmontage')" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaInput v-model="formData.drilling" type="number" :rules="rule(t('required'))"
                    :label="t('message.drill')" />
            </aside>
        </div>
    </template>
</template>

<script setup lang="ts">
import { rule } from '@/modules/helpers';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { reactive } from 'vue';
const props = defineProps({
    loading: { type: Boolean }
})

const formData = reactive({
    name: null,
    speed_per_min: null,
    install: null,
    move: null,
    up_down_mast: null,
    montage: null,
    drilling: null,
})

defineExpose({ formData })
</script>