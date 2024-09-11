import http from "@/modules/axios";
const baseLink = 'movement'


async function index(type) {
    var type_count = 0
    if(type == 'movement.ekg') type_count = 1
    if(type == 'movement.gidro') type_count = 2
    return await http.get(`${baseLink}/${type_count}`)
}


async function update(formData, type) {
    var type_count = 0
    if(type == 'movement.ekg') type_count = 1
    if(type == 'movement.gidro') type_count = 2
    return await http.post(`${baseLink}/${type_count}`, formData)
}


export default { index, update }