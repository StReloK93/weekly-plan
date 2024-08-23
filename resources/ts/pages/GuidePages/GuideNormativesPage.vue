<template>
    <section>
        <div class="flex justify-between">
            <h3 class="text-xl">{{ t('message.normatives') }}</h3>
            <EditNormativeForm />
        </div>
        <aside class="flex flex-wrap">
            <h3 class="mb-3 w-full text-base text-gray-800 font-semibold">
                {{ t('normative.reglament_normatives_po') }}
            </h3>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">
                    {{ t('normative.lunch') }}
                </h3>
                <div class="text-blue-600 font-semibold" v-if="loading == false">
                    {{ normatives?.obed_po }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">
                    {{ t('normative.eto') }}
                </h3>
                <div class="text-blue-600 font-semibold" v-if="loading == false">
                    {{ normatives?.eto_po }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">
                    {{ t('normative.peresmenka') }}
                </h3>
                <div v-if="loading == false">
                    {{ normatives?.peresmenka_po }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">
                    {{ t('normative.techno_pereriv') }}
                </h3>
                <div v-if="loading == false">
                    {{ normatives?.techno_pereriv_po }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
        </aside>
        <VaDivider />
        <aside class="flex flex-wrap">
            <h3 class="mb-3 w-full text-base text-gray-800 font-semibold">
                {{ t('normative.reglament_normatives_ac') }}
            </h3>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.techno_pereriv') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.techno_pereriv_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.inoil') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.zapravka_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.lunch') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.obed_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.peresmenka') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.peresmenka_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.rezerv_time') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.rezerv_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.rezerv_time_vzriv') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.vzriv_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
        </aside>
        <VaDivider />
        <aside class="flex flex-wrap">
            <h3 class="mb-3 w-full text-base text-gray-800 font-semibold">
                {{ t('normative.inner_normatives_ac_reys') }}
            </h3>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.speed') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.speed_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>

            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.install') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.install_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>

            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.download') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.download_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>

            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.waiting_download') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.waiting_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>

        </aside>
        <VaDivider />
        <aside class="flex flex-wrap">
            <h3 class="mb-3 w-full text-base text-gray-800 font-semibold">
                {{ t('normative.settings_ac') }}
            </h3>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.gruzopodyomnost') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.gruz_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
            <main class="w-1/4 my-3">
                <h3 class="text-gray-500 text-sm">{{ t('normative.zagruzka') }}</h3>
                <div v-if="loading == false">
                    {{ normatives?.full_bort_ac }}
                </div>
                <VaSkeleton v-else height="24px" width="100px" />
            </main>
        </aside>
    </section>
</template>

<script setup lang="ts">
import NormativeRepository from '@/entities/Normative/NormativeRepository'
import EditNormativeForm from '@/entities/Normative/EditNormativeForm.vue';
import { useI18n } from 'vue-i18n'
import { onMounted, ref } from 'vue';
const { t } = useI18n()
const normatives = ref(null)
const loading = ref(false)
async function getNormatives() {
    loading.value = true
    const { data } = await NormativeRepository.show(1)
    normatives.value = data
    loading.value = false

}
onMounted(() => {
    getNormatives()
})
</script>