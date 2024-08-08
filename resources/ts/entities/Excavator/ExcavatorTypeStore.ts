import { defineStore } from "pinia"
import { ref } from "vue"
export const useExcavatorType = defineStore('useExcavatorType', () => {
    const excavatorTypes = ref([])

    function store(truck_type) {
        excavatorTypes.value.push(truck_type)
    }

    function update(id, truck_type) {
        const selectedTruck = excavatorTypes.value.find((truck) => truck.id == id)
        selectedTruck.truck_type_id = truck_type.truck_type_id
        selectedTruck.garage_number = truck_type.garage_number
        selectedTruck.ability = truck_type.ability
    }

    function destroy(id) {
        const index = excavatorTypes.value.findIndex((truck) => truck.id == id)
        excavatorTypes.value.splice(index, 1)
    }

    return { excavatorTypes, store, update, destroy }
})