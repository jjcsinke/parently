import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'home',
        component: () =>
            import("./views/Home.vue")
    },
    {
        path: '/portal',
        name: 'portal',
        component: () =>
            import("./views/Portal.vue"),
        children: [
            {
                path: 'schools',
                name: 'schools',
                component: () =>
                    import("./views/Portal/Schools/Index.vue")
            },
            {
                path: 'parents',
                name: 'parents',
                component: () =>
                    import("./views/Portal/Parents/Index.vue")
            }
        ]
    },
];

const router = createRouter({
    history: createWebHistory('/'),
    routes
})

export default router;
