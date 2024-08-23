<template>
    <VaSkeletonGroup v-if="props.loading">
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />

        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />
        
        <VaSkeleton variant="text" :lines="1" class="mb-1" />
        <VaSkeleton variant="squared" height="34px" class="mb-3" />
    </VaSkeletonGroup>
    <template v-else>
        <div v-if="pageData.career_loading" class="mb-2">
            <VaSkeleton variant="text" :lines="1" class="mb-1" width="130px" />
            <VaSkeleton variant="squared" height="34px" />
        </div>
        <VaSelect v-else v-model="formData.career_id" text-by="name" value-by="id" :rules="rule(t('required'))"
            class="w-full mb-3" :options="pageData.careers" :label="t('career.name')"
            :placeholder="t('message.select')" />
        <VaInput v-model="formData.code" class="w-full mb-3" :rules="rule(t('required'))" :label="t('horizon.code')" />
        <div v-if="pageData.level_loading">
            <VaSkeleton variant="text" :lines="1" class="mb-1" width="200px" />
            <VaSkeleton variant="squared" height="34px" />
        </div>
        <VaSelect v-else v-model="formData.level" text-by="langname" value-by="id" :rules="rule(t('required'))"
            class="w-full mb-3" :options="options" :label="t('level')" :placeholder="t('message.select')" />
    </template>
</template>

<script setup lang="ts">
import CareerRepository from '../Career/CareerRepository';
import TruckAbilityRepository from '../TruckAbility/TruckAbilityRepository';
import { rule } from '@/modules/helpers';
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { onMounted, reactive, computed } from 'vue';
const props = defineProps({
    loading: { type: Boolean }
})

const formData = reactive({
    career_id: null,
    code: null,
    level: null,
})

const pageData = reactive({
    careers: [],
    career_loading: false,
    levels: [],
    level_loading: false,
})

defineExpose({ formData })

async function getCareers() {
    pageData.career_loading = true
    const { data } = await CareerRepository.index()
    pageData.careers = data
    pageData.career_loading = false
}


async function getLevels() {
	pageData.level_loading = true
	try {
		const { data } = await TruckAbilityRepository.index()
		pageData.levels = data
		pageData.level_loading = false
	}
	catch (err) {
		pageData.level_loading = false
	}
}
const options = computed(() => {
	return pageData.levels.map((ability) => {
		ability.langname = t(ability.name)
		return ability
	})
})


onMounted(() => {
    getCareers()
    getLevels()
})
</script>