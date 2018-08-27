const routes = [{
        path: '/',
        redirect: '/dashboard'
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: require('../pages/Dashboard.vue')
    },
    /*
    {
        path: '/clients/:id',
        name: 'clients.show',
        component: require('../pages/clients/Show.vue'),
        props: true
    },*/
    {
        path: '*',
        name: '404',
        component: require('../pages/errors/Error404.vue')
    }
];

export default routes;