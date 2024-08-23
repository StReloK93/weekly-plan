import http from "@/modules/axios";
const baseLink = 'horizon'


async function index() {
    return await http.get(`${baseLink}`)
}

async function show(id) {
    return await http.get(`${baseLink}/${id}`)
}

async function store(formData) {
    return await http.post(`${baseLink}`, formData)
}

async function update(formData, id) {
    return await http.patch(`${baseLink}/${id}`, formData)
}

async function destroy(id) {
    return await http.delete(`${baseLink}/${id}`)
}

export default { index, store, update, show, destroy }