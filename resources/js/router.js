import {createRouter, createWebHistory} from 'vue-router'

import publicRoutes from './routes/PublicRoutes.js';
import portalRoutes from './routes/PortalRoutes.js';

const routes = [
    {
        path: '/',
        component: () =>
            import("./views/Public.vue"),
        children: publicRoutes
    },
    {
        path: '/portal',
        component: () =>
            import("./views/Portal.vue"),
        children: portalRoutes
    },
];

const router = createRouter({
    history: createWebHistory('/'),
    routes
})

export default router;
