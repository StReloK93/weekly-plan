import { defineStore } from "pinia"
import { ref } from "vue"
export const useTruck = defineStore('useTruck', () => {
    const trucks = ref([])

    function store(truck_type) {
        trucks.value.push(truck_type)
    }

    function update(id, truck_type) {
        const selectedTruck = trucks.value.find((truck) => truck.id == id)
        selectedTruck.truck_type_id = truck_type.truck_type_id
        selectedTruck.garage_number = truck_type.garage_number
        selectedTruck.ability = truck_type.ability
    }

    function destroy(id) {
        const index = trucks.value.findIndex((truck) => truck.id == id)
        trucks.value.splice(index, 1)
    }


    return { trucks, store, update, destroy }
})