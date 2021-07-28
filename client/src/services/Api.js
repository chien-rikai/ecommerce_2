import axios from 'axios';
const ApiClient = axios.create({
    baseURL: process.env.REACT_APP_BASE_URL,
    headers:{
        'content-type':'application/json',
        'Authorization':'Bearer '+localStorage.getItem('token')
    },
});
ApiClient.interceptors.request.use(async(config)=>{
    return config;
})
ApiClient.interceptors.response.use((response)=>{
    if(response&&response.data){
        return response.data;
    }
    return response;
},(error)=>{
    throw error;
});
export default ApiClient;