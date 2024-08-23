import http from "@/modules/axios";
const baseLink = 'normative'


async function show(id) {
   return await http.get(`${baseLink}/${id}`)
}



async function update(formData, id) {
   return await http.patch(`${baseLink}/${id}`, formData)
}


export default { update, show }