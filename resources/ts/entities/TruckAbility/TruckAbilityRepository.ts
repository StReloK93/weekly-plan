import http from "@/modules/axios";
const baseLink = 'truck-ability'

async function index() {
    return http.get(`${baseLink}`)
}


export default { index }