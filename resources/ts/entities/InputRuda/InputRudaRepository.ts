import http from "@/modules/axios";
const baseLink = 'input-ruda'

async function index() {
   return await http.get(`${baseLink}`)
}

export default { index }