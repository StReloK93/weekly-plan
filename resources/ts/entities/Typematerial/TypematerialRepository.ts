import http from "@/modules/axios";
const baseLink = 'typematerial'

async function index() {
   return await http.get(`${baseLink}`)
}

export default { index }