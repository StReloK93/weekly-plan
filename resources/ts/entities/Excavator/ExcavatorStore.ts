import { defineStore } from "pinia"
import { ref } from "vue"
export const useExcavator = defineStore('useExcavator', () => {
    const excavators = ref([])

    function store(truck_type) {
        excavators.value.push(truck_type)
    }

    function update(id, truck_type) {
        const selectedTruck = excavators.value.find((truck) => truck.id == id)
        selectedTruck.truck_type_id = truck_type.truck_type_id
        selectedTruck.garage_number = truck_type.garage_number
        selectedTruck.ability = truck_type.ability
    }

    function destroy(id) {
        const index = excavators.value.findIndex((truck) => truck.id == id)
        excavators.value.splice(index, 1)
    }


    return { excavators, store, update, destroy }
})