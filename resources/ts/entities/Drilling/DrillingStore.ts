import { defineStore } from "pinia"
import { ref } from "vue"
export const useDrilling = defineStore('useDrilling', () => {
    const all = ref([])

    function store(formdata) {
        all.value.push(formdata)
    }

    function update(id, formdata) {
        const instance = all.value.find((truck) => truck.id == id)

        instance.excavator_type_id = formdata.excavator_type_id
        instance.garage_number = formdata.garage_number
        instance.type = formdata.type
    }

    function destroy(id) {
        const index = all.value.findIndex((truck) => truck.id == id)
        all.value.splice(index, 1)
    }


    return { all, store, update, destroy }
})