<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveClient">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="client.name">
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">address</label>
                <div class="mt-1">
                    <input type="text" name="address" id="address"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="client.address">
                </div>
            </div>

            <div>
                <label for="tel" class="block text-sm font-medium text-gray-700">tel</label>
                <div class="mt-1">
                    <input type="text" name="tel" id="tel"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="client.tel">
                </div>
            </div>

            <div>
                <label for="mobile" class="block text-sm font-medium text-gray-700">mobile</label>
                <div class="mt-1">
                    <input type="text" name="mobile" id="mobile"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="client.mobile">
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">image</label>
                <div class="mt-1">
                    <input type="text" name="image" id="image"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="client.image">
                </div>
            </div>
        </div>

        <button type="submit"
                class="mt-2 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
    </form>
</template>

<script>
import useClients from '../../composables/clients'
import { onMounted } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, client, updateClient, getClient } = useClients()

        onMounted(() => getClient(props.id))

        const saveClient = async () => {
            await updateClient(props.id)
        }

        return {
            errors,
            client,
            saveClient
        }
    }
}
</script>