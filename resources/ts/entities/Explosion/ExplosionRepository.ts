import http from "@/modules/axios";
const baseLink = 'explosion'

async function index(days) {
   return await http.post(`${baseLink}`, days)
}

async function update(formdata) {
   return await http.post(`${baseLink}/update`, formdata)
}


export default { index, update }