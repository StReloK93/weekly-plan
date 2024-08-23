import { defineStore } from "pinia"
import { ref } from "vue"
export const useTruckType = defineStore('useTruckType', () => {
    const all = ref([])

    function store(truck_type) {
        all.value.push(truck_type)
    }

    function update(id, truck_type) {
        const selectedTruckType = all.value.find((truck) => truck.id == id)
        selectedTruckType.name = truck_type.name
        selectedTruckType.tonnage = truck_type.tonnage
    }

    function destroy(id) {
        const index = all.value.findIndex((truck) => truck.id == id)
        all.value.splice(index, 1)
    }


    return { all, store, update, destroy }
})