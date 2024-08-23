<template>
    <VaSkeletonGroup v-if="props.loading">
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />

        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />
    </VaSkeletonGroup>
    <template v-else>
        <VaInput v-model="formData.garage_number" class="w-full mb-3" :rules="rule(t('required'))"
            :label="t('message.garagenumber')" />
        <div v-if="pageData.drilling_types_loading" class="mb-2">
            <VaSkeleton variant="text" :lines="1" class="mb-1" width="130px" />
            <VaSkeleton variant="squared" height="34px" />
        </div>
        <VaSelect v-else v-model="formData.drilling_type_id" text-by="name" value-by="id" :rules="rule(t('required'))"
            class="w-full mb-3" :options="pageData.excavator_types" :label="t('message.drillingtypes')"
            :placeholder="t('message.select')" />
    </template>
</template>

<script setup lang="ts">
import DrillingTypeRepository from '@drilling-type/DrillingTypeRepository';
import { rule } from '@/modules/helpers';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { onMounted, reactive } from 'vue';
const props = defineProps({
    loading: { type: Boolean }
})

const formData = reactive({
    drilling_type_id: null,
    garage_number: null,
})

const pageData = reactive({
    excavator_types: [],
    drilling_types_loading: false,
})

async function getDrillingTypes() {
    pageData.drilling_types_loading = true
    try {
        const { data } = await DrillingTypeRepository.index()
        pageData.excavator_types = data
        pageData.drilling_types_loading = false
    }
    catch (err) {
        console.error(err);
        pageData.drilling_types_loading = false
    }
}



defineExpose({ formData })

onMounted(() => {
    getDrillingTypes()
})
</script>