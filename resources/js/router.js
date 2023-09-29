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
        component: () =>
            import("./views/Portal.vue"),
        children: [
            {
                path: '',
                name: 'portal',
                component: () =>
                    import("./views/Portal/Dashboards/Dashboard.vue")
            },
            {
                path: 'schools',
                name: 'schools',
                component: () =>
                    import("./views/Portal/Schools/Index.vue")
            },
            {
                path: 'schools/:id',
                name: 'schools.single',
                component: () =>
                    import("./views/Portal/Schools/Single.vue")
            },
            {
                path: 'parents',
                name: 'parents',
                component: () =>
                    import("./views/Portal/Parents/Index.vue")
            },
            {
                path: 'children',
                name: 'children',
                component: () =>
                    import("./views/Portal/Children/Index.vue")
            },
            {
                path: 'children/:id',
                name: 'children.single',
                component: () =>
                    import("./views/Portal/Children/Single.vue")
            }
        ]
    },
];

const router = createRouter({
    history: createWebHistory('/'),
    routes
})

export default router;
