import http from "@/modules/axios";
const baseLink = 'excavator'


async function index(){
    return await http.get(`${baseLink}`)
}


