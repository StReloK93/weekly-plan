import http from "@/modules/axios";
const baseLink = 'truck-type'


async function index() {
    return await http.get(`${baseLink}`)
}

async function store(formData) {
    return await http.post(`${baseLink}`, formData)
}

async function show(truck_type_id) {
    return await http.get(`${baseLink}/${truck_type_id}`)
}

async function update(formData, truck_type_id) {
    return await http.patch(`${baseLink}/${truck_type_id}`, formData)
}

async function destroy(truck_type_id) {
    return await http.delete(`${baseLink}/${truck_type_id}`)
}

export default { index, store, show, update, destroy }