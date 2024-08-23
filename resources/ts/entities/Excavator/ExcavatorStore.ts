import { defineStore } from "pinia"
import { ref } from "vue"
export const useExcavator = defineStore('useExcavator', () => {
    const all = ref([])

    function store(formdata) {
        all.value.push(formdata)
    }

    function update(id, formdata) {
        const selectedTruck = all.value.find((truck) => truck.id == id)

        selectedTruck.excavator_type_id = formdata.excavator_type_id
        selectedTruck.garage_number = formdata.garage_number

        selectedTruck.type = formdata.type
    }

    function destroy(id) {
        const index = all.value.findIndex((truck) => truck.id == id)
        all.value.splice(index, 1)
    }


    return { all, store, update, destroy }
})