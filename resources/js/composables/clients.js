import { ref } from 'vue';
import axios from 'axios';
import router from '../router';

export default function useClients() {
    // const router = useRouter()
    const clients = ref([])
    const client = ref([])
    const errors = ref('')

    const getClients = async () => {
        let response = await axios.get('/api/clients')
        clients.value = response.data.data;
    }

    const getClient = async (id) => {
        let response = await axios.get(`/api/clients/${id}`)
        client.value = response.data.data;
    }

    const storeClient = async (data) => {
        errors.value = ''
        try{
            await axios.post('/api/clients/', data)
            await router.push({ name: 'clients.index' })
        } catch(e) {
            if(e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateClient = async (id) => {
        errors.value = ''
        try{
            await axios.put(`/api/clients/${id}`, client.value)
            await router.push({ name: 'clients.index' })
        } catch(e) {
            if(e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }
    
    const destroyClient = async (id) => {
        await axios.delete(`/api/clients/${id}`)
    }

    return {
        clients,
        client,
        errors,
        getClients,
        getClient,
        storeClient,
        updateClient,
        destroyClient
    }

    
}