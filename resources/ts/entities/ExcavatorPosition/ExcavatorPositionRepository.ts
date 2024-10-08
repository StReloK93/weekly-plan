import http from "@/modules/axios";
const baseLink = 'excavator-position'


async function index(days) {
   return await http.post(`${baseLink}`, days)
}

async function update(formData) {
   return await http.post(`${baseLink}/update`, formData)
}

async function updateMassa(formData) {
   return await http.post(`${baseLink}/update-massa`, formData)
}

export default { index, update, updateMassa }