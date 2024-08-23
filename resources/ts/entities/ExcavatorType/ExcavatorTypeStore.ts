import { defineStore } from "pinia"
import { ref } from "vue"
export const useExcavatorType = defineStore('useExcavatorType', () => {
    const all = ref([])

    function store(formData) {
        all.value.push(formData)
    }

    function update(id, formData) {
        const selectedTruck = all.value.find((truck) => truck.id == id)

        selectedTruck.name = formData.name
        selectedTruck.bucket_volume = formData.bucket_volume
        selectedTruck.normal_procent = formData.normal_procent
        selectedTruck.easy_procent = formData.easy_procent
        selectedTruck.hard_procent = formData.hard_procent
        selectedTruck.normal_time = formData.normal_time
        selectedTruck.easy_time = formData.easy_time
        selectedTruck.hard_time = formData.hard_time
        selectedTruck.count_bucket = formData.count_bucket
    }

    function destroy(id) {
        const index = all.value.findIndex((truck) => truck.id == id)
        all.value.splice(index, 1)
    }

    return { all, store, update, destroy }
})