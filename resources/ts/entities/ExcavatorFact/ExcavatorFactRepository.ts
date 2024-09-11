import http from "@/modules/axios";
const baseLink = 'excavator-fact'


async function index(days) {
    return await http.post(`${baseLink}`, days)
}

async function update(formData, type) {
    return await http.post(`${baseLink}/${type}`, formData)
}

export default { index, update }