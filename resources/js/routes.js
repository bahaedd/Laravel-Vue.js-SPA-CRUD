import list from './components/list.vue';
import Add from './components/Add.vue';
import Edit from './components/Edit.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: list
    },
    {
        name: 'store',
        path: '/store',
        component: Add
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    }
];
