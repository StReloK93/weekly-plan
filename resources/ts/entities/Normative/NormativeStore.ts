import { defineStore } from "pinia"
import { ref } from "vue"
export const useNormative = defineStore('useNormative', () => {
   const params = ref({
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

   function update(formData) {
      params.value.obed_po = formData.obed_po
      params.value.eto_po = formData.eto_po
      params.value.peresmenka_po = formData.peresmenka_po
      params.value.techno_pereriv_po = formData.techno_pereriv_po

      params.value.techno_pereriv_ac = formData.techno_pereriv_ac
      params.value.zapravka_ac = formData.zapravka_ac
      params.value.obed_ac = formData.obed_ac
      params.value.peresmenka_ac = formData.peresmenka_ac
      params.value.rezerv_ac = formData.rezerv_ac
      params.value.vzriv_ac = formData.vzriv_ac

      params.value.speed_ac = formData.speed_ac
      params.value.install_ac = formData.install_ac
      params.value.download_ac = formData.download_ac
      params.value.waiting_ac = formData.waiting_ac

      params.value.gruz_ac = formData.gruz_ac
      params.value.full_bort_ac = formData.full_bort_ac
   }

   return { update }
})