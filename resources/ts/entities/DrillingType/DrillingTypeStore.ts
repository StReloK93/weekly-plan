import { defineStore } from "pinia"
import { ref } from "vue"
export const useDrillingType = defineStore('useDrillingType', () => {
    const all = ref([])

    function store(formdata) {
        all.value.push(formdata)
    }

    function update(id, formdata) {
        const instance = all.value.find((truck) => truck.id == id)

        instance.name = formdata.name
        instance.speed_per_min = formdata.speed_per_min
        instance.install = formdata.install
        instance.move = formdata.move
        instance.up_down_mast = formdata.up_down_mast
        instance.montage = formdata.montage
        instance.drilling = formdata.drilling
    }

    function destroy(id) {
        const index = all.value.findIndex((truck) => truck.id == id)
        all.value.splice(index, 1)
    }


    return { all, store, update, destroy }
})