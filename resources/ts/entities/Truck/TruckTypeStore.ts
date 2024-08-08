import { defineStore } from "pinia"
import { ref } from "vue"
export const useTruckType = defineStore('useTruckType', () => {
    const truckTypes = ref([])

    function store(truck_type) {
        truckTypes.value.push(truck_type)
    }

    function update(id, truck_type) {
        const selectedTruckType = truckTypes.value.find((truck) => truck.id == id)
        selectedTruckType.name = truck_type.name
        selectedTruckType.tonnage = truck_type.tonnage
    }

    function destroy(id) {
        const index = truckTypes.value.findIndex((truck) => truck.id == id)
        truckTypes.value.splice(index, 1)
    }


    return { truckTypes, store, update, destroy }
})