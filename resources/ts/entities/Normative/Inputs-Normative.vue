<template>
    <main>
        <h3 class="text-center mb-3 text-base text-gray-600">
            {{ t('normative.reglament_normatives_po') }}
        </h3>
        <div class="flex">
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.obed_po" type="number"  :loading="loading" :label="t('normative.lunch')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.eto_po" type="number"  :loading="loading" :label="t('normative.eto')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.peresmenka_po" type="number"  :loading="loading" :label="t('normative.peresmenka')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.techno_pereriv_po" type="number"  :loading="loading" :label="t('normative.techno_pereriv')" />
            </aside>
        </div>
        <h3 class="text-center mb-3 text-base text-gray-600">
            {{ t('normative.reglament_normatives_ac') }}
        </h3>
        <div class="flex flex-wrap">
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.techno_pereriv_ac" type="number"  :loading="loading" :label="t('normative.techno_pereriv')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.zapravka_ac" type="number"  :loading="loading" :label="t('normative.inoil')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.obed_ac" type="number"  :loading="loading" :label="t('normative.lunch')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.peresmenka_ac" type="number"  :loading="loading" :label="t('normative.peresmenka')" />
            </aside>
            <aside class="w-1/2 mb-3 px-1">
                <VaInput v-model="formData.rezerv_ac" type="number"  :loading="loading" class="w-full"
                    :label="t('normative.rezerv_time')" />
            </aside>
            <aside class="w-1/2 mb-3 px-1">
                <VaInput v-model="formData.vzriv_ac" type="number"  :loading="loading" class="w-full"
                    :label="t('normative.rezerv_time_vzriv')" />
            </aside>
        </div>
        <h3 class="text-center mb-3 text-base text-gray-600">
            {{ t('normative.inner_normatives_ac_reys') }}
        </h3>
        <div class="flex">
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.speed_ac" type="number"  :loading="loading" :label="t('normative.speed')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.install_ac" type="number"  :loading="loading" :label="t('normative.install')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.download_ac" type="number"  :loading="loading" :label="t('normative.download')" />
            </aside>
            <aside class="w-1/4 mb-3 px-1">
                <VaInput v-model="formData.waiting_ac" type="number"  :loading="loading" :label="t('normative.waiting_download')" />
            </aside>
        </div>
        <h3 class="text-center mb-3 text-base text-gray-600">
            {{ t('normative.settings_ac') }}
        </h3>
        <div class="flex">
            <aside class="w-1/2 mb-3 px-1">
                <VaInput v-model="formData.gruz_ac" type="number"  :loading="loading" class="w-full"
                    :label="t('normative.gruzopodyomnost')" />
            </aside>
            <aside class="w-1/2 mb-3 px-1">
                <VaInput v-model="formData.full_bort_ac" type="number"  :loading="loading" class="w-full"
                    :label="t('normative.zagruzka')" />
            </aside>
        </div>
    </main>
</template>

<script setup lang="ts">
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
import { onMounted, reactive } from 'vue';
const props = defineProps({
    loading: { type: Boolean }
})

const formData = reactive({
    'obed_po': null,
    'eto_po': null,
    'peresmenka_po': null,
    'techno_pereriv_po': null,

    'techno_pereriv_ac': null,
    'zapravka_ac': null,
    'obed_ac': null,
    'peresmenka_ac': null,
    'rezerv_ac': null,
    'vzriv_ac': null,

    'speed_ac': null,
    'install_ac': null,
    'download_ac': null,
    'waiting_ac': null,

    'gruz_ac': null,
    'full_bort_ac': null,
})



defineExpose({ formData })

onMounted(() => {

})
</script>