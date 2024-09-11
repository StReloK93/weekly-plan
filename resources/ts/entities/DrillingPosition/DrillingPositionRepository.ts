import http from "@/modules/axios";
const baseLink = 'drilling-position'


async function index(days) {
   return await http.post(`${baseLink}`, days)
}

async function update(formData) {
   return await http.post(`${baseLink}/update`, formData)
}

export default { index, update }