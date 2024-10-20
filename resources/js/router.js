import { createMemoryHistory, createRouter } from 'vue-router';
//import App from './app.vue'; 

import clientes from '../views/Components/clientes.vue';
import permisos from '../views/Components/permisos.vue';

const routes = [  
    {  
        path: '/', 
        name: 'clientes', 
        component: clientes,
    },
    {
        path: '/permisos',
        name: permisos,
        component: permisos,
    } 
]  

const routers = createRouter({
    history: createMemoryHistory(),
    routes,
  });  


export default routers;