<template>
    <VaSkeletonGroup v-if="props.loading">
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />

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
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />
    </VaSkeletonGroup>
    <template v-else>
        <VaInput v-model="formData.name" class="w-full mb-3" :rules="rule(t('required'))"
            :label="t('message.excavatortype')" />
        <VaInput v-model="formData.bucket_volume" type="number" class="w-full mb-3" :rules="rule(t('required'))"
        :label="t('message.excavatorvolume')" />
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaInput v-model="formData.easy_procent" type="number" :rules="rule(t('required'))"
                :label="t('message.excavatoreasyprocent')" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaInput v-model="formData.easy_time" type="number" :rules="rule(t('required'))"
                :label="t('message.excavatoreasytime')" />
            </aside>
        </div>
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaInput v-model="formData.normal_procent" type="number" :rules="rule(t('required'))"
                :label="t('message.excavatornormalprocent')" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaInput v-model="formData.normal_time" type="number" :rules="rule(t('required'))"
                :label="t('message.excavatornormaltime')" />
            </aside>
        </div>
        <div class="flex">
            <aside class="w-1/2 mb-3 pr-1.5">
                <VaInput v-model="formData.hard_procent" type="number" :rules="rule(t('required'))"
                :label="t('message.excavatorhardprocent')" />
            </aside>
            <aside class="w-1/2 mb-3 pl-1.5">
                <VaInput v-model="formData.hard_time" type="number" :rules="rule(t('required'))"
                :label="t('message.excavatorhardtime')" />
            </aside>
        </div>
        <VaInput v-model="formData.count_bucket" type="number" class="w-full mb-3" :rules="rule(t('required'))"
        :label="t('message.excavatorcountbucket')" />
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
    bucket_volume: null,
    normal_procent: null,
    easy_procent: null,
    hard_procent: null,
    normal_time: null,
    easy_time: null,
    hard_time: null,
    count_bucket: null,
})

defineExpose({formData})
</script>