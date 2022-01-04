import { createRouter, createWebHistory } from 'vue-router'

import ClientsIndex from '../components/clients/ClientsIndex'
import ClientsCreate from '../components/clients/ClientsCreate'
import ClientsEdit from '../components/clients/ClientsEdit'

const routes = [
	{
		path: '/dashboard',
		name: 'clients.index',
		component: ClientsIndex
	},
	{
		path: '/clients/create',
		name: 'clients.create',
		component: ClientsCreate
	},
	{
		path: '/clients/:id/edit',
		name: 'clients.edit',
		component: ClientsEdit,
		props: true
	}
];

export default createRouter({
	history: createWebHistory(),
	routes
})
