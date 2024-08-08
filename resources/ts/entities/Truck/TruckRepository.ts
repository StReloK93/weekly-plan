import http from "@/modules/axios";
const baseLink = 'truck'


async function index() {
    return await http.get(`${baseLink}`)
}

async function store(formData) {
    return await http.post(`${baseLink}`, formData)
}

async function show(truck_id) {
    return await http.get(`${baseLink}/${truck_id}`)
}

async function update(formData, truck_id) {
    return await http.patch(`${baseLink}/${truck_id}`, formData)
}

async function destroy(truck_id) {
    return await http.delete(`${baseLink}/${truck_id}`)
}

export default { index, store, show, update, destroy }