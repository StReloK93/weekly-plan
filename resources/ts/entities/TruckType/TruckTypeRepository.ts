import http from "@/modules/axios";
const baseLink = 'truck-type'


async function index() {
    return await http.get(`${baseLink}`)
}

async function store(formData) {
    return await http.post(`${baseLink}`, formData)
}

async function show(id) {
    return await http.get(`${baseLink}/${id}`)
}

async function update(formData, id) {
    return await http.patch(`${baseLink}/${id}`, formData)
}

async function destroy(id) {
    return await http.delete(`${baseLink}/${id}`)
}

export default { index, store, show, update, destroy }