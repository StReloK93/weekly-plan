import { defineStore } from "pinia"
import { ref } from "vue"
export const useTruck = defineStore('useTruck', () => {
    const all = ref([])

    function store(formData) {
        all.value.push(formData)
    }

    function update(id, formData) {
        const selectedTruck = all.value.find((truck) => truck.id == id)
        selectedTruck.truck_type_id = formData.truck_type_id
        selectedTruck.garage_number = formData.garage_number
        selectedTruck.ability = formData.ability
    }

    function destroy(id) {
        const index = all.value.findIndex((truck) => truck.id == id)
        all.value.splice(index, 1)
    }


    return { all, store, update, destroy }
})