import http from "@/modules/axios";
const baseLink = 'excavator-type'

async function index() {
    return await http.get(`${baseLink}`)
}

export default { index }